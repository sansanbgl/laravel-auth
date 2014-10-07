<?php 
/**
 * Model User
 * Model yang digunakan untuk autentikasi.
 *
 * @author Ifan Iqbal <ifaniqbal.com@gmail.com>
 *
 */


use Illuminate\Auth\UserInterface;

class User extends Eloquent implements UserInterface{
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;
    protected $softDelete = true;
    protected $fillable = array(
        'username',
        'password',
        'email',
        'homepage',
        'name',
        'fullname',
        'birthplace',
        'birthdate',
        'bloodtype',
        'currentaddress',
        'originaddress',
        'postalcode',
        'contact',
        'gender',
        'remember_token',
        'last_logtime',
        'last_ip',
        'group_role_id',
        'enabled',
    );
    protected $exceptionalRoute = array(
        'user/change_role',
    );
    protected $effectiveMenu = null;
    protected $effectivePermission = null;
    protected $groupRole = null;

    public function group()
    {
        return $this->belongsToMany('Group', 'group_users', 'user_id', 'group_id');
    }

    public function listGroup()
    {
        return $this->group();
    }

    public function hasAccess($route)
    {
        foreach ($this->exceptionalRoute as $exceptionalRoute)
        {
            if ($exceptionalRoute == $route)
            {
                return true;
            }
        }

        $permissions = $this->getEffectivePermission();
        foreach ($permissions as $permission) 
        {
            if ($permission->route == $route)
            {
                return true;
            }
        }
        return false;
    }

    public function getEffectiveMenu()
    {
        if ($this->effectiveMenu != null)
        {
            return $this->effectiveMenu;
        }
        else
        {
            $group = Group::with(array('menu' => function($query){
                $query->orderBy('name');
            }))->find($this->getGroupRoleId());
            if ($group != null)
            {
                $effectiveMenu = array();
                foreach ($group->menu as $menu) 
                {
                    if ($menu->parent_id == 0)
                    {
                        array_push($effectiveMenu, $menu);
                        $menu->_child = array();
                        foreach ($group->menu as $child) 
                        {
                            if ($child->parent_id == $menu->id)
                            {
                                array_push($menu->_child, $child);

                                $child->_child = array();
                                foreach ($group->menu as $grandChild) 
                                {
                                    if ($grandChild->parent_id == $child->id)
                                    {
                                        array_push($child->_child, $grandChild);
                                    }
                                }
                            }
                        }
                    }
                }
                $this->effectiveMenu = $effectiveMenu;
            }
            else
            {
                $this->effectiveMenu = array();
            }
            return $this->effectiveMenu;
        }
    }

    public function getEffectivePermission()
    {
        if ($this->effectivePermission != null)
        {
            return $this->effectivePermission;
        }
        else
        {
            $group = Group::with('permission')->find($this->getGroupRoleId());
            if ($group != null)
            {
                $this->effectivePermission = $group->permission;
            }
            else
            {
                $this->effectivePermission = array();
            }
            return $this->effectivePermission;
        }
    }

    public function setGroupRoleId($id)
    {
        $group = Group::find($id);
        if ($group != null)
        {
            $this->group_role_id = $id;
            $this->save();
        }
    }

    public function getGroupRoleId()
    {
        if ($this->group_role_id == 0)
        {
            if ($this->group->count() > 0)
            {
                $id = $this->group->sortByDesc('level')->first()->id;
                $this->setGroupRoleId($id);
                return $this->group_role_id;
            }
            else
            {
                return 0;
            }            
        }
        else
        {
            return $this->group_role_id;
        }
    }

    public function getGroupRole()
    {
        if ($this->groupRole != null)
        {
            return $this->groupRole;
        }
        else
        {
            $this->groupRole = Group::find($this->getGroupRoleId());
            return $this->groupRole;
        }
    }    

    public function addGroup($group)
    {
        if (!$this->inGroup($group))
        {
            $this->group()->attach($group);
        }
        return true;
    }

    public function removeGroup($group)
    {
        if ($this->inGroup($group))
        {
            $this->group()->detach($group);
        }
        return true;
    }

    public function inGroup($group)
    {
        foreach ($this->group()->get() as $userGroup)
        {
            if ($userGroup->id == $group->id)
            {
                return true;
            }
        }
        return false;
    }

    public function setGroupByIds($group_ids)
    {
        if (is_array($group_ids))
        {
            $this->group()->detach();
            foreach ($group_ids as $group_id) {
                $group = Group::find($group_id);
                if ($group != null)
                {
                    $this->addGroup($group);
                }
            }
            return true;
        }
        return false;
    }

    public function getAuthIdentifier()
    {
        return $this->id;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function getRememberToken()
    {
        return $this->{$this->getRememberTokenName()};
    }

    public function setRememberToken($value)
    {
        $this->{$this->getRememberTokenName()} = $value;
    }

}

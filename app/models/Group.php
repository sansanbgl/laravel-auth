<?php 
/**
 * Model User
 * Model yang digunakan untuk autentikasi.
 *
 * @author Ifan Iqbal <ifaniqbal.com@gmail.com>
 *
 */



class Group extends Eloquent {
    protected $table = 'groups';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;
    protected $softDelete = true;
    protected $fillable = array(
        'name',
        'level',
        'enabled'
    );

    public function user()
    {
        return $this->belongsToMany('User', 'group_users', 'group_id', 'user_id');
    }

    public function menu()
    {
        return $this->belongsToMany('Menu', 'group_menus', 'group_id', 'menu_id');
    }

    public function listMenu()
    {
        return $this->menu();
    }

    public function permission()
    {
        return $this->belongsToMany('Permission', 'group_permissions', 'group_id', 'permission_id');
    }

    public function listPermission()
    {
        return $this->permission();
    }
}

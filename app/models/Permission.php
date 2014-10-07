<?php 
/**
 * Model Permission
 * Menyimpan route uri yang berhak diakses tiap group.
 *
 * @author Ifan Iqbal <ifaniqbal.com@gmail.com>
 *
 */



class Permission extends Eloquent {
    protected $table = 'permissions';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;
    protected $softDelete = true;
    protected $fillable = array(
        'route',
        'enabled',
    );

    public function group()
    {
        return $this->belongsToMany('Group', 'group_permissions', 'permission_id', 'group_id');
    }

    public function listGroup()
    {
        return $this->group();
    }

}

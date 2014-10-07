<?php 
/**
 * Model Menu
 * Menyimpan link menu navbar dan sidebar.
 *
 * @author Ifan Iqbal <ifaniqbal.com@gmail.com>
 *
 */



class Menu extends Eloquent {
    protected $table = 'menus';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;
    protected $softDelete = true;
    protected $fillable = array(
        'name',
        'url',
        'order',
        'enabled',
    );

    public $_child = null;

    public function parent()
    {
        return $this->belongsTo('Menu', 'parent_id', 'id');
    }

    public function child()
    {
        return $this->hasMany('Menu', 'parent_id', 'id');
    }

    public function listChild()
    {
        return $this->child();
    }

    public function group()
    {
        return $this->belongsToMany('Group', 'group_menus', 'menu_id', 'group_id');
    }

    public function listGroup()
    {
        return $this->group();
    }

}

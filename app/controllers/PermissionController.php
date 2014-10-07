<?php


use \View;
use \Redirect;
use \Request;
use \Input;
use \Permission;

class PermissionController extends BaseController {

    public function index()
    {
        $this->data['items'] = Permission::orderBy('route')->paginate($this->perPage);
        View::share('data', $this->data);
        return View::make('pages.permission.index');
    }

    public function manage()
    {
        $this->data['items'] = Permission::orderBy('route')->paginate($this->perPage);
        View::share('data', $this->data);
        return View::make('pages.permission.manage');
    }

    public function detail($id)
    {
        $this->data['item'] = Permission::with('group')->find($id);
        $this->data['item']->group->sortBy('name');
        View::share('data', $this->data);
        return View::make('pages.permission.detail');
    }

    public function create()
    {
        if (Request::isMethod('get'))
        {
            $this->data = array();
            View::share('data', $this->data);
            return View::make('pages.permission.create');
        }
        else if (Request::isMethod('post'))
        {
            $permission = Permission::create(Input::all());
            return Redirect::to('permission/manage');
        }
    }

    public function update($id)
    {
        if (Request::isMethod('get'))
        {
            $this->data = array();
            $this->data['item'] = Permission::find($id);
            View::share('data', $this->data);
            return View::make('pages.permission.update');
        }
        else if (Request::isMethod('post'))
        {
            $permission = Permission::find($id);
            $permission->update(Input::all());
            return Redirect::to('permission/detail/' . $id);
        }
    }

    public function delete($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        return Redirect::to('permission/manage');
    }
}

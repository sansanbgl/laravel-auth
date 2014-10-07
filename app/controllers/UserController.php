<?php


use \View;
use \Redirect;
use \Request;
use \Input;
use \Auth;
use \User;
use \Group;

class UserController extends BaseController {

    public function index()
    {
        $this->data['items'] = User::paginate($this->perPage);
        View::share('data', $this->data);
        return View::make('pages.user.index');
    }

    public function manage()
    {
        $this->data['items'] = User::paginate($this->perPage);
        View::share('data', $this->data);
        return View::make('pages.user.manage');
    }

    public function detail($id = null)
    {
        if ($id == null)
        {
            $id = Auth::user()->id;
        }
        $this->data['item'] = User::with('group')->find($id);
        View::share('data', $this->data);
        return View::make('pages.user.detail');
    }

    public function create()
    {
        if (Request::isMethod('get'))
        {
            $this->data = array();
            $this->data['groups'] = Group::get();
            View::share('data', $this->data);
            return View::make('pages.user.create');
        }
        else if (Request::isMethod('post'))
        {
            $user = User::create(Input::all());
            $group_ids = Input::get('group_ids');
            $user->setGroupByIds($group_ids);
            return Redirect::to('user/manage');
        }
    }

    public function update($id = null)
    {
        if ($id == null)
        {
            $id = Auth::user()->id;
        }
        if (Request::isMethod('get'))
        {
            $this->data = array();
            $this->data['item'] = User::with('group')->find($id);
            $this->data['groups'] = Group::get();
            View::share('data', $this->data);
            return View::make('pages.user.update');
        }
        else if (Request::isMethod('post'))
        {
            $user = User::find($id);
            $user->update(Input::all());
            $group_ids = Input::get('group_ids');
            if ($group_ids == null)
            {
                $group_ids = array();
            }
            $user->setGroupByIds($group_ids);
            return Redirect::to('user/detail/' . $id);
        }
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return Redirect::to('user/manage');
    }

    public function changePassword($id)
    {
        if (Request::isMethod('get'))
        {
            return View::make('pages.user.change_password');
        }
        else if (Request::isMethod('post'))
        {
            $user = User::find($id);
            $this->data = Input::all();
            if ($this->data['password'] == $user->password)
            {
                if ($this->data['new_password'] == $this->data['confirm_password'])
                {
                    $user->password = $this->data['new_password'];
                    $user->save();
                }
            }

            return Redirect::to('user/detail/' . $id);
        }
    }

    public function changeRole()
    {
        Auth::user()->setGroupRoleId(Input::get('group_id'));
        return Redirect::to('/');
    }
}

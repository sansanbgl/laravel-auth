<?php

use \View;
use \Redirect;
use \Request;
use \Input;
use \Auth;
use \Basic;

class BasicController extends BaseController {

    public function index()
    {
        $this->data['items'] = Basic::paginate($this->perPage);
        View::share('data', $this->data);
        return View::make('pages.basic.index');
    }

    public function manage()
    {
        $this->data['items'] = Basic::paginate($this->perPage);
        View::share('data', $this->data);
        return View::make('pages.basic.manage');
    }

    public function detail($id = null)
    {
        if ($id == null)
        {
            $id = Auth::user()->basic_id;
        }
        $this->data['item'] = Basic::find($id);
        View::share('data', $this->data);
        return View::make('pages.basic.detail');
    }

    public function create()
    {
        if (Request::isMethod('get'))
        {
            $this->data = array();
            View::share('data', $this->data);
            return View::make('pages.basic.create');
        }
        else if (Request::isMethod('post'))
        {
            $basic = Basic::create(Input::all());
            return Redirect::to('basic/manage');
        }
    }

    public function update($id = null)
    {
        if ($id == null)
        {
            $id = Auth::user()->basic_id;
        }
        if (Request::isMethod('get'))
        {
            $this->data = array();
            $this->data['item'] = Basic::find($id);
            View::share('data', $this->data);
            return View::make('pages.basic.update');
        }
        else if (Request::isMethod('post'))
        {
            $basic = Basic::find($id);
            $basic->update(Input::all());
            return Redirect::to('basic/detail/' . $id);
        }
    }

    public function delete($id)
    {
        $basic = Basic::find($id);
        $basic->delete();
        return Redirect::to('basic/manage');
    }
}

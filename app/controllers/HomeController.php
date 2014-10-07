<?php

use \View;
use \Redirect;
use \Request;
use \Input;
use \Auth;
use \Session;
use \User;

class HomeController extends BaseController {

    public function index()
    {
        return View::make('pages.home.welcome');
    }

    public function login()
    {
        if (Request::isMethod('get'))
        {
            if (Auth::check())
            {
                return Redirect::to('/');
            }
            else
            {
                return View::make('pages.home.login');
            }
        }
        else if (Request::isMethod('post'))
        {
            $user = User::where('username', '=', Input::get('username'))->first();
            if ($user == null)
            {
                return Redirect::to('login');
            }

            $loginData = array(
                'id' => $user->id, 
                'password' => Input::get('password')
            );

            if (Auth::attempt($loginData, true))
            {
                return Redirect::intended('/');
            }
            else
            {
                return Redirect::to('login');
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('login');
    }
}
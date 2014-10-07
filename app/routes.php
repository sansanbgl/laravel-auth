<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Route::when('group/*', 'auth');
// Route::when('user/*', 'auth');
// Route::when('menu/*', 'auth');

Route::get ('/', 'HomeController@index');
Route::get ('login', 'HomeController@login');
Route::post('login', array('before' => 'csrf', 'uses' => 'HomeController@login'));
Route::get ('logout', 'HomeController@logout');
Route::get ('user', 'UserController@index');

/**
 * Letakkan rute yang membutuhkan hak akses tertendu
 * ke dalam blok kode di bawah ini
 */
Route::group(array('before' => 'auth'), function()
{
    Route::get ('user/manage', 'UserController@manage');
    Route::get ('user/detail', 'UserController@detail');
    Route::get ('user/detail/{id}', 'UserController@detail');
    Route::get ('user/create', 'UserController@create');
    Route::post('user/create', array('before' => 'csrf', 'uses' => 'UserController@create'));
    Route::get ('user/update', 'UserController@update');
    Route::get ('user/update/{id}', 'UserController@update');
    Route::post('user/update/{id}', array('before' => 'csrf', 'uses' => 'UserController@update'));
    Route::get ('user/delete/{id}', 'UserController@delete');
    Route::get ('user/change_password/{id}', 'UserController@changePassword');
    Route::post('user/change_password/{id}', array('before' => 'csrf', 'uses' => 'UserController@changePassword'));
    Route::post('user/change_role', array('before' => 'csrf', 'uses' => 'UserController@changeRole'));
    
    Route::get ('group', 'GroupController@index');
    Route::get ('group/manage', 'GroupController@manage');
    Route::get ('group/detail/{id}', 'GroupController@detail');
    Route::get ('group/create', 'GroupController@create');
    Route::post('group/create', array('before' => 'csrf', 'uses' => 'GroupController@create'));
    Route::get ('group/update/{id}', 'GroupController@update');
    Route::post('group/update/{id}', array('before' => 'csrf', 'uses' => 'GroupController@update'));
    Route::get ('group/delete/{id}', 'GroupController@delete');
    
    Route::get ('menu', 'MenuController@index');
    Route::get ('menu/manage', 'MenuController@manage');
    Route::get ('menu/detail/{id}', 'MenuController@detail');
    Route::get ('menu/create', 'MenuController@create');
    Route::post('menu/create', array('before' => 'csrf', 'uses' => 'MenuController@create'));
    Route::get ('menu/update/{id}', 'MenuController@update');
    Route::post('menu/update/{id}', array('before' => 'csrf', 'uses' => 'MenuController@update'));
    Route::get ('menu/delete/{id}', 'MenuController@delete');
    
    Route::get ('permission', 'PermissionController@index');
    Route::get ('permission/manage', 'PermissionController@manage');
    Route::get ('permission/detail/{id}', 'PermissionController@detail');
    Route::get ('permission/create', 'PermissionController@create');
    Route::post('permission/create', array('before' => 'csrf', 'uses' => 'PermissionController@create'));
    Route::get ('permission/update/{id}', 'PermissionController@update');
    Route::post('permission/update/{id}', array('before' => 'csrf', 'uses' => 'PermissionController@update'));
    Route::get ('permission/delete/{id}', 'PermissionController@delete');

});

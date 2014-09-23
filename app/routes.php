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

// Show pages.
Route::get('/user', 'UserController@index');
Route::get('/user/register', 'UserController@register');
Route::get('/user/login', 'UserController@login');

// Handle form submissions.
Route::post('/user/register', 'UserController@handleRegister');
Route::post('/user/login', 'UserController@handleLogin');

Route::get('/', function() {
    return View::make('index');
});

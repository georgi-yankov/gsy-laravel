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

// Bind route parameters.
Route::model('game', 'Game');

// Secret page, needs to be logged in.
Route::get('/crush', array(
    'before' => 'auth',
    function() {
        return View::make('crush');
    }
));

// Show pages.
Route::get('/', 'GamesController@index');
Route::get('/create', 'GamesController@create');
Route::get('/edit/{game}', 'GamesController@edit');
Route::get('/delete/{game}', 'GamesController@delete');

Route::get('/user', 'UserController@index');
Route::get('/user/register', 'UserController@register');
Route::get('/user/login', 'UserController@login');
Route::get('/user/logout', 'UserController@logout');

// Handle form submissions.
Route::post('/create', 'GamesController@handleCreate');
Route::post('/edit', 'GamesController@handleEdit');
Route::post('/delete', 'GamesController@handleDelete');

Route::post('/user/register', 'UserController@handleRegister');
Route::post('/user/login', 'UserController@handleLogin');

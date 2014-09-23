<?php

class UserController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        echo 'index action from UserController';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function register() {
        return View::make('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function handleRegister() {
        $data = Input::all();
        $user = new User();
        $user->saveUser($data);
        return Redirect::to('/user/register');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

    public function login() {
        return View::make('login');
    }

    public function handleLogin() {
        $data = Input::all();
        $user = new User();
        $user->loginUser($data);
        return Redirect::to('/user/login');
    }

}

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
        // get the POST data
        $data = Input::all();

        // create a new model instance
        $user = new User();

        // attempt validation
        if ($user->registerValidate($data)) {
            // success
            return Response::make('User created! Hurray!');
        } else {
            // error
            $validator = $user->getValidator();
            return Redirect::action('UserController@register')->withErrors($validator)->withInput();
        }
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

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function login() {
        return View::make('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function handleLogin() {
        // get the POST data
        $data = Input::all();

        // create a new model instance
        $user = new User();

        // attempt validation
        if ($user->loginValidate($data)) {
            // success
            $credentials = Input::only('email', 'password');
            $remember = Input::has('remember');
            
            if (Auth::attempt($credentials, $remember)) {
                return Redirect::intended('/');
            }
            
            return Redirect::to('/user/login');
        } else {
            // error
            $validator = $user->getValidator();
            return Redirect::action('UserController@login')->withErrors($validator)->withInput();
        }
    }

    public function logout() {
        Auth::logout();
        return Redirect::to('/user/login');
    }

}

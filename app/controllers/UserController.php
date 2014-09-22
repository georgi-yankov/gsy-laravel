<?php

class UserController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return View::make('registration');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $data = Input::all();
        $rules = array(
            'input-username' => 'required|min:5|max:50',
            'input-email' => 'required|email',
            'input-password' => 'required|min:7|max:50',
            'input-repeat-password' => 'same:input-password'
        );
        $validator = Validator::make($data, $rules, array(
            'input-username.min' => 'The username must be at least 5 characters.',
            'input-email.email' => 'The email must be a valid email address.',
            'input-password.min' => 'The password must be at least 7 characters.',
            'input-repeat-password.same' => 'The repeat-password and password must match.'
        ));

        if ($validator->fails()) {
            return Redirect::to('/user/create')->withErrors($validator)->withInput();
        } else {
            echo 'OK';
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

}

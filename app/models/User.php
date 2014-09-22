<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait,
        RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

    public function saveUser($data) {
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
            DB::insert('INSERT INTO users (username, email, password) VALUES (?, ?, ?)', [$data['input-username'], $data['input-email'], $data['input-password']]);
        }
    }

}

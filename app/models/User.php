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
    protected $primaryKey = 'user_id';
    public $timestamps = false;

    public function saveUser($data) {
        $rules = array(
            'username' => 'required|alpha_num|min:5|max:50',
            'email' => 'required|email',
            'password' => 'required|min:7|max:50',
            'repeat-password' => 'same:password'
        );
        $validator = Validator::make($data, $rules, array(
                    'username.min' => 'The username must be at least 5 characters.',
                    'email.email' => 'The email must be a valid email address.',
                    'password.min' => 'The password must be at least 7 characters.',
                    'repeat-password.same' => 'The repeat-password and password must match.'
        ));

        if ($validator->fails()) {
            return Redirect::to('/user/register')->withErrors($validator)->withInput();
        } else {
            DB::insert('INSERT INTO users (username, email, password) VALUES (?, ?, ?)', [$data['username'], $data['email'], $data['password']]);
        }
    }

    public function loginUser($data) {
        $rules = array(
            'email' => 'required|email',
            'password' => 'required|min:7|max:50'
        );
        $validator = Validator::make($data, $rules, array(
                    'email.email' => 'The email must be a valid email address.',
                    'password.min' => 'The password must be at least 7 characters.'
        ));

        if ($validator->fails()) {
            return Redirect::to('/user/login')->withErrors($validator)->withInput();
        } else {
            if ($user = User::whereRaw('email = ? and password = ?', [$data['email'], $data['password']])->firstOrFail()) {
                echo 'exist user';
                die();
            } else {
                echo 'user not exist';
                die();
            }
        }
    }

}

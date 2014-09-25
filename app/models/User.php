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

    /**
     * Specifies which attributes should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = array('username', 'password', 'email');

    /**
     * Validation rules for the registration form
     * 
     * @var array
     */
    private $registerRules = array(
        'username' => 'required|alpha_num|min:5|max:50|unique:users',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:7|max:50',
        'repeat-password' => 'same:password'
    );

    /**
     * Validation rules for the login form
     * 
     * @var array
     */
    private $loginRules = array(
        'email' => 'required|email',
        'password' => 'required|min:7|max:50'
    );

    /**
     * Keeps the validator object
     * 
     * @var object 
     */
    private $validator;

    /**
     * Validate data from the registration form
     * 
     * @param type $data The POST data
     * @return boolean
     */
    public function registerValidate($data) {
        // make a new validator object
        $v = Validator::make($data, $this->registerRules);

        // check for failure
        if ($v->fails()) {
            $this->validator = $v;
            return false;
        }

        // validation pass
        $this->insertUser($data);
        return true;
    }

    public function loginValidate($data) {
        // make a new validator object
        $v = Validator::make($data, $this->loginRules);

        // check for failure
        if ($v->fails()) {
            $this->validator = $v;
            return false;
        }

        // validation pass
        return true;
    }

    /**
     * Inserts new user in the database
     * 
     * @param type $data The POST data
     */
    private function insertUser($data) {
        $dateTime = new DateTime;

        $this->username = $data['username'];
        $this->password = Hash::make($data['password']);
        $this->email = $data['email'];
        $this->created_at = $dateTime;
        $this->updated_at = $dateTime;
//        $this->remember_token = $data['_token'];
        $this->save();
    }

    /**
     * Getter for the validator object
     * 
     * @return type
     */
    public function getValidator() {
        return $this->validator;
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier() {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword() {
        return $this->password;
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail() {
        return $this->email;
    }

    public function getRememberToken() {
        return $this->remember_token;
    }

    public function setRememberToken($value) {
        $this->remember_token = $value;
    }

    public function getRememberTokenName() {
        return 'remember_token';
    }

}

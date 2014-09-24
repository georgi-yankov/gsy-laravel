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
     * Overrides the convention that each table has a primary key column
     * named id.
     * 
     * @var string
     */
    protected $primaryKey = 'user_id';
    public $timestamps = false;

    /**
     * Specifies which attributes should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = array('username', 'email', 'password');

    /**
     * Validation rules for the registration form
     * 
     * @var array
     */
    private $rules = array(
        'username' => 'required|alpha_num|min:5|max:50|unique:users',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:7|max:50',
        'repeat-password' => 'same:password'
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
    public function validate($data) {
        // make a new validator object
        $v = Validator::make($data, $this->rules);

        // check for failure
        if ($v->fails()) {
            $this->validator = $v;
            return false;
        }

        // validation pass
        $this->insertUser($data);
        return true;
    }

    /**
     * Inserts new user in the database
     * 
     * @param type $data The POST data
     */
    private function insertUser($data) {
        // DB::insert('INSERT INTO users (username, email, password) VALUES (?, ?, ?)', [$data['username'], $data['email'], $data['password']]);
        $this->username = $data['username'];
        $this->email = $data['email'];
        $this->password = Hash::make($data['password']);
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

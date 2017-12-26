<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $attributes = [
        'image' => '/gmsgroup/img/user/default.png',
        'role' => 3,
        'password' => "{bcrypt('admin')}"
    ];

    /*
     * Enable mass assign for attributes
     *
     * @var array*/
    protected $fillable = [

        'name', 'email', 'password',
    ];

    /*
     * Associate roles with numbers
     *
     * @val array*/
    public $roles = [
        0   => "Developer",
        1   => "Manager",
        2   => "Admin",
        3   => "Editor"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*
     * Show the full name for a user
     *
     * @param void
     * @return string
     * */
    public function fullName()
    {
        if($this->first_name != null){
            return $this->first_name . ' ' . $this->last_name;
        }
        return $this->username;
    }

    /*
     * Check for user role
     *
     * @param void
     * @return string
     * */
    public function role()
    {
        foreach ($this->roles as $key => $value)
        {
            if ($this->role == $key){
                return $value;
            }
        }
    }
}

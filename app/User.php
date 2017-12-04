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
        'image' => GMS::ROOT . '/img/user/default.png',
        'role' => 3,
        'password' => "{bcrypt('admin')}"
    ];

    protected $fillable = [

        'name', 'email', 'password',
    ];

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

    public function fullName()
    {
        if($this->first_name != null){
            return $this->first_name . ' ' . $this->last_name;
        }
        return $this->username;
    }

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

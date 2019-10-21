<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function cars(){
        return $this->hasMany('App\Cars');
    }

    public function roles(){
        return $this->hasOne('App\Roles');
    }

    public function product(){
        return $this->hasMany('App\Product');
    }

    public function isAdmin(){
        if($this->roles->is_admin == "administrator"){
            return true;
        }
        return false;
    }
}

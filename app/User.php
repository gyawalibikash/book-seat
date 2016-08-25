<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    public function Profile()
    {
        return $this->hasOne('App\Profile');
    }

    public function BookSeat()
    {
        return $this->hasOne('App\BookSeat');
    }

    public function Role()
    {
        return $this->hasOne('App\Role');
    }

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

}

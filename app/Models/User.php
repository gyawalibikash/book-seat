<?php

namespace App\Models;

use Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()
    {
        return $this->hasOne('App\Models\Profile');
    }

    public function bookSeat()
    {
        return $this->hasMany('App\Models\BookSeat');
    }

    public function role()
    {
        return $this->hasOne('App\Models\Role');
    }

    public function isAdmin() 
    {
        $role_id = Auth::user()->role_id;
        $id = Role::whereName('ROLE_ADMIN')->pluck('id')->first();

        if ( $role_id == $id )
        {
            return true;
        }
    }
}

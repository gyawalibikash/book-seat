<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cinehall extends Model
{
    protected $table = 'cinehall';

    protected $fillable = ['name', 'address', 'contact'];

    public function hall()
    {
        return $this->hasMany('App\Models\Hall');
    }

    public function bookseat()
    {
        return $this->hasMany('App\Models\Bookseat');
    }

    public function group()
    {
        return $this->belongsToMany('App\Models\Group');
    }
}

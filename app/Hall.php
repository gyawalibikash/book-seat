<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    protected $fillabale = ['name'];

    public function Cinehall()
    {
        return $this->belongsToMany('App\Cinehall');
    }

    public function Bookseat()
    {
        return $this->hasOne('App\Bookseat');
    }
}

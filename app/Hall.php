<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    protected $fillabale = ['name'];

    public function Cinehall()
    {
        return $this->belongsTo('App\Cinehall');
    }

    public function Bookseat()
    {
        return $this->hasOne('App\Bookseat');
    }

    public function Group()
    {
        return $this->belongsTo('App\Group');
    }

}

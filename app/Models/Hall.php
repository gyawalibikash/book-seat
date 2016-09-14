<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    protected $fillabale = ['name', 'cinehall_id'];

    public function cinehall()
    {
        return $this->belongsTo('App\Models\Cinehall');
    }

    public function bookseat()
    {
        return $this->belongsToMany('App\Models\Bookseat');
    }

    public function group()
    {
        return $this->belongsToMany('App\Models\Group');
    }

}

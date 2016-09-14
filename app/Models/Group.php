<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['movie_id', 'showtime_id', 'cinehall_id', 'hall_id', 'date'];

    public function movies()
    {
        return $this->hasMany('App\Models\Movies');
    }

    public function showTime()
    {
        return $this->hasMany('App\Models\ShowTime');
    }

    public function hall()
    {
        return $this->hasMany('App\Models\Hall');
    }

    public function cinehall()
    {
        return $this->hasMany('App\Models\Cinehall');
    }
}

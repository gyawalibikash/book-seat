<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    protected $fillable =  ['moviename', 'description', 'release_date', 'run_time', 'director', 'cast', 'poster'];

    public function bookSeat()
    {
        return $this->belongsToMany('App\Models\BookSeat');
    }

    public function group()
    {
        return $this->belongsToMany('App\Models\Group');
    }
}

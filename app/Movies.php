<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    protected $fillable =  ['moviename', 'poster'];

    public function BookSeat()
    {
        return $this->belongsTo('App\BookSeat');
    }

    public function group()
    {
        return $this->hasMany('App\Group', 'movie_id');
    }

}

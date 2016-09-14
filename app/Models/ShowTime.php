<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShowTime extends Model
{
    protected $table = "showtime";

    protected $fillable = ['time'];

    public function bookSeat()
    {
        return $this->belongsToMany('App\Models\BookSeat');
    }

    public function group()
    {
        return $this->belongsToMany('App\Models\Group');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShowTime extends Model
{
    protected $table = "showtime";

    protected $fillable = ['time'];

    public function BookSeat()
    {
        return $this->belongsTo('App\BookSeat');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookSeat extends Model
{
    protected $table = "bookseat1";

    protected $fillable =  ['name', 'status', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function Movies()
    {
        return $this->hasOne('App\Movies');
    }

    public function ShowTime()
    {
        return $this->hasOne('App\ShowTime');
    }
}

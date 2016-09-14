<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookSeat extends Model
{
    protected $table = "bookseat";

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

    public function Hall()
    {
        return $this->hasOne('App\Hall');
    }
    public function Cinehall()
    {
        return $this->hasOne('App\Cinehall');
    }
}

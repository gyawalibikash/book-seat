<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = "group";

    protected $fillable =  ['movie_id', 'showtime_id', 'cinehall_id','hall_id','day_id'];

    public function Movies()
    {
        return $this->hasOne('App\Movies');
    }

    public function ShowTime()
    {
        return $this->hasOne('App\ShowTime');
    }

    public function Day()
    {
        return $this->hasOne('App\Day');
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

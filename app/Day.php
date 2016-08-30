<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $fillable= ['day'];

    public function BookSeat()
    {
        return $this->belongsTo('App\BookSeat');
    }

    public function Group()
    {
        return $this->belongsTo('App\Group');
    }

}

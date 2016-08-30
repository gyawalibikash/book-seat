<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cinehall extends Model
{
    protected $table = 'cinehall';
    protected $fillable = ['name', 'address', 'contact'];

    public function Hall()
    {
        return $this->hasMany('App\Hall');
    }

    public function Bookseat()
    {
        return $this->hasOne('App\Bookseat');
    }

    public function Group()
    {
        return $this->belongsTo('App\Group');
    }

}


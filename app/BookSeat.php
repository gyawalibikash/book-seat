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
}

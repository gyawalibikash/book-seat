<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookSeat extends Model
{
    protected $fillable =  ['name', 'status', 'user_id'];
    public $table = "bookseat";

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

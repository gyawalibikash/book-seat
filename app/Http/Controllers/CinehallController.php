<?php

namespace App\Http\Controllers;

use App\Cinehall;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Movies;

class CinehallController extends Controller
{
    public function getIndex()
    {

    }
    public function getShow()
    {
        $movie_id = $_GET['movie'];
        $movie = Movies::findOrFail($movie_id);

        $cinehalls = Cinehall::all();

        return view('cinehall.index',compact('cinehalls', 'movie'));
    }
}

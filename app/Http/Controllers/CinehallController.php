<?php

namespace App\Http\Controllers;

use App\Cinehall;
use App\Group;
use App\Hall;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Movies;

class CinehallController extends Controller
{
    public function getShow()
    {
        $movie_id = $_GET['movie'];
        $movie = Movies::findOrFail($movie_id);

        $cinehalls = Cinehall::with('hall')->get();
        
        return view('cinehall.index',compact('cinehalls', 'movie'));
    }

    public function postStore()
    {
        $group = new Group();
        echo "hello";
    }
}

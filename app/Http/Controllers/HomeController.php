<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Movies;
use App\NextMovies;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movies::all();
        $nextMovies = NextMovies::all();
//        print_r($movies);
        return view('home',compact('movies', 'nextMovies'));
    }
}

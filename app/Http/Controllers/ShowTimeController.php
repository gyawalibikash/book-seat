<?php

namespace App\Http\Controllers;

use App\Cinehall;
use App\Group;
use App\Hall;
use App\Movies;
use App\NextMovies;
use App\ShowTime;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;

class ShowTimeController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return Response
     */
    public function getShowtime(Request $request)
    {
        $movie_id = $request->get('movie');
        $cinehall_id = $request->input('cinehall');
        $hall_id = $request->hall;

        // $movie = Movies::with(['group' => function($sql) {
        //     $sql->join('days as d', 'groups.day_id', '=', 'd.id')
        //     ->select('groups.*', 'd.*')
        //     ->groupBy('day_id')
        //     ->where('hall_id', $_GET['hall']);
        // }])->where('id', $movie_id)->first();

        // for($i = 0; $i < count($movie->group); $i++) {
        //     $days[$movie->group[$i]->day_id] = $movie->group[$i]->day;
        // }

        $movie = Movies::findOrfail($movie_id);
        $cinehall = Cinehall::findOrfail($cinehall_id);
        $hall = Hall::findOrfail($hall_id);

        $showtimes = ShowTime::all();

        $groups = Group::where(['movie_id'=>$movie_id, 'hall_id'=>$hall_id])->get();

        return view('showtime.index', compact('movie', 'cinehall', 'showtimes', 'hall', 'groups'));
    }

    public function getNew($id)
    {
        $nextMovies = NextMovies::findOrFail($id);
        return view('coming_soon.index', compact('nextMovies'));
    }
}

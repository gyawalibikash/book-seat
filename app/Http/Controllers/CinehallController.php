<?php

namespace App\Http\Controllers;

use App\BookSeat;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Cinehall;
use App\Group;
use App\Hall;
use App\Movies;
use App\ShowTime;
use Validator;

class CinehallController extends Controller
{
    public function getShow(Request $request)
    {
        $movie_id = $request->input('movie');
        $movie = Movies::findOrFail($movie_id);

        $cinehalls = Cinehall::with('hall')->get();

        $showtimes = ShowTime::lists('time','id');



        $current_date = date("Y-m-d");

        $groups = Group::where([
                        ['movie_id', $movie_id],
                        ['date', '>=', $current_date],
                    ])->get();                        

        return view('cinehall.index', compact('cinehalls', 'movie', 'showtimes', 'groups'));
    }

    public function postStore(Request $request)
    {
//        $this->validate($request, [
//            'date' => 'required',
//        ]);
        $query_string = $request['path'];
        $string = ltrim($query_string, '?');
        parse_str($string, $result);

        $movie_id = $result['movie'];

        parse_str($request['name'], $params);

        $date = $params['date'];
        $showtimes = $params['showtime'];

        unset($params['date']);
        unset($params['showtime']);

        foreach ($params as $cinehall => $hall_group) {
            foreach ($hall_group as $hall) {
                foreach ($showtimes as $show => $time) {      
                    $group = new Group();
                    $group->cinehall_id = $cinehall;
                    $group->hall_id = $hall;
                    $group->movie_id = $movie_id;
                    $group->showtime_id = $time;
                    $group->date = $date;

                    $group->save();

                    /* Group::create([
                        'cinehall_id' => ,
                        'hall_id' => ,
                        'movie_id' => ,
                        'showtime_id' => ,
                        'date' => ,
                    ]); */
                }
            }
        }

        return;
    }
}

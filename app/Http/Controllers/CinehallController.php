<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Cinehall;
use App\Group;
use App\Hall;
use App\Movies;
use App\ShowTime;

class CinehallController extends Controller
{
    public function getShow()
    {
        $movie_id = $_GET['movie'];
        $movie = Movies::findOrFail($movie_id);

        $cinehalls = Cinehall::with('hall')->get();

        $showtimes = ShowTime::lists('time','id');

        $groups = Group::groupBy('hall_id')->where('movie_id', $movie_id)->get();

        return view('cinehall.index',compact('cinehalls', 'movie', 'showtimes', 'groups'));
    }

    public function postStore(Request $request)
    {
        $query_string = $request['path'];
        $string = ltrim($query_string, '?');
        parse_str($string, $result);

        $movie_id = $result['movie'];

        parse_str($_POST['name'], $params);

        $date = $params['date'];
        $showtime_id = $params['showtime'];

        unset($params['date']);
        unset($params['showtime']);

        foreach ($params as $cinehall => $hall_group) {
            foreach ($hall_group as $hall) {
                $group = new Group();
                $group->cinehall_id = $cinehall;
                $group->hall_id = $hall;
                $group->movie_id = $movie_id;
                $group->showtime_id = $showtime_id;
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

        return;
    }
}

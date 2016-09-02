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

    public function postStore(Request $request)
    {
        $query_string = $request['path'];
        $string = ltrim($query_string, '?');
        parse_str($string, $result);

        $movie_id = $result['movie'];

        parse_str($_POST['name'], $params);

        foreach ($params as $cinehall => $hall) {

            foreach ($hall as $h) {
                $group = new Group();
                $group->cinehall_id = $cinehall;
                $group->hall_id = $h;
                $group->movie_id = $movie_id;
                $group->showtime_id = 15;
                $group->day_id = 8;

                $group->save();

                /*Group::create([
                    'cinehall_id' => $key,
                    'hall_id' => $v,
                    'movie_id' => 7,
                    'showtime_id' => 15,
                    'day_id' =>8,
                ]);*/

            }
        }

        return redirect('/');
    }
}

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
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getShow(Request $request)
    {
        $bookseats = BookSeat::all();

        $movie_id = $request->input('movie');
        $movie = Movies::findOrFail($movie_id);

//        //Determining the total seat that is already reserved
//        $bookedSeat=[];
//        foreach($bookseats as $booked){
//            if($booked->movie_id==$movie_id){
//                $bookedSeat[]=$booked;
//            }
//        }
//        $newSeat=[];
//        foreach($bookedSeat as $seat){
//            $newSeat=array_merge($newSeat,unserialize($seat->seat));
//        }

        $cinehalls = Cinehall::with('hall')->get();

        $showtimes = ShowTime::all();
        $current_date = date("Y-m-d");

        $groups = Group::where([
                        ['movie_id', $movie_id],
                        ['date', '>=', $current_date],
                    ])->get();

        return view('cinehall.index', compact('cinehalls', 'movie', 'showtimes', 'groups','bookseats','totalBookedSeat'));
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

<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\BookSeat;
use App\Models\Cinehall;
use App\Models\Group;
use App\Models\Hall;
use App\Models\Movies;
use App\Models\ShowTime;

class ShowTimeController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getNow(Request $request)
    {
        try {
            $movie_id = $request->input('movie');
            $movie = Movies::findOrFail($movie_id);

            $cinehalls = Cinehall::with('hall')->get();
  
            $current_date = date("Y-m-d");

            $groups = Group::where([
                            ['movie_id', $movie_id],
                            ['date', '>=', $current_date],
                        ])->get();

            $showtimes = ShowTime::all();
            $bookseats = BookSeat::all();

            return view('showtime.now', compact('cinehalls', 'movie', 'showtimes', 'groups', 'bookseats'));

        } catch (Exception $e) {
            return view('errors.503');
        }
    }

    public function postStore(Request $request)
    {
        // validation
        // $this->validate($request, [
        //     'date' => 'required',
        // ]);

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
                    Group::create([
                        'movie_id' => $movie_id,
                        'showtime_id' => $time,
                        'cinehall_id' => $cinehall,
                        'hall_id' => $hall,                        
                        'date' => $date,
                    ]);
                }
            }
        }
        return;
    }

    public function getNext($id)
    {
        try {
            $movie = Movies::findOrFail($id);
            return view('showtime.next', compact('movie'));
        } catch (Exception $e) {
            return view('errors.503');
        }
    }
}

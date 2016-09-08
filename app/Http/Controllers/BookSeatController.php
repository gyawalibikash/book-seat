<?php

namespace App\Http\Controllers;

use Auth;
use Event;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Events\TruncateBookSeatEvent;
use App\BookSeat;
use App\Cinehall;
use App\Hall;
use App\Movies;
use App\ShowTime;
use Exception;

class BookSeatController extends Controller
{

    /**
     *
     * @param Request
     * @throws Exception
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getMovieshow(Request $request)
    {
        try{
            $showtime_id = $request->get('showtime');
            $hall_id= $request->input('hall');
            $cinehall_id = $request->cinehall;
            $movie_id  = $request->movie;
//        $request->input('showtime');
//        $request->showtime;

//        $movie_id = $_GET['movie'];
//        $cinehall_id = $_GET['cinehall'];
//        $hall_id = $_GET['hall'];

            $cinehall = Cinehall::findOrfail($cinehall_id);
            $hall = Hall::findOrfail($hall_id);
            $showtime = ShowTime::findOrFail($showtime_id);
            $movie = Movies::find($movie_id);

            $bookseats = BookSeat::all();

            return view('bookseat.index', compact('bookseats', 'showtime', 'movie', 'cinehall', 'hall'));


        }catch (Exception $e){
            return view('errors.503');

        }
        //Event::fire(new TruncateBookSeatEvent(new BookSeat()));

           }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postMoviestore(Request $request)
    {
        $query_string = $request['path'];
        $string = ltrim($query_string, '?');
        parse_str($string, $result);

        $showTime = $result['showtime'];
        $movie_id = $result['movie'];
        $cinehall_id = $result['cinehall'];
        $hall_id = $result['hall'];
        $date = $result['date'];

        $bookseat = new BookSeat();
        $bookseat->seat = serialize($request['name']);
        $bookseat->user_id = Auth::user()->id;
        $bookseat->showtime_id = $showTime;
        $bookseat->movie_id = $movie_id;
        $bookseat->date = $date;
        $bookseat->hall_id = $hall_id;
        $bookseat->cinehall_id = $cinehall_id;

        $bookseat->save();

        return;
    }
}

<?php

namespace App\Http\Controllers;

use App\Images;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\BookSeat;


use Auth;

use Event;

use App\Events\TruncateBookSeatEvent;

class BookSeatController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //Event::fire(new TruncateBookSeatEvent(new BookSeat()));

        $bookSeat = BookSeat::all();
        $images = Images::all();
        return view('bookseat.index', compact('bookSeat','images'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $bookseat = new BookSeat();
        $bookseat->name = $request['name'];
        $bookseat->status = 1;
        $bookseat->user_id = Auth::user()->id;

        $bookseat->save();

        return redirect('bookseat');
    }

}

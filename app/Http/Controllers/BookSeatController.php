<?php

namespace App\Http\Controllers;

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
        return view('bookseat.index', compact('bookSeat'));
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

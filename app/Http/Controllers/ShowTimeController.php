<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ShowTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getShowtime()
    {
        return view('showtime.index');
    }
}

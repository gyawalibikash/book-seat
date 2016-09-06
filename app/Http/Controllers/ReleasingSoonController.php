<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ReleasingSoonController extends Controller
{
    public function index()
    {
        return view('releasing_soon.index');
    }

    public function store()
    {
        return 'store';
    }
}

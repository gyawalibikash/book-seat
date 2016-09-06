<?php

namespace App\Http\Controllers;

use App\NextMovies;
use App\Http\Requests\ImageRequest;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;

class ReleasingSoonController extends Controller
{
    public function index()
    {
        return view('releasing_soon.index');
    }

    public function store(ImageRequest $request)
    {
        $logo = $request->file('poster');

        $name = $logo->getClientOriginalName();

        $success = $logo->move(base_path('public/images/coming_soon'), $name);

        if($success)
        $nextmovies = new NextMovies();
        $nextmovies->moviename = $request->Input('moviename');
        $nextmovies->description = $request->Input('description');
        $nextmovies->release_date = $request->Input('release_date');
        $nextmovies->run_time = $request->Input('run_time');
        $nextmovies->cast = $request->Input('cast');
        $nextmovies->director = $request->Input('director');

        $nextmovies->poster = $name;

        Session::flash('success','Data entry sucucessfull');

        $nextmovies->save();

        return redirect('/');
    }

    public function destroy($id)
    {
//        $movie = Movies::findOrFail($id);
//        $movie->delete();
//
//        Session::flash('success', 'The Movie is successfully Deleted !');
//
//        return redirect()->route('home');

    }

    public function edit($id)
    {
//        $movie = Movies::find($id);
//        return view('uploads.edit', ['movie' => $movie]);
    }

    public function update(ImageRequest $request,$id)
    {
//        // validation
//        $movie = Movies::findOrFail($id);
//
//        $movie->moviename       =   $request->input('moviename');
//        $movie->description     =   $request->input('description');
//        $movie->release_date    =   $request->input('release_date');
//        $movie->run_time        =   $request->input('run_time');
//        $movie->director        =   $request->input('director');
//        $movie->cast            =   $request->input('cast');
//
//        $movie->save();
//
//        Session::flash('success', 'The Movie successfully updated !');
//
//        return redirect()->route('home',[$request->id]);

    }
}

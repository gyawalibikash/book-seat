<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\ImageRequest;

use App\Movies;

use App\NextMovies;

use Illuminate\Support\Facades\Session;

class MovieUploadController extends Controller
{

    public function getIndex()
    {
        return view('uploads.upload');
    }

    public function postUpload(ImageRequest $request)
    {
        $logo= $request->file('poster');

        $name=$logo->getClientOriginalName();

        $success = $logo->move(base_path('public/images/now_showing'),$name);

        if($success)
        $movies = new Movies();
        $movies->moviename = $request->Input('moviename');
        $movies->description = $request->Input('description');
        $movies->release_date = $request->Input('release_date');
        $movies->run_time = $request->Input('run_time');
        $movies->cast = $request->Input('cast');
        $movies->director = $request->Input('director');

        $movies->poster = $name;

        Session::flash('success','Data entry successfull');

        $movies->save();

        return redirect('/');
    }

    public function postNewupload(ImageRequest $request)
    {
        $logo= $request->file('poster');

        $name=$logo->getClientOriginalName();

        $success = $logo->move(base_path('/public/images/coming_soon'),$name);

        if($success)
        $movies = new NextMovies();
        $movies->moviename = $request->Input('moviename');
        $movies->poster = $name;

        Session::flash('success','Data entry successfull');

        $movies->save();
//        save to database
        return redirect('/');

    }

}

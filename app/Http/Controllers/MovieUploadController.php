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

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex()
    {
//        return "Uplaod your image";
        return view('uploads.upload');
    }

    public function postUpload(ImageRequest $request)
    {
        $logo= $request->file('poster');

        $name=$logo->getClientOriginalName();

        $success = $logo->move(base_path('/public/images/now_showing'),$name);

        if($success)
        $movies = new Movies();
        $movies->moviename = $request->Input('moviename');
        $movies->poster = $name;

        Session::flash('success','Data entry successfull');

        $movies->save();
//        save to database
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

    public function getNew($id)
    {
        $nextMovies =NextMovies::findOrFail($id);
        return view('coming_soon.index',compact('nextMovies'));
    }

}

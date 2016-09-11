<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\ImageRequest;

use App\Movies;

use App\NextMovies;

use Illuminate\Support\Facades\Session;

use Input;
use Image;

class MovieUploadController extends Controller
{

    public function index()
    {
        return view('uploads.upload');
    }

    public function store(Request $request)
    {
        $base64_image = $request->imageData;
        $image_string = explode(',', $base64_image);
        $image = base64_decode($image_string[1]);

        parse_str($request->formData, $params);
        $movieName = $params['moviename'];
        $name = strtolower(str_replace(" ", "_", $movieName)).'.jpeg';

        // $logo = $request->file('poster');      
        // $name = $logo->getClientOriginalName();

        $img = Image::make($image);  
        $path = public_path().'/images/';
        $success = $img->save($path.$name);        

        if($success)
        $movies = new Movies();
        $movies->moviename = $params['moviename'];
        $movies->description = $params['description'];
        $movies->release_date = $params['release_date'];
        $movies->run_time = $params['run_time'];
        $movies->cast = $params['cast'];
        $movies->director = $params['director'];

        $movies->poster = $name;

        Session::flash('success','Data entry successfull');

        $movies->save();

        return;
    }
    
    public function destroy($id)
    {
        $movie = Movies::findOrFail($id);
        $movie->delete();

        Session::flash('success', 'The Movie is successfully Deleted !');

        return redirect()->route('home');

    }

    public function edit($id)
    {
        $movie = Movies::find($id);
        return view('uploads.edit', ['movie' => $movie]);
    }

    public function update(ImageRequest $request,$id)
    {
            // validation
            $movie = Movies::findOrFail($id);

            $movie->moviename       =   $request->input('moviename');
            $movie->description     =   $request->input('description');
            $movie->release_date    =   $request->input('release_date');
            $movie->run_time        =   $request->input('run_time');
            $movie->director        =   $request->input('director');
            $movie->cast            =   $request->input('cast');

            $movie->save();

            Session::flash('success', 'The Movie successfully updated !');

            return redirect()->route('home',[$request->id]);

    }
}

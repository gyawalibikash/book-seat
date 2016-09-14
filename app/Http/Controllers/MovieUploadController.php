<?php

namespace App\Http\Controllers;

use Image;
use Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Http\Requests\ImageRequest;
use App\Models\Movies;

class MovieUploadController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        return view('uploads.upload');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
    public function store(ImageRequest $request)
    {
        try {
            $base64_image = $request->image;
            $image_string = explode(',', $base64_image);
            $image = base64_decode($image_string[1]);

            $movieName = $request->moviename;
            $name = strtolower(str_replace(" ", "_", $movieName)).'.jpeg';

            // $logo = $request->file('poster');      
            // $name = $logo->getClientOriginalName();

            $img = Image::make($image);  
            $path = public_path().'/images/';
            $success = $img->save($path.$name);        

            if($success)
            $movies = new Movies();
            $movies->moviename = $movieName;
            $movies->description = $request->description;
            $movies->release_date = $request->release_date;
            $movies->run_time = $request->run_time;
            $movies->cast = $request->cast;
            $movies->director = $request->director;
            $movies->poster = $name;
            $movies->save();

            Session::flash('success','Data entry successfull');   

            return;

        } catch (Exception $e) {
            return view('errors.503');
        }     
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function edit($id)
    {
        $movie = Movies::find($id);
        return view('uploads.edit', ['movie' => $movie]);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function update(ImageRequest $request,$id)
    {
        // validation
        $movie = Movies::findOrFail($id);
        $movie->moviename = $request->input('moviename');
        $movie->description = $request->input('description');
        $movie->release_date = $request->input('release_date');
        $movie->run_time = $request->input('run_time');
        $movie->director = $request->input('director');
        $movie->cast = $request->input('cast');
        $movie->save();

        Session::flash('success', 'The Movie successfully updated !');

        return redirect()->route('home', [$request->id]);
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function destroy($id)
    {
        $movie = Movies::findOrFail($id);
        $movie->delete();

        Session::flash('success', 'The Movie is successfully Deleted !');

        return redirect()->route('home');
    }
}

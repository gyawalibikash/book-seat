<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\ImageRequest;

use App\Images;

use Illuminate\Support\Facades\Session;

class ImageController extends Controller
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
        $logo= $request->file('image');

        $name=$logo->getClientOriginalName();

        $success = $logo->move(base_path('/public/images'),$name);

        if($success)
        $images = new Images();
        $images->moviename = $request->Input('moviename');
        $images->image = $name;

        Session::flash('success','Data entry successfull');

        $images->save();
//        save to database
        return redirect()->route('bookseat.index');
    }
}

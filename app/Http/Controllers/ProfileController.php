<?php

namespace App\Http\Controllers;

use App\Profile;

use App\User;

use Auth;

use Validator;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProfileController extends Controller
{
    //validation
    protected $rules = [
        'address' => 'required',
        'contact_no' => 'required',
        'gender' => 'required',
    ];

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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);

        // The blog post is valid, store in database...
        $profile = new Profile();

        $profile->address = $request->Input('address');
        $profile->contact_no = $request->Input('contact_no');
        $profile->gender = $request->Input('gender');
        $profile->user_id = $request->user()->id;

        $profile->save();

//        $user = Auth::user();
//        //die($user);
//        $user_id = $user->id;
//
//        die($user_id);
//        Profile::create($profile);

        return redirect('home');
    }
}

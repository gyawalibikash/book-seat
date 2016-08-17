<?php

namespace App\Http\Controllers;

use App\Profile;

use Auth;

use Validator;
use Session;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\UserRequest;

class ProfileController extends Controller
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
        return view('profile.profile');
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
    public function store(UserRequest $request)
    {
        die("aaa");
        $profile = new Profile();

        // The blog post is valid, store in database...


        $profile->address = $request->Input('address');
        $profile->contact_no = $request->Input('contact_no');
        $profile->gender = $request->Input('gender');


        $profile->save();


        Session::flash('success', 'Your Profile is successfully created !');

        return redirect('profile');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($user_id)
    {
        $profile =  Profile::where('user_id',$user_id)->first();

        if (!$profile) {
            return view('profile.create');
        }
        return view('profile.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($user_id)
    {
        $profile = Profile::where('user_id',$user_id)->first();
        return view('profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $user_id)
    {
        $this->validate($request, $this->rules);

        $profileUpdate = $request->all();
        $profile = Profile::where('user_id',$user_id)->first();
        $profile->update($profileUpdate);

        Session::flash('success', 'Your Profile is successfully updated !');

        return redirect('profile');

    }
}

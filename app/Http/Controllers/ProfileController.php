<?php

namespace App\Http\Controllers;

use App\Profile;

use Auth;
use Session;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UserRequest;

class ProfileController extends Controller
{

    public function index()
    {
        $profile = Profile::where('user_id', Auth::user()->id)->first();

        return view('profile.profile', compact('profile'));
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
        $profile = new Profile();
        $profile->address = $request->Input('address');
        $profile->contact_no = $request->Input('contact_no');
        $profile->gender = $request->Input('gender');
        $profile->user_id = $request->Input('user_id');

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
    public function update(UserRequest $request, $user_id)
    {

        $profileUpdate = $request->all();
        $profile = Profile::where('user_id',$user_id)->first();
        $profile->update($profileUpdate);

        Session::flash('success', 'Your Profile is successfully updated !');

        return redirect('profile');

    }
}

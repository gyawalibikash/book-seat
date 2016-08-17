<?php

namespace App\Http\Controllers;

use App\Profile;

use App\User;

use Auth;

use Validator;
use Session;

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


        Session::flash('success', 'Your Profile is successfully save !');

        return redirect('profile');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $profile = Profile::find($id);
        return view('profile.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $profile = Profile::find($id);
        return view('profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, $this->rules);

        $profileUpdate = $request->all();
        $profile = Profile::find($id);
        $profile->update($profileUpdate);

        return redirect('profile/{{ id }}', array( 'id' => $id ));

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests;

use Validator;
use Auth;
use App\User;

class SettingController extends Controller
{
    public function getIndex()
    {
        return view('setting.index');
    }

    public function postPasswordchange(Request $request)
    {
            $this->validate($request, [
                'old_password' => 'required',
                'password' => 'required|between:6,30|confirmed'
            ]);

        $user = Auth::user();
        $current_password = $request['old_password'];
        $password = bcrypt($request['password']);

        if(Hash::check($current_password,$user->password))
        {
            $user->password = $password;
            $user->save();
            return redirect('/profile/'.$user->id)->with('success', 'password changed successful');
        }else{
            return redirect()->back()->with('failure', 'The password doesnot match  !!!');
        }


    }
}

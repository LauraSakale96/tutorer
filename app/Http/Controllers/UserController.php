<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;


class UserController extends Controller
{
    public function profile()
    {
        return view('profile', array('user' => Auth::user()));
    }

    public function update_image(Request $request)
    {
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' .$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save (public_path('/uploads/image/' . $filename));

            $user = Auth::user();
            $user->image = $filename;
            $user->save();
        }

        return view('profile', array('user' =>Auth::user()));
    }
}


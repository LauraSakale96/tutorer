<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;


class UserController extends Controller
{
    public function profile()
    {
        return view('profile.profile', array('user' => Auth::user()));
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

        return view('profile.profile', array('user' =>Auth::user()));
    }

    public function edit(User $user)
    {
        $user = User::find($user->id );
        
            
               return view( 'profile.edit',array('user' =>Auth::user()));
    }

    
    public function update(Request $request, User $user)
    {
        $userUpdate = User::where('id', $user->id)
        ->update([
                'name'=> $request->input('name'),
                'lastname'=> $request->input('name'),
                'subject'=> $request->input('subject'),
                'education'=> $request->input('education'),
                'description'=> $request->input('description')
        ]);
        if($userUpdate){
        return redirect()->route('profile.profile', ['user'=> $user->id])
        ->with('success' , 'Profils ir veiksmīgi rediģēts!');
        }
    }
    
}


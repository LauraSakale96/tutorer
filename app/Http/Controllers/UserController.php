<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Image;


class UserController extends Controller
{
    //validācija, kas pārbauda profila bildes nosacījumus
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'image' => 'required',
            'image.*' => 'mimes:jpg,jpeg,png',
            
            
            
        ]);
    }
    //funkcija, kas atgriež profila skatu -> ar lietotāju, kas pašlaik ir autorizējies
    public function profile()
    {
        return view('profile.profile', array('user' => Auth::user()));
    }
    //atjauno profila bildi
    public function update_image(Request $request)
    {
        if($request->hasFile('image')){
            $image = $request->file('image'); //pieprasa bildi
            $filename = time() . '.' .$image->getClientOriginalExtension(); //saglabā ar klienta oriģinālo nosaukumu
            Image::make($image)->resize(300,300)->save (public_path('/uploads/image/' . $filename)); //bildi saglabā, nomaina izmēru 

            $user = Auth::user();
            $user->image = $filename;
            $user->save();
        }

        return view('profile.profile', array('user' =>Auth::user())); //pēc saglabāšanas lietotāju nosūta profila skatu
    }
        
}


<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    
    protected $redirectTo = '/home';

    
    public function __construct()
    {
        $this->middleware('guest');
    }

   //validācijas pārbaude
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'subject' =>'required|string|max:1000',
            'education' =>'required|string|max:100',
            'image'=>'string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|max:50|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    //izveido jaunu objektu
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'subject' => $data['subject'],
            'education' => $data['education'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Studentprofile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentprofilesController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
        $studentprofiles=Studentprofile::where('user_id', Auth::user()->id)->get();
        return view('studentprofiles.index', ['studentprofiles'=>$studentprofiles]);
        }
        
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function create()
    {
        
        
            
               return view( 'studentprofiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()){
            $studentprofile = Studentprofile::create([
                'name' => $request->input('name'),
                'lastname' => $request->input('lastname'),
                'age' => $request->input('age'),
                'school' => $request->input('school'),
                'description' => $request->input('description'),
                'image'=>$request->input('image'),
                'user_id' => Auth::user()->id
            ]);
            if($studentprofile){
                return redirect()->route('studentprofiles.show', ['studentprofile'=> $studentprofile->id])
                ->with('success' , 'Profils ir izveidots veiksmīgi!');
            }
        }
        
            return back()->withInput()->with('errors', 'Neizdevās izveidot Jūsu profilu!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Studentprofile $studentprofile)
    {
       
       $studentprofile = Studentprofile::find($studentprofile->id );

    
       return view( 'studentprofiles.show', ['studentprofile'=>$studentprofile]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Studentprofile $studentprofile)
    {
        $studentprofile = Studentprofile::find($studentprofile->id );
        
            
               return view( 'studentprofiles.edit', ['studentprofile'=>$studentprofile]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Studentprofile $studentprofile)
    {
        $studentprofileUpdate = Studentprofile::where('id', $studentprofile->id)
        ->update([
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'age' => $request->input('age'),
            'school' => $request->input('school'),
            'description' => $request->input('description'),
            'image'=>$request->input('image'),
        ]);
        if($StudentprofileUpdate){
        return redirect()->route('studentprofiles.show', ['studentprofile'=> $studentprofile->id])
        ->with('success' , 'Profils ir veiksmīgi rediģēts!');
        }
    }

    
}

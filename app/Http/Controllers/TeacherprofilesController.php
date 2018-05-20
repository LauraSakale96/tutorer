<?php

namespace App\Http\Controllers;

use App\Teacherprofile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherprofilesController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
        $teacherprofiles=Teacherprofile::where('user_id', Auth::user()->id)->get();
        return view('teacherprofiles.index', ['teacherprofiles'=>$teacherprofiles]);
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
        
        
            
               return view( 'teacherprofiles.create');
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
            $teacherprofile = Teacherprofile::create([
                'name' => $request->input('name'),
                'lastname' => $request->input('lastname'),
                'subject' => $request->input('subject'),
                'education' => $request->input('education'),
                'description' => $request->input('description'),
                'image'=>$request->input('image'),
                'user_id' => Auth::user()->id
            ]);
            if($teacherprofile){
                return redirect()->route('teacherprofiles.show', ['teacherprofile'=> $teacherprofile->id])
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
    public function show(Teacherprofile $teacherprofile)
    {
       
       $teacherprofile = Teacherprofile::find($teacherprofile->id );

    
       return view( 'teacherprofiles.show', ['teacherprofile'=>$teacherprofile]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacherprofile $teacherprofile)
    {
        $teacherprofile = Teacherprofile::find($teacherprofile->id );
        
            
               return view( 'teacherprofiles.edit', ['teacherprofile'=>$teacherprofile]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacherprofile $teacherprofile)
    {
        $teacherprofileUpdate = Teacherprofile::where('id', $teacherprofile->id)
        ->update([
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'subject' => $request->input('subject'),
            'education' => $request->input('education'),
            'description' => $request->input('description'),
            'image'=>$request->input('image'),
        ]);
        if($TeacherprofileUpdate){
        return redirect()->route('teacherprofiles.show', ['teacherprofile'=> $teacherprofile->id])
        ->with('success' , 'Profils ir veiksmīgi rediģēts!');
        }
    }

    
}

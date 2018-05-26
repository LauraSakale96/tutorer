<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectsController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'description' => 'required|longText',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
        $subjects=Subject::where('user_id', Auth::user()->id)->get();
        return view('subjects.index', ['subjects'=>$subjects]);
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
        
        
           return view( 'subjects.create');
            
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
            $subject = Subject::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'user_id' => Auth::user()->id
            ]);
            if($subject){
                return redirect()->route('subjects.show', ['subject'=> $subject->id])
                ->with('success' , 'Mācību priekšmetu ir izdevies veiksmīgi pievienot!');
            }
        }
        
            return back()->withInput()->with('errors', 'Pievienojot mācību priekšmetu radās kļūda!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
      
       $subject = Subject::find($subject->id );

    
       return view( 'subjects.show', ['subject'=>$subject]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\  
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        $subject = Subject::find($subject->id );
        
            
               return view( 'subjects.edit', ['subject'=>$subject]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $subjectUpdate = Subject::where('id', $subject->id)
        ->update([
                'name'=> $request->input('name'),
                'description'=> $request->input('description')
        ]);
        if($subjectUpdate){
        return redirect()->route('subjects.show', ['subject'=> $subject->id])
        ->with('success' , 'Priekšmets ir veiksmīgi rediģēts!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        
        $findSubject = Subject::find( $subject->id);
		if($findSubject->delete()){
            
            //redirect
            return redirect()->route('subjects.index')
            ->with('success' , 'Priekšmets ir veiksmīgi izdzēsts!');
        }
        return back()->withInput()->with('error' , 'Priekšmetu neizdevās izdzēst!');
        
    }
    }


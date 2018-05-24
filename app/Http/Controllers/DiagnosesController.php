<?php

namespace App\Http\Controllers;

use App\Diagnose;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiagnosesController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'description' => 'longText|max:500',
            'treatment' => 'longText|max:1000',
           
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
        $diagnoses=Diagnose::where('user_id', Auth::user()->id)->get();
        return view('diagnoses.index', ['diagnoses'=>$diagnoses]);
        }
        
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($student_id= null)
    {
        $students = null;
            if (!$student_id){

                $students = Student::where('user_id', Auth::user()->id)->get();
            }
            
            
               return view( 'diagnoses.create', ['student_id'=>$student_id, 'students'=>$students]);
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
            $diagnose = Diagnose::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'treatment'=>$request->input('treatment'),
                'student_id' => $request->input('student_id'),
                'user_id' => Auth::user()->id,
                
            ]);
            if($diagnose){
                return redirect()->route('diagnoses.show', ['diagnose'=> $diagnose->id])
                ->with('success' , 'Diagnoze ir pievienota veiksmīgi');
            }
        }
        
            return back()->withInput()->with('errors', 'Neizdevās pievienot jaunu diagnozi');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Diagnose $diagnose)
    {
       
       $diagnose = Diagnose::find($diagnose->id );
       

    
       return view( 'diagnoses.show', ['diagnose'=>$diagnose]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Diagnose $diagnose)
    {
        $diagnose = Diagnose::find($diagnose->id );
        
            
               return view( 'diagnoses.edit', ['diagnose'=>$diagnose]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Diagnose $diagnose)
    {
        $diagnoseUpdate = Diagnose::where('id', $diagnose->id)
        ->update([
                'name'=> $request->input('name'),
                'description'=> $request->input('description'),
                'treatment'=>$request->input('treatment'),              
        ]);
        if($diagnoseUpdate){
        return redirect()->route('diagnoses.show', ['diagnose'=> $diagnose->id])
        ->with('success' , 'Diagnoze ir veiksmīgi rediģēta');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Diagnose $diagnose)
    {
        
        $finddiagnose = Diagnose::find( $diagnose->id);
		if($finddiagnose->delete()){
            
            //redirect
            return redirect()->route('diagnoses.index')
            ->with('success' , 'Diagnoze veiksmīgi izdzēsta');
        }
        return back()->withInput()->with('error' , 'Diagnoze neizdevās dzēst');
        
    }
}

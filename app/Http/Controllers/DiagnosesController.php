<?php

namespace App\Http\Controllers;

use App\Diagnose;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DiagnosesController extends Controller
{
    //validācijas funkcija
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'description' => 'string|max:500',
            'treatment' => 'string|max:1000',
           
        ]);
    }
     //atgriež sarakstu ar visām autorizētā lietotāja pievienotajām diagnozēm
    public function index()
    {
        if(Auth::check()){
        $diagnoses=Diagnose::where('user_id', Auth::user()->id)->get();
        return view('diagnoses.index', ['diagnoses'=>$diagnoses]);
        }
        
        return view('auth.login');
    }

   //izveido diagnozi
    public function create($student_id= null)
    {
        $students = null;
            if (!$student_id){  //ļauj attēlot visus studentus, lai varētu parādīt sarakstu un izvēlēties, kuram skolēnam pievienot diagnozi

                $students = Student::where('user_id', Auth::user()->id)->get();
            }     
               return view( 'diagnoses.create', ['student_id'=>$student_id, 'students'=>$students]);
    }

    //saglabā datus datubāzē
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
    //atgriež konkrētās diagnozes skatu
    public function show(Diagnose $diagnose)
    {
       
       $diagnose = Diagnose::find($diagnose->id );
       
       return view( 'diagnoses.show', ['diagnose'=>$diagnose]);
    }
    //atgriež rediģēšanas skatu
    public function edit(Diagnose $diagnose)
    {
        $diagnose = Diagnose::find($diagnose->id );
        
            
               return view( 'diagnoses.edit', ['diagnose'=>$diagnose]);
    }

   //atjauno informāciju par diagnozi
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

    //izdzēš konkrētos datus
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

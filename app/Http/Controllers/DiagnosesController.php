<?php

namespace App\Http\Controllers;

use App\Diagnosis;
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
            'name' => 'required|max:255',
            'description' => 'required|max:500',
            'treatment' => 'max:1000' 

        ]);
    }
     //atgriež skatu ar visiem autorizētā lietotāja pievienotajiem diagnozēm
    public function index()
    {
        if(Auth::check()){
        $diagnoses=Diagnosis::where('user_id', Auth::user()->id)->get();
        return view('diagnoses.index', ['diagnoses'=>$diagnoses]);
        }
        
        return view('auth.login');
    }

    //izveido diagnozi, ļauj tam piesaistīt skolēnu
    public function create($student_id= null)
    {
        $students = null;
            if (!$student_id){  //ļauj attēlot visus studentus, lai varētu parādīt sarakstu un izvēlēties, kuram skolēnam pievienot diagnozi

                $students = Student::where('user_id', Auth::user()->id)->get();
            }     
               return view( 'diagnoses.create', ['student_id'=>$student_id, 'students'=>$students]);
    }

    //glabā informāciju datubāzē
    public function store(Request $request)
    {
        if(Auth::check()){
            $diagnosis = Diagnosis::create([
                'name' => $request->input('name'),
                'description' => $request->input('decription'),
                'treatment' => $request->input('treatment'),
                'student_id' => $request->input('student_id'),
                'user_id' => Auth::user()->id,
                
            ]);
            if($diagnosis){
                return redirect()->route('diagnoses.show', ['diagnosis'=> $diagnosis->id])
                ->with('success' , 'Diagnoze ir veiksmīgi pievienots!');
            }
        }
        
            return back()->withInput()->with('errors', 'Neizdevās pievienot jaunu diagnozi!');
    }

    //parāda konkrētās diagnozes informāciju
    public function show(Diagnosis $diagnosis)
    {
       
       $diagnosis = Diagnosis::find($diagnosis->id );
       return view( 'diagnoses.show', ['diagnosis'=>$diagnosis]);
    }

   //atgriež diagnozes rediģēšanas skatu
    public function edit(Diagnosis $diagnosis)
    {
        $diagnosis = Diagnosis::find($diagnosis->id );
        
            
               return view( 'diagnoses.edit', ['diagnosis'=>$diagnosis]);
    }

   //atjauno informāciju datubāzē
    public function update(Request $request, Diagnosis $diagnosis)
    {
        $diagnosisUpdate = Diagnosis::where('id', $diagnosis->id)
        ->update([
                'name'=> $request->input('name'),
                'description'=> $request->input('desription'),
                'treatment'=> $request->input('treatment'),
                
               
        ]);
        if($diagnosisUpdate){
        return redirect()->route('diagnoses.show', ['diagnosis'=> $diagnosis->id])
        ->with('success' , 'Diagnoze ir veiksmīgi rediģēts');
        }
    }

   //izdzēš diagnozes informāciju no datubāzes
    public function destroy(Diagnosis $diagnosis)
    {
        
        $finddiagnosis = Diagnosis::find( $diagnosis->id);
		if($finddiagnosis->delete()){
            
            //redirect
            return redirect()->route('diagnoses.index')
            ->with('success' , 'Diagnoze ir veiksmīgi izdzēsts');
        }
        return back()->withInput()->with('error' , 'Diagnozi neizdevās veiksmīgi izdzēst');
        
    }
}

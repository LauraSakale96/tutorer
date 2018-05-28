<?php

namespace App\Http\Controllers;

use App\Student;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StudentsController extends Controller
{
    //validācijas funkcija
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'age' => 'required|integer',
            'gender' => 'required|string|max:255',
            
        ]);
    }
     //atgriež skatu ar visiem autorizētā lietotāja pievienotajiem skolēniem
    public function index()
    {
        if(Auth::check()){
        $students=Student::where('user_id', Auth::user()->id)->get();
        return view('students.index', ['students'=>$students]);
        }
        
        return view('auth.login');
    }

    //izveido skolēnu, ļauj tam piesaistīt priekšmetu, ko tas apmeklē
    public function create($subject_id= null)
    {
        $subjects = null;
            if (!$subject_id){

                $subjects = Subject::where('user_id', Auth::user()->id)->get();
            }
            
            
               return view( 'students.create', ['subject_id'=>$subject_id, 'subjects'=>$subjects]);
    }

    //glabā informāciju datubāzē
    public function store(Request $request)
    {
        if(Auth::check()){
            $student = Student::create([
                'name' => $request->input('name'),
                'lastname' => $request->input('lastname'),
                'age'=>$request->input('age'),
                'gender'=>$request->input('gender'),
                'subject_id' => $request->input('subject_id'),
                'user_id' => Auth::user()->id,
                
            ]);
            if($student){
                return redirect()->route('students.show', ['student'=> $student->id])
                ->with('success' , 'Skolēna profils ir veiksmīgi izveidots!');
            }
        }
        
            return back()->withInput()->with('errors', 'Neizdevās pievienot jaunu skolēnu');
    }

    //parāda konkrētā skolēna informāciju
    public function show(Student $student)
    {
       
       $student = Student::find($student->id );
       return view( 'students.show', ['student'=>$student]);
    }

   //atgriež skolēna rediģēšanas skatu
    public function edit(Student $student)
    {
        $student = Student::find($student->id );
        
            
               return view( 'students.edit', ['student'=>$student]);
    }

   //atjauno informāciju datubāzē
    public function update(Request $request, Student $student)
    {
        $studentUpdate = Student::where('id', $student->id)
        ->update([
                'name'=> $request->input('name'),
                'lastname'=> $request->input('lastname'),
                'age'=>$request->input('age'),
                'gender'=>$request->input('gender')
        ]);
        if($studentUpdate){
        return redirect()->route('students.show', ['student'=> $student->id])
        ->with('success' , 'Skolēna profils ir veiksmīgi rediģēts');
        }
    }

   //izdzēš skolēna informāciju no datubāzes
    public function destroy(Student $student)
    {
        
        $findstudent = Student::find( $student->id);
		if($findstudent->delete()){
            
            //redirect
            return redirect()->route('students.index')
            ->with('success' , 'Skolēna profils ir veiksmīgi izdzēsts');
        }
        return back()->withInput()->with('error' , 'Skolēna profilu neizdevās veiksmīgi izdzēst');
        
    }
}

<?php

namespace App\Http\Controllers;

use App\Progress;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProgressesController extends Controller
{
    //validācijas funkcija
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:100',
            'date' => 'required',
            
            
        ]);
    }
     //atgriež skatu ar visiem autorizētā lietotāja pievienotajiem skolēniem
    public function index()
    {
        if(Auth::check()){
        $progresses=Progress::where('user_id', Auth::user()->id)->get();
        return view('progresses.index', ['progresses'=>$progresses]);
        }
        
        return view('auth.login');
    }

    //izveido progresu, ļauj tam piesaistīt skolēnu
    public function create($student_id= null)
    {
        $students = null;
            if (!$student_id){  //ļauj attēlot visus studentus, lai varētu parādīt sarakstu un izvēlēties, kuram skolēnam pievienot diagnozi

                $students = Student::where('user_id', Auth::user()->id)->get();
            }     
               return view( 'progresses.create', ['student_id'=>$student_id, 'students'=>$students]);
    }

    //glabā informāciju datubāzē
    public function store(Request $request)
    {
        if(Auth::check()){
            $progress = Progress::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'date'=>$request->input('date'),
                'student_id' => $request->input('student_id'),
                'user_id' => Auth::user()->id,
                
            ]);
            if($progress){
                return redirect()->route('progresses.show', ['progress'=> $progress->id])
                ->with('success' , 'Progress ir veiksmīgi pievienots!');
            }
        }
        
            return back()->withInput()->with('errors', 'Neizdevās pievienot jaunu progresu!');
    }

    //parāda konkrētā progresa informāciju
    public function show(Progress $progress)
    {
       
       $progress = Progress::find($progress->id );
       return view( 'progresses.show', ['progress'=>$progress]);
    }

   //atgriež progresa rediģēšanas skatu
    public function edit(Progress $progress)
    {
        $progress = Progress::find($progress->id );
        
            
               return view( 'progresses.edit', ['progress'=>$progress]);
    }

   //atjauno informāciju datubāzē
    public function update(Request $request, Progress $progress)
    {
        $progressUpdate = Student::where('id', $progress->id)
        ->update([
                'name'=> $request->input('name'),
                'description'=> $request->input('description'),
                'date'=>$request->input('date')
               
        ]);
        if($progressUpdate){
        return redirect()->route('progresses.show', ['progress'=> $progress->id])
        ->with('success' , 'Progress ir veiksmīgi rediģēts');
        }
    }

   //izdzēš progresa informāciju no datubāzes
    public function destroy(Progress $progress)
    {
        
        $findprogress = Progress::find( $progress->id);
		if($findprogress->delete()){
            
            //redirect
            return redirect()->route('progresses.index')
            ->with('success' , 'Progress ir veiksmīgi izdzēsts');
        }
        return back()->withInput()->with('error' , 'Progresu neizdevās veiksmīgi izdzēst');
        
    }
}

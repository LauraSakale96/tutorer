<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AttendancesController extends Controller
{
    //validācijas funkcija
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'date' => 'required',
            'attendance' => 'required',         
        ]);
    }
     //atgriež skatu ar visiem autorizētā lietotāja pievienotajiem skolēniem
    public function index()
    {
        if(Auth::check()){
        $attendances=Attendance::where('user_id', Auth::user()->id)->get();
        return view('attendances.index', ['attendances'=>$attendances]);
        }
        
        return view('auth.login');
    }

    //izveido apmeklējumu, ļauj tam piesaistīt skolēnu
    public function create($student_id= null)
    {
        $students = null;
            if (!$student_id){  //ļauj attēlot visus studentus, lai varētu parādīt sarakstu un izvēlēties, kuram skolēnam pievienot apmeklējumu

                $students = Student::where('user_id', Auth::user()->id)->get();
            }     
               return view( 'attendances.create', ['student_id'=>$student_id, 'students'=>$students]);
    }

    //glabā informāciju datubāzē
    public function store(Request $request)
    {
        if(Auth::check()){
            $attendance = Attendance::create([
                'date' => $request->input('date'),
                'attendance' => $request->input('attendance'),
                'student_id' => $request->input('student_id'),
                'user_id' => Auth::user()->id,
                
            ]);
            if($attendance){
                return redirect()->route('attendances.show', ['attendance'=> $attendance->id])
                ->with('success' , 'Apmeklējums ir veiksmīgi pievienots!');
            }
        }
        
            return back()->withInput()->with('errors', 'Neizdevās pievienot jaunu apmeklējumu!');
    }

    //parāda konkrētā apmeklējuma informāciju
    public function show(Attendance $attendance)
    {
       
       $attendance = Attendance::find($attendance->id );
       return view( 'attendances.show', ['attendance'=>$attendance]);
    }

   //atgriež apmeklējuma rediģēšanas skatu
    public function edit(Attendance $attendance)
    {
        $attendance = Attendance::find($attendance->id );
        
            
               return view( 'attendances.edit', ['attendance'=>$attendance]);
    }

   //atjauno informāciju datubāzē
    public function update(Request $request, Attendance $attendance)
    {
        $attendanceUpdate = Student::where('id', $attendance->id)
        ->update([
                'date'=> $request->input('date'),
                'attendance'=> $request->input('attendance'),
                
               
        ]);
        if($attendanceUpdate){
        return redirect()->route('attendances.show', ['attendance'=> $attendance->id])
        ->with('success' , 'Apmeklējums ir veiksmīgi rediģēts');
        }
    }

   //izdzēš apmeklējuma informāciju no datubāzes
    public function destroy(Attendance $attendance)
    {
        
        $findattendance = Attendance::find( $attendance->id);
		if($findattendance->delete()){
            
            //redirect
            return redirect()->route('attendances.index')
            ->with('success' , 'Apmeklējums ir veiksmīgi izdzēsts');
        }
        return back()->withInput()->with('error' , 'Apmeklējumu neizdevās veiksmīgi izdzēst');
        
    }
}

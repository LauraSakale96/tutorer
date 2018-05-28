<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SubjectsController extends Controller
{
    //validācija ievaddatiem
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:1000',
        ]);
    }
    //funkcija, kas ataino skatu ar visiem autentificētā lietotāja izveidotajiem priekšmetiem
    public function index()
    {
        if(Auth::check()){
        $subjects=Subject::where('user_id', Auth::user()->id)->get();
        return view('subjects.index', ['subjects'=>$subjects]);
        }
        return view('auth.login');

        
    }
    //atgriež skatu ar priekšmeta aizpildes formu
    public function create()
    {
           
           return view( 'subjects.create');       
    }

   //pēc saglabāšanas saglabā datus datubāzē ar šo funkciju
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

    //ataino konkrēto priekšmetu
    public function show(Subject $subject)
    {
      
       $subject = Subject::find($subject->id );

    
       return view( 'subjects.show', ['subject'=>$subject]);
    }

    //atgriež rediģēšanas skatu
    public function edit(Subject $subject)
    {
        $subject = Subject::find($subject->id );
        
            
               return view( 'subjects.edit', ['subject'=>$subject]);
    }
    //atjauno informāciju datubāzē
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

   //iznīcina datus, kurus grib izdzēst
    public function destroy(Subject $subject)
    {
        
        $findSubject = Subject::find( $subject->id);
		if($findSubject->delete()){
            
            //atgriež skatu ar visu priekšmetu sarakstu un paziņojumu
            return redirect()->route('subjects.index')
            ->with('success' , 'Priekšmets ir veiksmīgi izdzēsts!');
        }
        return back()->withInput()->with('error' , 'Priekšmetu neizdevās izdzēst!');
        
    }
    }


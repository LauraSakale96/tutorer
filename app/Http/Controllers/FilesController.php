<?php

namespace App\Http\Controllers;

use App\User;
use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FilesController extends Controller
{
     //atgriež skatu ar visām autentificētā lietotāja pievienotajiem failiem
    public function index()
    {
        if(Auth::check()){
            $files=File::where('user_id', Auth::user()->id)->get();
            return view('file.index', ['files'=>$files]);
            }
            return view('auth.login');
    }

    //atgriež faila pievienošanas skatu
    public function create(File $file)
    {
        return view('file.create', ['file'=>$file]);
        
    }

    //validācija
    public function store(Request $request)
    {
        if(Auth::check()){
        $this->validate($request, [ //validācija
            
                            'filename' => 'required',
                            'filename.*' => 'mimes:doc,pdf,docx,zip'
                            
            
                    ]);
                    
                    
                    if($request->hasfile('filename'))   
                     {
            
                        foreach($request->file('filename') as $file)    //ļauj pievienot vienlaicīgi vairākus failus
                        {
                            $name=$file->getClientOriginalName(); //klienta orģinālais nosaukums
                            $file->move(public_path().'/uploads/files/', $name); //saglabā mapē upload/files/ 
                            $data[] = $name;  
                            
                        }                 
                     }
            
                     $file= new File();
                     $file->filename=json_encode($data);
                     $file->user_id=Auth::user()->id;
                                        
                    $file->save();
                              
                    return back()->with('success', 'Jūsu fails ir veiksmīgi pievienots!');
                    }
    }

   //atgriež skatu ar pievienoto failu
    public function show(File $file)
    { 
               return view( 'file.show', ['file'=>$file]);
    }

    public function edit(File $file)
    {
        
    }

    public function update(Request $request, File $file)
    {
       
    }

   
    public function destroy(File $file)
    {
        
    }

}
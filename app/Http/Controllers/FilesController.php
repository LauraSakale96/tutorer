<?php

namespace App\Http\Controllers;

use App\User;
use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FilesController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $files=File::where('user_id', Auth::user()->id)->get();
            return view('file.index', ['files'=>$files]);
            }
            return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(File $file)
    {
        return view('file.create', ['file'=>$file]);
        
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
        $this->validate($request, [
            
                            'filename' => 'required',
                            'filename.*' => 'mimes:doc,pdf,docx,zip'
                            
            
                    ]);
                    
                    
                    if($request->hasfile('filename'))
                     {
            
                        foreach($request->file('filename') as $file)
                        {
                            $name=$file->getClientOriginalName();
                            $file->move(public_path().'/file/', $name);  
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

    /**
     * Display the specified resource.
     *
     * @param  \App\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        $file = File::find($file->id );
        
            
               return view( 'file.show', ['file'=>$file]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        
}

}
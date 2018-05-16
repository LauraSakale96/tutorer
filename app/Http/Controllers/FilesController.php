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
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(File $file)
    {
        return view('files.create', ['file'=>$file]);
        
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
                            $file->move(public_path().'/files/', $name);  
                            $data[] = $name;  
                            
                        }
                        
                       
                     }
            
                     $file= new File();
                     $file->filename=json_encode($data);
                     $file->user_id=Auth::user()->id;
                     
                    
                    $file->save();
                    
            
                    return back()->with('success', 'Your files has been successfully added');
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
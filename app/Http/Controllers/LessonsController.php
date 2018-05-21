<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonsController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'description' => 'string|max:255',
            'file.*' => 'mimes:doc,pdf,docx,zip',
            'lessondate' => 'required|max:255',
            
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
        $lessons=Lesson::where('user_id', Auth::user()->id)->get();
        return view('lessons.index', ['lessons'=>$lessons]);
        }
        
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($subject_id= null)
    {
        $subjects = null;
            if (!$subject_id){

                $subjects = Subject::where('user_id', Auth::user()->id)->get();
            }
            
               return view( 'lessons.create', ['subject_id'=>$subject_id, 'subjects'=>$subjects]);
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
            $lesson = Lesson::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'lessondate'=>$request->input('lessondate'),
                'file'=>$request->input('file'),
                'subject_id' => $request->input('subject_id'),
                'user_id' => Auth::user()->id,
                
            ]);
            if($lesson){
                return redirect()->route('lessons.show', ['lesson'=> $lesson->id])
                ->with('success' , 'Nodarbība ir izveidota veiksmīgi');
            }
        }
        
            return back()->withInput()->with('errors', 'Neizdevās izveidot jaunu nodarbību');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
       // $lesson = Lesson::where('id', $lesson->id )->first();
       $lesson = Lesson::find($lesson->id );

    
       return view( 'lessons.show', ['lesson'=>$lesson]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        $lesson = Lesson::find($lesson->id );
        
            
               return view( 'lessons.edit', ['lesson'=>$lesson]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        $lessonUpdate = Lesson::where('id', $lesson->id)
        ->update([
                'name'=> $request->input('name'),
                'description'=> $request->input('description'),
                'lessondate'=>$request->input('lessondate'),
                'file'=>$request->input('file')
        ]);
        if($lessonUpdate){
        return redirect()->route('lessons.show', ['lesson'=> $lesson->id])
        ->with('success' , 'Nodarbība veiksmīgi rediģēta');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        
        $findlesson = Lesson::find( $lesson->id);
		if($findlesson->delete()){
            
            //redirect
            return redirect()->route('lessons.index')
            ->with('success' , 'Nodarbība veiksmīgi izdzēsta');
        }
        return back()->withInput()->with('error' , 'Nodarbību neizdevās dzēst');
        
    }
}

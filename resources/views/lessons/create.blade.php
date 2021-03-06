@extends('layouts.master')

@section('content')
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>

 

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

 
</head>
<div class="col-sm-9 col-md-9 col-lg-9 pull-left" style=""background: white;>
<h1>Pievieno jaunu nodarbību</h1>

      
      <!-- Example row of columns -->
      <div class="row" style="background:white; margin: 10px;">

 
        <div class="col-lg-12 col-md-12 col-sm-12">
         <form method="post" action="{{ route('lessons.store')}}">
            {{ csrf_field()}}

            
            <div class="form-group">
                <label for="lesson-name">Nodarbības nosaukums<span class="required">*</span></label>
                <input placeholder="Ievadiet nodarbības nosaukumu"
                        id="lesson-name"
                        required
                        name="name"
                        spellcheck="false"
                        class="form-control"
                       
                        />
                        
                </div>
                


                @if( $subjects == null)
                <input
                class="form-control"
                 type="hidden"
                        
                        name="subject_id"
                        value="{{$subject_id}}"                     
                        />                      
                </div>
                @endif

                @if( $subjects != null) <!-- parāda visus iespējamos priekšmetus, kuriem pievienot nodarbību -->
                <div class="form-group">
                <label for="subject-content">Izvēlies priekšmetu, kuram pievienot nodarbību<span class="required">*</span></label>
                <select name="subject_id" class="form-control" style="height:100%">
                  @foreach($subjects as $subject)
                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                    @endforeach
                </select>
                </div>
                @endif

               
                

                <div class="form-group">
                <label for="lesson-lessondate">Nodarbības datums<span class="required">*</span></label>
                     <input class="date form-control" type="date"
                     id="lesson-lessondate"
                    name="lessondate"
                    spellcheck="false"
                        class="form-control"
                    />
                
                 </div>
                <div class="form-group">
                <label for="lesson-content">Apraksts</label>
                <textarea 
                        style="resize: vertical"
                        id="lesson-content"
                        name="description"
                        rows="5" spellcheck="false"
                        class="form-control autosize-target text-left">
                        
                        </textarea>
                </div>

                
                

                
                <div class="form-group">
                    <input type="submit" class="btn btn-primary"
                        value="Ievadīt"/>
                        </div>
                        </form>
       </div>
      
      </div>
</div>

<div class="col-sm-3 col-md-3 col-lg-3 pull-right">

 <div class="sidebar-module">
   <h4>Izvēlies savu darbību</h4>
   <ol class="list-unstyled">
     <li>
     <span data-feather="layers"></span>
     <a href="/lessons">Apskatīt visu manu nodarbību sarakstu</a></li>
   </ol>
 </div>
  
</div>
    @endsection
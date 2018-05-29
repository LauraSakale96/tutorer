@extends('layouts.master')

@section('content')
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>

  

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

</head>
<div class="col-sm-9 col-md-9 col-lg-9 pull-left" style=""background: white;>
<h1>Pievieno diagnozi</h1>

      
      <!-- Example row of columns -->
      <div class="row" style="background:white; margin: 10px;">

 
        <div class="col-lg-12 col-md-12 col-sm-12">
         <form method="post" action="{{ route('diagnoses.store')}}">
            {{ csrf_field()}}

            

            <div class="form-group">
           
            @if( $students == null)
            <input
            class="form-control"
             type="hidden"
                    
                    name="student_id"
                    value="{{$student_id}}"                     
                    />                      
            </div>
            @endif

            @if( $students != null)
            <div class="form-group">
            <label for="student-content">Izvēlies skolēnu, kuram pievienot diagnozi</label>
            <select name="student_id" class="form-control" style="height:100%">
              @foreach($students as $student)
                <option value="{{$student->id}}">{{$student->name}}  {{$student->lastname}}</option>
                @endforeach
            </select>
            </div>
            @endif
                <label for="diagnosis-name">Diagnoze:<span class="required">*</span></label>
                <input placeholder="Ievadiet diagnozi"
                        id="diagnosis-name"
                        required
                        name="name"
                        spellcheck="false"
                        class="form-control"
                       
                        />
                        
                </div>

                

                <div class="form-group">
                <label for="diagnosis-content">Apraksts<span class="required">*</span></label>
                <textarea 
                        style="resize: vertical"
                        id="diagnosis-content"
                        name="description"
                        rows="5" spellcheck="false"
                        class="form-control autosize-target text-left">
                        
                        </textarea>
                </div>

                <div class="form-group">
                <label for="diagnosis-content">Ārstēšanas apraksts(ja nepieciešams)</label>
                <textarea 
                        style="resize: vertical"
                        id="diagnosis-content"
                        name="treatment"
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
     <span data-feather="activity"></span>
     <a href="/diagnoses">Apskatīt visas pievienotās diagnozes</a></li>
   </ol>
 </div>
  
</div>
    @endsection
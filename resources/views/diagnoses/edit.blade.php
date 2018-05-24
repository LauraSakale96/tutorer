@extends('layouts.master')

@section('content')
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet"/>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
</head>

<div class="col-sm-9 col-md-9 col-lg-9 pull-left" style="background: white;">
<h1>Rediģēt diagnozi</h1>

      
      <!-- Example row of columns -->
      <div class="row" style="background:white; margin: 10px;">

 
        <div class="col-lg-12 col-md-12 col-sm-12">
         <form method="post" action="{{ route('diagnoses.update', [$diagnose->id])}}" files="true">
            {{ csrf_field()}}

            <input type="hidden" name="_method" value="put">
            
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
                <option value="{{$student->id}}">{{$student->name}} {{$student->lastname}}</option>
                @endforeach
            </select>
            </div>
            @endif

        <div class="form-group">
            <label for="diagnose-name">Diagnoze:<span class="required">*</span></label>
            <input placeholder="Ievadiet diagnozi"
                    id="diagnose-name"
                    required
                    name="name"
                    spellcheck="false"
                    class="form-control"
                    value="{{ $diagnose->name }}"
                   
                    />
                    
            </div>

            <div class="form-group">
            <label for="diagnose-content">Apraksts<span class="required">*</span></label>
            <textarea 
                    style="resize: vertical"
                    id="diagnose-content"
                    name="description"
                    rows="5" spellcheck="false"
                    class="form-control autosize-target text-left"
                    value="{{ $diagnose->description }}">
                    
                    
                    </textarea>
            </div>

            <div class="form-group">
            <label for="diagnose-content">Ārstēšanas apraksts(ja nepieciešams)</label>
            <textarea 
                    style="resize: vertical"
                    id="diagnose-content"
                    name="treatment"
                    rows="5" spellcheck="false"
                    class="form-control autosize-target text-left"
                    value="{{ $diagnose->treatment }}">
                    
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
         <!-- <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
          <div class="sidebar-module">-->
          <div class="sidebar-module">
            <h4>Ivēlieties savu darbību</h4>
            <ol class="list-unstyled">
              <li>
              <span data-feather="thermometer"></span>
              <a href="/diagnoses/{{$diagnose->id}}">Apskatīt diagnozi</a></li>
              <li>
              <span data-feather="actiivity"></span>
              <a href="/diagnoses">Visas diagnozes</a></li>
              
            </ol>
          </div>
          
          
        </div>
    @endsection
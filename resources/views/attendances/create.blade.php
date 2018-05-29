@extends('layouts.master')

@section('content')
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  </script>
</head>
<div class="col-sm-9 col-md-9 col-lg-9 pull-left" style=""background: white;>
<h1>Pievieno apmeklējumu</h1>

      
      <!-- Example row of columns -->
      <div class="row" style="background:white; margin: 10px;">

 
        <div class="col-lg-12 col-md-12 col-sm-12">
         <form method="post" action="{{ route('attendances.store')}}">
            {{ csrf_field()}}

      
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
                <label for="student-content">Izvēlies skolēnu, kuram pievienot apmeklējumu</label>
                <select name="student_id" class="form-control" style="height:100%">
                  @foreach($students as $student)
                    <option value="{{$student->id}}">{{$student->name}}  {{$student->lastname}}</option>
                    @endforeach
                </select>
                </div>
                @endif

               
                

                <div class="form-group">
                <label for="attendance-date">Apmeklējuma datums<span class="required">*</span></label>
                     <input class="date form-control" type="date"
                     id="attendance-date"
                    name="date"
                    spellcheck="false"
                        class="form-control"
                    />
                    
                
                 </div>

                <div class="form-group">
                <label for="attendance-attendance">Vai ir apmeklējis?<span class="required">*</span></label>
                   <label>Apmeklēja:</label> <input type="radio" name="attendance" value="1" checked>
                    <label>Neapmeklēja:</label><input type="radio" name="attendance" value="0">
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
     <a href="/attendances">Apskatīt visu manu pievienotot apmeklējumu sarakstu</a></li>
   </ol>
 </div>
  
</div>
    @endsection
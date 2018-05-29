@extends('layouts.master')

@section('content')
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet"/>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
</head>
@if($attendance->user_id == Auth::user()->id)
<div class="col-sm-9 col-md-9 col-lg-9 pull-left" style="background: white;">
<h1>Rediģēt apmeklējumu</h1>

      
      
      <div class="row" style="background:white; margin: 10px;">

 
        <div class="col-lg-12 col-md-12 col-sm-12">
         <form method="post" action="{{ route('attendances.update', [$attendance->id])}}" files="true"> <!-- kā route izsauc attendances.update, kas ir funkcija, kas atļauj atjaunot datus datubāzē -->
            {{ csrf_field()}}

            <input type="hidden" name="_method" value="put">
            

                <div class="form-group">
                <label for="attendance-date">Apmeklējuma datums<span class="required">*</span></label>
                     <input class="date form-control" type="date"
                     id="attendance-date"
                    name="date"
                    spellcheck="false"
                        class="form-control"
                        value="{{ $attendance->date }}"
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
            <h4>Ivēlieties savu darbību</h4>
            <ol class="list-unstyled">
              <li>
              <span data-feather="file"></span>
              <a href="/attendances/{{$attendance->id}}">Apskatīt apmeklējumu</a></li>
              <li>
              <span data-feather="layers"></span>
              <a href="/attendances">Visi pievienotie apmeklējumi</a></li>
              
            </ol>
          </div>
          
          
        </div>
        @endif
    @endsection
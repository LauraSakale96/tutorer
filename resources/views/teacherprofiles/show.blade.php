@extends('layouts.master')

@section('content')
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  </head>

<div class="col-sm-9 col-md-9 col-lg-9 pull-center">

      
      <div class="jumbotron">
        <h1>{{ $teacherprofile->name }}  {{$teacherprofile->lastname}}</h1>
        <img src="/uploads/image/default.jpg" style="width:150px; height:150px; float:right; border-radius:50%; margin-right:25px;">
        <p class="lead">Priekšmets/-i, kuru pasniedz: {{ $teacherprofile->subject}}</p>
        <p class="lead">Izglītība: {{ $teacherprofile->education}}</p>
        <p class="lead">Apraksts: {{ $teacherprofile->description}}</p>
        
       
    
      </div>

     
</div>
<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
         
          <div class="sidebar-module">
            <ol class="list-unstyled">
            <li><a href="/teacherprofiles/{{$teacherprofile->id}}/edit">Rediģēt</a></li>            
              <br/>

            </ol>
          </div>
           
        </div>

    @endsection
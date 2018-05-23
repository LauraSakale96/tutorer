@extends('layouts.master')

@section('content')
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  </head>

<div class="col-md-9 col-lg-9 col-md-offset-1 col-lg-offset-1">
    <div class="panel panel-primary ">
    <div class="panel-heading">Skolēni </div>
   
    <a class="pull-right btn btn-primary btn-sm" href="/students/create">Pievieno jaunu skolēnu</a></div>
   
    <div class="panel-body">

        <ul class="list-group">
        @foreach($students as $student)
        <li class="list-group-item"> <a href="/students/{{$student->id}}">{{ $student->name}} {{ $student->lastname}}, {{ $student->age }}</a>
        @if ( $student->gender == 'male')
        <img src="/uploads/image/boy.png" style="width:32px; height:32px;  top:10px; left:10px; border-radius:50%">
        @endif
        @if ( $student->gender == 'female')
        <img src="/uploads/image/girl.png" style="width:32px; height:32px;  top:10px; left:10px; border-radius:50%">
        @endif
        @if ( $student->gender == 'none')
        <img src="/uploads/image/unisex.png" style="width:32px; height:32px; top:10px; left:10px; border-radius:50%">
        @endif
        </li>
        @endforeach
        </ul>
    </div>
    </div>
</div>

@endsection
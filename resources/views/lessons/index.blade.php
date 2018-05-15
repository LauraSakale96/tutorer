@extends('layouts.master')

@section('content')
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  </head>

<div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
    <div class="panel panel-primary ">
    <div class="panel-heading">Nodarbība <a class="pull-right btn btn-primary btn-sm" href="/lessons/create">Pievieno nodarbību</a></div>
    <div class="panel-body">

        <ul class="list-group">
        @foreach($lessons as $lesson)
        <li class="list-group-item"> <a href="/lessons/{{$lesson->id}}">{{ $lesson->name}}</a></li>
        @endforeach
        </ul>
    </div>
    </div>
</div>

@endsection
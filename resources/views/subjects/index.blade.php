@extends('layouts.master')

@section('content')
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  </head>

<div class="col-md-9 col-lg-9 col-md-offset-1 col-lg-offset-1">
    <div class="panel panel-primary ">
    <div class="panel-heading">Mācību priekšmeti 

    <a class="pull-right btn btn-primary btn-sm" href="/subjects/create">Pievieno jaunu mācību priekšmetu</a></div>
  
    

        <ul class="list-group">
        @foreach($subjects as $subject)
        <li class="list-group-item"> <a href="/subjects/{{$subject->id}}">{{ $subject->name}}</a></li>
        @endforeach
        </ul>
    </div>
    </div>
</div>

@endsection
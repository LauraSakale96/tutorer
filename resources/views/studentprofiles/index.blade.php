@extends('layouts.master')

@section('content')
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  </head>

<div class="col-md-9 col-lg-9 col-md-offset-1 col-lg-offset-1">
    <div class="panel panel-primary ">
    <a class="pull-right btn btn-primary btn-sm" href="/studentprofiles/create">Izveido profilu</a></div>

        <ul class="list-group">
        @foreach($studentprofiles as $studentprofile)
        <li class="list-group-item"> <a href="/studentprofiles/{{$studentprofile->id}}">{{ $studentprofile->name}} {{$studentprofile->lastname}}</a></li>
        @endforeach
        </ul>
    
    </div>
</div>

@endsection
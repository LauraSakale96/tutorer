@extends('layouts.master')

@section('content')
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  </head>

<div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
    <div class="panel panel-primary ">
    <div class="panel-heading">Mācību priekšmeti 
    @if(Auth::user()->role == 'skolotajs')
    <a class="pull-right btn btn-primary btn-sm" href="/subjects/create">Pievieno jaunu mācību priekšmetu</a></div>
    @endif
    <a class="pull-right btn btn-primary btn-sm" href="/subjects/show">Apskati visus priekšmetus</a></div>
    <div class="panel-body">

        <ul class="list-group">
        @foreach($subjects as $subject)
        <li class="list-group-item"> <a href="/subjects/{{$subject->id}}">{{ $subject->name}}</a></li>
        @endforeach
        </ul>
    </div>
    </div>
</div>

@endsection
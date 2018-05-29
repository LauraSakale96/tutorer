@extends('layouts.master')

@section('content')
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  </head>

<div class="col-md-9 col-lg-9 col-md-offset-1 col-lg-offset-1">
    <div class="panel panel-primary ">
    <div class="panel-heading">Progress </div>
   
    <a class="pull-right btn btn-primary btn-sm" href="/progresses/create">Pievieno progresu</a></div>
   
    <div class="panel-body"> <!-- ar cikla palīdzību attēlo sarakstu ar visiem progresiem un attiecīgi attēlo tā nosaukumu un datumu -->

        <ul class="list-group">
        @foreach($progresses as $progress)
        <li class="list-group-item"> <a href="/progresses/{{$progress->id}}">{{$progress->student->name}} {{$progress->student->lastname}} - {{ $progress->name}}, {{ $progress->date}} </a></li>
        @endforeach
        </ul>
    </div>
    </div>
</div>

@endsection
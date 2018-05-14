@extends('layouts.master')

@section('content')

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
@extends('layouts.master')

@section('content')

<div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
    <div class="panel panel-primary ">
    <div class="panel-heading">Mācību priekšmeti <a class="pull-right btn btn-primary btn-sm" href="/subjects/create">Pievieno jaunu mācību priekšmetu</a></div>
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
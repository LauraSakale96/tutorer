@extends('layouts.master')

@section('content')
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  </head>

<div class="col-md-9 col-lg-9 col-md-offset-1 col-lg-offset-1">
    <div class="panel panel-primary ">
    <div class="panel-heading">Apmeklējumss </div>
   
    <a class="pull-right btn btn-primary btn-sm" href="/attendances/create">Pievieno apmeklējumu</a></div>
   
    <div class="panel-body"> <!-- ar cikla palīdzību attēlo sarakstu ar visiem apmeklējumiem un attiecīgi attēlo tā apmeklējumu un datumu -->

        <ul class="list-group">
        @foreach($attendances as $attendance)
        <li class="list-group-item"> <a href="/attendances/{{$attendance->id}}">{{ $attendance->date}},
             @if($attendance->attendance == 0)
                Neapmeklēja
            @endif
            @if($attendance->attendance == 1)
                Apmeklēja
            @endif </a></li>
        @endforeach
        </ul>
    </div>
    </div>
</div>

@endsection
@extends('layouts.master')

@section('content')
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  </head>

<div class="col-sm-9 col-md-9 col-lg-9 pull-center">

      
      <div class="jumbotron">
        <h1>{{$attendance->student->name}} {{$attendance->student->lastname}}</h1>
        <h2>{{ $attendance->date }}</h2>
        @if($attendance->attendance == 0)
        <p class="lead">Neapmeklēja</p>
        @endif
        @if($attendance->attendance == 1)
        <p class="lead">Apmeklēja</p>
        @endif
      
      </div>

     
</div>

<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
         
          <div class="sidebar-module">
            <h4>Izvēlies savu rīcību!</h4>
            <ol class="list-unstyled">
              <li>
              <span data-feather="edit"></span>
              <a href="/attendances/{{$attendance->id}}/edit">Rediģēt</a></li>
              <li>
              <span data-feather="plus-circle"></span>
              <a href="/attendances/create">Pievienot jaunu apmeklējumu</a></li>
              <li>
              <span data-feather="layers"></span>
              <a href="/attendances">Saraksts ar visiem apmeklējumiem</a></li>
              
              <br/>
              @if($attendance->user_id == Auth::user()->id)
              <li>
              <span data-feather="delete"></span>
              <a   
              href="#"
                  onclick="
                  var result = confirm('Vai tiešām vēlaties izdzēst šo apmeklējumu?');
                      if( result ){
                              event.preventDefault();
                              document.getElementById('delete-form').submit();
                      }
                          "
                          >
                  Dzēst
              </a>

              <form id="delete-form" action="{{ route('attendances.destroy',[$attendance->id]) }}" 
                method="POST" style="display: none;">
                        <input type="hidden" name="_method" value="delete">
                        {{ csrf_field() }}
              </form>

              </li>
              
              
              </li>
            @endif
            </ol>
          </div>
         
          
        </div>
    @endsection
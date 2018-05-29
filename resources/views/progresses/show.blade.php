@extends('layouts.master')

@section('content')
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  </head>

<div class="col-sm-9 col-md-9 col-lg-9 pull-center">

      
      <div class="jumbotron">
        <h1>{{$progress->student->name}} {{$progress->student->lastname}} </h1>
        <h2>{{ $progress->name }}</h2>
        <p class="lead">{{ $progress->description}}</p>
        <p class="lead">{{ $progress->date}}</p>
      </div>

     
</div>

<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
         
          <div class="sidebar-module">
            <h4>Izvēlies savu rīcību!</h4>
            <ol class="list-unstyled">
              <li>
              <span data-feather="edit"></span>
              <a href="/progresses/{{$progress->id}}/edit">Rediģēt</a></li>
              <li>
              <span data-feather="plus-circle"></span>
              <a href="/progresses/create">Pievienot jaunu progresu</a></li>
              <li>
              <span data-feather="layers"></span>
              <a href="/progresses">Saraksts ar visiem progresiem</a></li>
              
              <br/>
              @if($progress->user_id == Auth::user()->id)
              <li>
              <span data-feather="delete"></span>
              <a   
              href="#"
                  onclick="
                  var result = confirm('Vai tiešām vēlaties izdzēst šo progresu?');
                      if( result ){
                              event.preventDefault();
                              document.getElementById('delete-form').submit();
                      }
                          "
                          >
                  Dzēst
              </a>

              <form id="delete-form" action="{{ route('progresses.destroy',[$progress->id]) }}" 
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
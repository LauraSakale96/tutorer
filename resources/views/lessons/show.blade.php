@extends('layouts.master')

@section('content')
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  </head>
  @if($lesson->user_id == Auth::user()->id)
<div class="col-sm-9 col-md-9 col-lg-9 pull-center">

      
      <div class="jumbotron">
        <h1>{{ $lesson->name }}</h1>
        <p class="lead">{{ $lesson->description}}</p>
        <p class="lead">{{ $lesson->lessondate}}</p>
        <p class="lead">Priekšmets, kuram nodarbības pieder -{{$lesson->subject->name}}</p>
      </div>

     
</div>

<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
         
          <div class="sidebar-module">
            <h4>Izvēlies savu rīcību!</h4>
            <ol class="list-unstyled">
              <li>
              <span data-feather="edit"></span>
              <a href="/lessons/{{$lesson->id}}/edit">Rediģēt</a></li>
              <li>
              <span data-feather="plus-circle"></span>
              <a href="/lessons/create">Pievienot jaunu nodarbību</a></li>
              <li>
              <span data-feather="layers"></span>
              <a href="/lessons">Saraksts ar visām nodarbībām</a></li>
              
              <br/>
              @if($lesson->user_id == Auth::user()->id)
              <li>
              <span data-feather="delete"></span>
              <a   
              href="#"
                  onclick="
                  var result = confirm('Vai tiešām vēlaties izdzēst šo mācību nodarbību?');
                      if( result ){
                              event.preventDefault();
                              document.getElementById('delete-form').submit();
                      }
                          "
                          >
                  Dzēst
              </a>

              <form id="delete-form" action="{{ route('lessons.destroy',[$lesson->id]) }}" 
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
        @endif
    @endsection
@extends('layouts.master')

@section('content')

<div class="col-sm-9 col-md-9 col-lg-9 pull-left">

      
      <div class="jumbotron">
        <h1>{{ $lesson->name }}</h1>
        <p class="lead">{{ $lesson->description}}</p>
      
      </div>

     
</div>

<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
         
          <div class="sidebar-module">
            <h4>Izvēlies savu rīcību!</h4>
            <ol class="list-unstyled">
              <li><a href="/lessons/{{$lesson->id}}/edit">Rediģēt</a></li>
              <li><a href="/lessons/create">Pievienot jaunu nodarbību</a></li>
              <li><a href="/lessons">Saraksts ar visām nodarbībām</a></li>
              
              <br/>
              @if($lesson->user_id == Auth::user()->id)
              <li>
              <a   
              href="#"
                  onclick="
                  var result = confirm('Vai tiešām vēlaties izdzēst šo mācību priekšmetu?');
                      if( result ){
                              event.preventDefault();
                              document.getElementById('delete-form').submit();
                      }
                          "
                          >
                  Dzēst
              </a>

              <form id="delete-form" action="{{ route('lessons.destroy',[$subject->id]) }}" 
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
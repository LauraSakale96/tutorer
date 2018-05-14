@extends('layouts.master')

@section('content')

<div class="col-sm-9 col-md-9 col-lg-9 pull-left">

      
      <div class="jumbotron">
        <h1>{{ $subject->name }}</h1>
        <p class="lead">{{ $subject->description}}</p>
      
      </div>

     
</div>

<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
         
          <div class="sidebar-module">
            <h4>Izvēlies saavu rīcību!</h4>
            <ol class="list-unstyled">
              <li><a href="/subjects/{{$subject->id}}/edit">Rediģēt</a></li>
              <li><a href="/lessons/create/{{$subject->id}}">Pievienot nodarbību</a></li>
              <li><a href="/subjects">Saraksts ar visiem priekšmetiem</a></li>
              <li><a href="/subject/create">Pievienot jaunu priekšmetu</a></li>
              
              <br/>
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

              <form id="delete-form" action="{{ route('subjects.destroy',[$subject->id]) }}" 
                method="POST" style="display: none;">
                        <input type="hidden" name="_method" value="delete">
                        {{ csrf_field() }}
              </form>

              </li>
              
              
              </li>
            
            </ol>
          </div>
         
          
        </div>
    @endsection
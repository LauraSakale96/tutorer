@extends('layouts.master')

@section('content')
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  </head>

<div class="col-sm-6 col-md-6 col-lg-6 pull-center">

      
      <div class="jumbotron">
        <h1>{{ $subject->name }}</h1>
        <p class="lead">{{ $subject->description}}</p>
        
      
      </div>

     
</div>
<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
         
          <div class="sidebar-module">
            <h4>Izvēlies savu darbību</h4>
            <ol class="list-unstyled">
            <li>
            <span data-feather="edit"></span>
            <a href="/subjects/{{$subject->id}}/edit">Rediģēt</a></li>
              <li>
              <span data-feather="plus-circle"></span>
              <a href="/lessons/create/{{$subject->id}}">Pievienot nodarbību</a></li>
              <li>
              <span data-feather="book-open"></span>
              <a href="/subjects">Saraksts ar visiem priekšmetiem</a></li>
              <li>
              <span data-feather="plus"></span>
              <a href="/subject/create">Pievienot jaunu priekšmetu</a></li>              
              <br/>

              <li>
              <span data-feather="delete"></span>
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
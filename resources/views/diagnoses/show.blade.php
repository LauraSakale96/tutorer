@extends('layouts.master')

@section('content')
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  </head>
  @if($diagnosis->user_id == Auth::user()->id)
<div class="col-sm-9 col-md-9 col-lg-9 pull-center">

      
      <div class="jumbotron">
      <h1>Skolēns : {{$diagnosis->student->name}} {{$diagnosis->student->lastname}}</h1>
        <h2>Diagnoze: {{ $diagnosis->name }}</h2>
        <p>Diagnozes apraksts : {{ $diagnosis->description }}</p>
        @if($diagnosis->treatment)
        <p>Ārstēšanas apraksts :{{ $diagnosis->treatment }}</p>
        @endif
       
        
      
      </div>

     
</div>

<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
         
          <div class="sidebar-module">
            <h4>Izvēlies savu rīcību!</h4>
            <ol class="list-unstyled">
              <li>
              <span data-feather="edit"></span>
              <a href="/diagnoses/{{$diagnosis->id}}/edit">Rediģēt</a></li>
              <li>
              <span data-feather="plus-circle"></span>
              <a href="/diagnoses/create">Pievienot jaunu diagnozi</a></li>
              <li>
              <span data-feather="layers"></span>
              <a href="/diagnoses">Saraksts ar visām diagnozēm</a></li>
              
              <br/>
              
              <li>
              <span data-feather="delete"></span>
              <a   
              href="#"
                  onclick="
                  var result = confirm('Vai tiešām vēlaties izdzēst šo diagnozi?');
                      if( result ){
                              event.preventDefault();
                              document.getElementById('delete-form').submit();
                      }
                          "
                          >
                  Dzēst
              </a>

              <form id="delete-form" action="{{ route('diagnoses.destroy',[$diagnosis->id]) }}" 
                method="POST" style="display: none;">
                        <input type="hidden" name="_method" value="delete">
                        {{ csrf_field() }}
              </form>

              </li>
              
              
              </li>
           
            </ol>
          </div>
         
          
        </div>
        @endif
    @endsection
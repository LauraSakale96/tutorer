@extends('layouts.master')

@section('content')
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  </head>

<div class="col-sm-9 col-md-9 col-lg-9 pull-center">

      
      <div class="jumbotron">
      @if($student->gender== 'male')
        <img src="/uploads/image/boy.png" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
        @endif

        @if($student->gender== 'female')
        <img src="/uploads/image/girl.png" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
        @endif

        @if($student->gender== 'none')
        <img src="/uploads/image/unisex.png" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
        @endif
        <h2>Skolēna vārds, uzvārds: {{ $student->name }} {{ $student->lastname }}</h2>
        <p class="lead">Skolēna vecums : {{ $student->age}}</p>
        @if($student->gender== 'male')
        <p class="lead">Skolēna dzimums: Vīrietis</p>
        @endif

        @if($student->gender== 'female')
        <p class="lead">Skolēna dzimums: Sieviete</p>  
         @endif

        @if($student->gender== 'none')

        @endif
        
      
      </div>

     
</div>

<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
         
          <div class="sidebar-module">
            <h4>Izvēlies savu rīcību!</h4>
            <ol class="list-unstyled">
              <li><span data-feather="edit"></span>
              <a href="/students/{{$student->id}}/edit">Rediģēt</a></li>
              
              <li>
              <span data-feather="user-plus"></span>
              <a href="/students/create">Pievienot jaunu skolēnu</a></li>
              
              <li>
              <span data-feather="users"></span>
              <a href="/students">Skolēnu saraksts</a></li>
              
              <br/>
              @if($student->user_id == Auth::user()->id)
              <li>
              <span data-feather="delete"></span>
              <a   
              href="#"
                  onclick="
                  var result = confirm('Vai tiešām vēlaties izdzēst šo skolēnu?');
                      if( result ){
                              event.preventDefault();
                              document.getElementById('delete-form').submit();
                      }
                          "
                          >
                  Dzēst
              </a>

              <form id="delete-form" action="{{ route('students.destroy',[$student->id]) }}" 
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
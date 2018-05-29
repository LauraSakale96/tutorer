@extends('layouts.master')

@section('content')

<div class="col-sm-9 col-md-9 col-lg-9 pull-center">
<div class="jumbotron">
            <img src="/uploads/image/{{ $user->image}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            <h2> Profils : {{$user->name}} {{$user->lastname}} </h2>
                <p> Priekšmets, ko pasniedz: {{$user->subject}}</p>
                <p> Iegūtā izglītība : {{$user->education}}</p>
                @if($user->description)
                <p> Apraksts : {{$user->description}}</p>
                @endif
                <form enctype="multipart/form-data" action="/profile" method="POST">
                <label>Nomaini Profila Bildi</label>
                <input type="file" name="image">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="btn btn-primary"
                        value="Ievadīt"/>
                </form>
     </div>
</div>


<div class="col-sm-6 col-md-6 col-lg-6 pull-right">
         
          <div class="sidebar-module">
            <h4>Izvēlies savu rīcību!</h4>
            <ol class="list-unstyled">
              <li>
              <span data-feather="book"></span>
              <a href="/subjects/create">Pievienot priekšmetu</a></li>
              <li>
              <span data-feather="file"></span>
              <a href="/lessons/create">Pievienot nodarbību</a></li>
              <li>
              <span data-feather="user-plus"></span>
              <a href="/students/create">Pievienot skolēnu</a></li>
            </ol>
          </div>
         
          
</div>
@endsection

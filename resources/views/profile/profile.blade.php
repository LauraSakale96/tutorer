@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <img src="/uploads/image/{{ $user->image}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            <h2> Profils : {{$user->name}} {{$user->lastname}} </h2>
                <p> Priekšmets, ko pasniedz: {{$user->subject}}</p>
                <p> Iegūtā izglītība : {{$user->education}}</p>
                <p> Apraksts : {{$user->description}}</p>
                <form enctype="multipart/form-data" action="/profile" method="POST">
                <label>Nomaini Profila Bildi</label>
                <input type="file" name="image">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="btn btn-primary"
                        value="Ievadīt"/>
                </form>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-3 pull-right">
         
          <div class="sidebar-module">
          
            <ol class="list-unstyled">
            <li><a href="/profile/edit">Rediģēt</a></li>
               
    </div>
</div>
@endsection

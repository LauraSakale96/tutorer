@extends('layouts.master')

@section('content')
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  </head>

<div class="col-sm-9 col-md-9 col-lg-9 pull-left" style="background: white;">
<h1>Rediģē mācību priekšmetu</h1>

    
      <div class="row" style="background:white; margin: 10px;">

 
        <div class="col-lg-12 col-md-12 col-sm-12">
         <form method="post" action="{{ route('subjects.update', [$subject->id])}}">
            {{ csrf_field()}}

            <input type="hidden" name="_method" value="put">
            <div class="form-group">
                <label for="subject-name">Nosaukums<span class="required">*</span></label>
                <input placeholder="Ievadi mācību priekšmeta nosaukumu"
                        id="subject-name"
                        required
                        name="name"
                        spellcheck="false"
                        class="form-control"
                        value="{{ $subject->name }}"/>
                        
                </div>

                <div class="form-group">
                <label for="subject-content">Apraksts<span class="required">*</span></label>
                <textarea placeholder="Mācību priekšmeta apraksts"
                        style="resize: vertical"
                        id="subject-content"
                        required
                        name="description"
                        rows="5" spellcheck="false"
                        class="form-control autosize-target text-left">
                        {{$subject->description}}
                        </textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary"
                        value="Pievienot"/>
                        </div>
                        </form>
       </div>
      
      </div>
</div>

<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
         
          <div class="sidebar-module">
            <h4>Izvēlies savu rīcību</h4>
            <ol class="list-unstyled">
              <li>
              <span data-feather="book"></span>
              <a href="/subjects/{{$subject->id}}">Apskatīt mācību priekšmetu</a></li>
              <li>
              <span data-feather="book-open"></span>
              <a href="/subjects">Visi mācību priekšmeti</a></li>
              
            </ol>
          </div>
         
          
        </div>
    @endsection
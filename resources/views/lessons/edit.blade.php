@extends('layouts.master')

@section('content')

<div class="col-sm-9 col-md-9 col-lg-9 pull-left" style="background: white;">
<h1>Rediģēt nodarbību</h1>

      
      <!-- Example row of columns -->
      <div class="row" style="background:white; margin: 10px;">

 
        <div class="col-lg-12 col-md-12 col-sm-12">
         <form method="post" action="{{ route('lessons.update', [$lesson->id])}}" files="true">
            {{ csrf_field()}}

            <input type="hidden" name="_method" value="put">
            <div class="form-group">
                <label for="lesson-name">Nodarbības nosaukums<span class="required">*</span></label>
                <input placeholder="Ievadiet nodarbības nosaukumu"
                        id="lesson-name"
                        required
                        name="name"
                        spellcheck="false"
                        class="form-control"
                        value="{{ $lesson->name }}"/>
                        
                </div>

                <div class="form-group">
                <label for="lesson-content">Apraksts</label>
                <textarea placeholder="Ievadiet nodarbības aprakstu"
                        style="resize: vertical"
                        id="lesson-content"
                        name="description"
                        rows="5" spellcheck="false"
                        class="form-control autosize-target text-left">
                        {{$lesson->description}}
                        </textarea>
                </div>

              
                <div class="form-group">
                    <input type="submit" class="btn btn-primary"
                        value="Ievadīt"/>
                        </div>
                        </form>
       </div>
      
      </div>
</div>

<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
         <!-- <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
          <div class="sidebar-module">-->
          <div class="sidebar-module">
            <h4>Ivēlieties savu darbību</h4>
            <ol class="list-unstyled">
              <li><a href="/lessons/{{$lesson->id}}">Apskatīt nodarbības</a></li>
              <li><a href="/lessons">Visas nodarbības</a></li>
              
            </ol>
          </div>
          
          
        </div>
    @endsection
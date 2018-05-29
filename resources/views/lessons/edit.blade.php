@extends('layouts.master')

@section('content')
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>


  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

</head>

<div class="col-sm-9 col-md-9 col-lg-9 pull-left" style="background: white;">
<h1>Rediģēt nodarbību</h1>

      
      
      <div class="row" style="background:white; margin: 10px;">

 
        <div class="col-lg-12 col-md-12 col-sm-12">
         <form method="post" action="{{ route('lessons.update', [$lesson->id])}}" files="true"> <!-- kā route izsauc lessons.update, kas ir funkcija, kas atļauj atjaunot datus datubāzē -->
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
                <label for="lesson-lessondate">Nodarbības datums<span class="required">*</span></label>
                     <input class="date form-control" type="date"
                     id="lesson-lessondate"
                    name="lessondate"
                    spellcheck="false"
                        class="form-control"
                        value="{{ $lesson->lessondate }}"
                    />
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
         
          <div class="sidebar-module">
            <h4>Ivēlieties savu darbību</h4>
            <ol class="list-unstyled">
              <li>
              <span data-feather="file"></span>
              <a href="/lessons/{{$lesson->id}}">Apskatīt nodarbību</a></li>
              <li>
              <span data-feather="layers"></span>
              <a href="/lessons">Visas nodarbības</a></li>
              
            </ol>
          </div>
          
          
        </div>
    @endsection
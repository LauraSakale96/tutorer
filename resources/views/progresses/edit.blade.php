@extends('layouts.master')

@section('content')
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet"/>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

</head>
@if($progress->user_id == Auth::user()->id)
<div class="col-sm-9 col-md-9 col-lg-9 pull-left" style="background: white;">
<h1>Rediģēt progresu</h1>

      
      
      <div class="row" style="background:white; margin: 10px;">

 
        <div class="col-lg-12 col-md-12 col-sm-12">
         <form method="post" action="{{ route('progresses.update', [$progress->id])}}" files="true"> <!-- kā route izsauc progresses.update, kas ir funkcija, kas atļauj atjaunot datus datubāzē -->
            {{ csrf_field()}}

            <input type="hidden" name="_method" value="put">
            <div class="form-group">
                <label for="progress-name">Progress<span class="required">*</span></label>
                <input placeholder="Progress"
                        id="progress-name"
                        required
                        name="name"
                        spellcheck="false"
                        class="form-control"
                        value="{{ $progress->name }}"/>
                        
                </div>

                <div class="form-group">
                <label for="progress-date">Progresa pievienošanas datums<span class="required">*</span></label>
                     <input class="date form-control" type="date"
                     id="progress-date"
                    name="date"
                    spellcheck="false"
                        class="form-control"
                        value="{{ $progress->date }}"
                    />
                 </div>

                <script type="text/javascript">

                    $('.date').datepicker({  

                    format: 'dd-mm-yyyy'
                     });  

                </script>

                <div class="form-group">
                <label for="progress-content">Apraksts</label>
                <textarea placeholder="Ievadiet nodarbības aprakstu"
                        style="resize: vertical"
                        id="progress-content"
                        name="description"
                        rows="5" spellcheck="false"
                        class="form-control autosize-target text-left">
                        {{$progress->description}}
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
              <a href="/progresses/{{$progress->id}}">Apskatīt progresu</a></li>
              <li>
              <span data-feather="layers"></span>
              <a href="/progresses">Visi pievienotie progresi</a></li>
              
            </ol>
          </div>
          
          
        </div>
        @endif
    @endsection
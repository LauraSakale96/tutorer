@extends('layouts.master')



@section('content')
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  </head>
  <body>
  <main role="main float:right">

      <div class="jumbotron float:right">
        <div class="container float:right">
          <h1 class="display-3">TUTORER- palīgs pašapmācības skolotājiem!</h1>
          <p>Tutorer ir palīgs pašapmācības skolotājiem. Kur tie var pievienot visus priekšmetus, kurus tie pasniedz. Pievienot noteiktajiem priekšmetiem nodarbības. Pievienot mācību materiālus un glabāt tos vienuviet!  </p>
          <p><a class="btn btn-primary btn-lg" href="http://tutorer.dev/info" role="button">Uzzini vairāk! &raquo;</a></p>
        </div>
      </div>
  <div class="container float:right">
  <div class="col-md-4">
            <h2>Profils</h2>
            <p>Izveido savu profilu, kur vari norādīt visu svarīgāko iznformāciju par sevi.</p>
            
              <p><a class="btn btn-secondary" href="http://tutorer.dev/teacherprofiles" role="button">Apskati savu profilu &raquo;</a></p>
          

          </div>
        <div class="row">
          <div class="col-md-4">
            <h2>Priekšmeti</h2>
            <p>Pievieno apskati mācību priekšmetus- pievieno nosaukumu un aprakstu mācību priekšmetiem, kurus pasniedz! </p>
            <p><a class="btn btn-secondary" href="http://tutorer.dev/lessons" role="button">Pievienot priekšmetu &raquo;</a></p>
            
            
          </div>
          <div class="col-md-4">
            <h2>Nodarbības</h2>
            <p>Pievieno saviem mācību priekšmetiem nodarbības! </p>
            <p><a class="btn btn-secondary" href="http://tutorer.dev/lessons" role="button">Pievienot priekšmetu &raquo;</a></p>
            
          </div>
          
        </div>

        <hr>

      </div> 
  </body>

@endsection
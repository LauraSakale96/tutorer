@extends('layouts.master')
@section('nav-bar')

@endsection

@section('content')
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  </head>
  <body>
  <main role="main float:right">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron float:right">
        <div class="container float:right">
          <h1 class="display-3">TUTORER- palīgs pašapmācības skolotājiem!</h1>
          <p>Tutorer ir palīigs pašapmācības skolotājiem. Kur tie var pievienot visus priekšmetus, kurus tie pasniedz. Pievienot noteiktajiem priekšmetiem nodarbības. Pievienot mācību materiālus un glabāt tos vienuviet!  </p>
          <p><a class="btn btn-primary btn-lg" href="#" role="button">Uzzini vairāk! &raquo;</a></p>
        </div>
      </div>
  <div class="container float:right">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-md-4">
            <h2>Priekšmeti</h2>
            <p>Pievieno apskati mācību priekšmetus- pievieno nosaukumu un aprakstu māčibu priekšmetiem, kurus pasniedz! </p>
            <p><a class="btn btn-secondary" href="http://tutorer.dev/subjects" role="button">Pievienot priekšmetu &raquo;</a></p>
            
          </div>
          <div class="col-md-4">
            <h2>Nodarbības</h2>
            <p>Pievieno saviem mācību priekšmetiem nodarbības! </p>
            <p><a class="btn btn-secondary" href="http://tutorer.dev/lessons" role="button">Pievienot priekšmetu &raquo;</a></p>
            
          </div>
          <div class="col-md-4">
            <h2>Add something</h2>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <p><a class="btn btn-secondary" href="http://tutorer.dev/lessons" role="button">Pievienot priekšmetu &raquo;</a></p>

          </div>
        </div>

        <hr>

      </div> <!-- /container -->
  </body>

@endsection
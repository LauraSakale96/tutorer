<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tutorer') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

    <div id="app">
    
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Tutorer') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Iziet') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
        <nav class="sidenavbar">
        <div class="nav-bar">
        <div class="container-fluid">
      <div class="row">
        <nav class="col-md-3 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              

            <li class="nav-item">
                <a class="nav-link" href="http://tutorer.dev/profils">
                  <span data-feather="users"></span>
                  Profils
                </a>
              </li>

            <li class="nav-item">
                <a class="nav-link" href="http://tutorer.dev/subjects">
                  <span data-feather="book"></span>
                  Priekšmeti
                </a>
              </li>
            
            

              <li class="nav-item">
                <a class="nav-link" href="http://tutorer.dev/lessons">
                  <span data-feather="file"></span>
                  Nodarbība
                </a>
              </li>

              @if(Auth::user()->role == 'skolotajs')
            <li class="nav-item">
                <a class="nav-link" href="http://tutorer.dev/student-lists">
                  <span data-feather="users"></span>
                  Skolēnu saraksts
                </a>
              </li>
            
            @endif

                @if(Auth::user()->role == 'skolotajs')
            <li class="nav-item">
                <a class="nav-link" href="http://tutorer.dev/materials">
                  <span data-feather="file-text"></span>
                  Mācību materiāli
                </a>
              </li>
            
            @endif

              <li class="nav-item">
                <a class="nav-link" href="http://tutorer.dev/attendances">
                  <span data-feather="check-square"></span>
                  Apmeklējums
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="http://tutorer.dev/progreses">
                  <span data-feather="award"></span>
                  Progress
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="http://tutorer.dev/diagnoses">
                  <span data-feather="activity"></span>
                  Diagnoze
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="http://tutorer.dev/posts">
                  <span data-feather="mail"></span>
                  Pasts
                </a>
              </li>
            

           
        </ul>

      </div>
      
    </div>
    
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

   
    </script>

</html>

                </div>
            </div>
        </div>
    </div>
</div>
</nav>
</div>

<body>
<main class="py-4">
            @yield('nav-bar')
            @yield('content')
            
            
        </main>
      </body>
        <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
</html>
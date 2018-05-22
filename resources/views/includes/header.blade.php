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
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="position:relative;padding-left:50px;">
                <img src="/uploads/image/{{ Auth::user()->image}}" style="width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%">
                {{ Auth::user()->name }} {{Auth::user()->lastname}}
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
        
            <div class="row">
                <nav class=" sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">

                        <li class="nav-item">
                            <a class="nav-link" href="http://tutorer.dev/home">
                            <span data-feather="home"></span>
                            Sākums
                            </a>
                        </li>
                      
                        <li class="nav-item">
                            <a class="nav-link" href="http://tutorer.dev/profile">
                            <span data-feather="file-text"></span>
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

                    
                        <li class="nav-item">
                            <a class="nav-link" href="http://tutorer.dev/file">
                            <span data-feather="file-text"></span>
                            Materiāli
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <span data-feather="user-plus"></span>
                            Skolēni
                            </a>
                        </li>
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

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            <span data-feather="log-out"></span>
                            Iziet
                            </a>
                        </li>
                        </ul>
                    </div>
                </nav>
            
        </div>
    </div>
</nav>


<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
feather.replace()
</script>  
</script>


<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
<div class="container">

    <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name', 'Tutorer') }}
    </a>
   

    <div class="collapse navbar-collapse" >
    
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
               <li >
                    <a >
                        {{ Auth::user()->name }} {{Auth::user()->lastname}}
                    </a>

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
                        @if(Auth::user()->role == 'skolotajs')
                        <li class="nav-item">
                            <a class="nav-link" href="http://tutorer.dev/teacherprofiles">
                            <span data-feather="file-text"></span>
                            Profils
                            </a>
                        </li>

                        @endif

                        @if(Auth::user()->role == 'skolnieks')
                        <li class="nav-item">
                            <a class="nav-link" href="http://tutorer.dev/studentprofiles">
                            <span data-feather="users"></span>
                            Profils
                            </a>
                        </li>
                        @endif

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
                            <a class="nav-link" href="http://tutorer.dev/file">
                            <span data-feather="file-text"></span>
                            Materiāli
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


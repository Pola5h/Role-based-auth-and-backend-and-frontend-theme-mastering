<header class="header-top bg-grey justify-content-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-2 col-md-4 text-center d-none d-lg-block">
                <a class="navbar-brand " href="index.html">
                    <img src="{{ URL::asset('../frontend/assets/images/logo.png')}}" alt="" class="img-fluid">
                </a>
            </div>

            <div class="col-lg-8 col-md-12">
                <nav class="navbar navbar-expand-lg navigation-2 navigation">
                    <a class="navbar-brand text-uppercase d-lg-none" href="#">
                        <img src="{{ URL::asset('../frontend/assets/images/logo.png')}}" alt="" class="img-fluid">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse"
                        aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="ti-menu"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbar-collapse">
                        <ul id="menu" class="menu navbar-nav mx-auto">
                            <li class="nav-item"><a href="{{URL('/')}}" class="nav-link">Home</a></li>

                            {{-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Blog Posts
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                    <a class="dropdown-item" href="#">Standard Fullwidth</a>
                                    <a class="dropdown-item" href="#">Standard Left
                                        Sidebar</a>
                                    <a class="dropdown-item" href="#">Standard Right
                                        Sidebar</a>
                                </div>
                            </li> --}}

                            <li class="nav-item"><a href="#" class="nav-link">About</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Category</a></li>
                            <li class="nav-item"><a href="{{ URL('contact') }}" class="nav-link">Contact</a></li>


                            @auth
                            {{-- User is logged in --}}


                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome, {{
                                    Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                    <a class="dropdown-item"
                                        href="{{URL(Auth::user()->user_type == 1 ? 'profile' : (Auth::user()->user_type == 2 ? 'user/profile' : 'welcome'))}}">
                                        My Profile</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="#"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log
                                        Out</a>

                                </div>
                            </li>


                            @else
                            {{-- User is not logged in --}}
                            <li class="nav-item"><a href="{{URL('login')}}" class="nav-link">login</a></li>
                            @endauth

                        </ul>

                        <ul class="list-inline mb-0 d-block d-lg-none">
                            <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ti-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ti-linkedin"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ti-pinterest"></i></a></li>
                        </ul>
                    </div>
                </nav>
            </div>

            <div class="col-lg-2 col-md-4 col-6">
                <div class="header-socials-2 text-right d-none d-lg-block">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="ti-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="ti-linkedin"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="ti-pinterest"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
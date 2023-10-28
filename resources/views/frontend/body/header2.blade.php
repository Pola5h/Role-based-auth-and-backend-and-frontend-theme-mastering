<div class="header-logo py-5 d-none d-lg-block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <a class="navbar-brand" href="#"><img src="{{ URL::asset('../frontend/assets/images/logo.png')}}" alt=""
                        class="img-fluid w-100"></a>
            </div>
        </div>
    </div>
</div>

<header class="header-top bg-grey justify-content-center">
    <nav class="navbar navbar-expand-lg navigation">
        <div class="container">
            <a class="navbar-brand d-lg-none" href="#"><img src="{{ URL::asset('../frontend/assets/images/logo.png')}}" alt="" class="img-fluid"></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="ti-menu"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul id="menu" class="menu navbar-nav ">
                  
                    <li class="nav-item"><a href="{{URL('/')}}" class="nav-link">Home</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Blog Posts
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                            <a class="dropdown-item" href="#">Standard Fullwidth</a>
                            <a class="dropdown-item" href="#">Standard Left Sidebar</a>
                            <a class="dropdown-item" href="#">Standard Right Sidebar</a>
                        </div>
                    </li>

                    <li class="nav-item"><a href="#" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Category</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
                    @auth

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Welcome, {{Auth::user()->name }} </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
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
                    <li class="nav-item"><a href="{{URL('login')}}" class="nav-link">Log In</a></li>

                    @endauth
                    <li class="nav-item d-lg-none">
                        <div class="search_toggle p-3 d-inline-block bg-white"><i class="ti-search"></i></div>
                    </li>
                </ul>
            </div>

            <div class="text-right search d-none d-lg-block">
                <div class="search_toggle"><i class="ti-search"></i></div>
            </div>
        </div>
    </nav>

</header>
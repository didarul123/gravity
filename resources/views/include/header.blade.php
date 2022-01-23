<!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{asset('public/assets/img/logo/loder.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    @if(!Route::is('exam'))
    <header>
        <!-- Header Start -->
        <div class="header-area header-transparent">
            <div class="main-header ">
                <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="{{route('home')}}"><img src="{{asset('public/assets/img/logo/logo.png')}}" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <div class="menu-wrapper d-flex align-items-center justify-content-end">
                                    <!-- Main-menu -->
                                    <div class="main-menu d-none d-lg-block">
                                        
                                        <nav>
                                            <ul id="navigation">                                                                                          
                                                <li class="active" ><a href="{{route('home')}}">Home</a></li>
                                                @auth
                                                <li class="active" ><a href="{{route('dashboard')}}">Dashboard</a></li>
                                                @endauth
                                                <li class="active" ><a href="{{route('course')}}">Course</a></li>
                                                <li class="active" ><a href="{{route('routine')}}">Routine</a></li>
                                                <li>
                                                @auth
                                                    <li class="active" ><a href="{{route('logout')}}">Logout</a></li>
                                                @endauth
                                                <li><a href="javascript:;">About</a>
                                                    {{-- <ul class="submenu">
                                                        <li><a href="javascript:;">Our Vesion</a></li>
                                                        <li><a href="javascript:;">Our Mission</a></li>
                                                        
                                                    </ul> --}}
                                                </li>
                                                <li><a href="{{route('contact.us')}}">Contact</a></li>
                                                <!-- Button -->
                                                @guest
                                                <li class="button-header margin-left "><a href="{{route('register')}}" class="btn">Join</a></li>
                                                <li class="button-header"><a href="{{route('login')}}" class="btn btn3">Login</a></li>
                                                @endguest
                                                @auth

                                                    <li class="button-header margin-left "><a href="javascript:;" class="btn">Hi,{{auth()->user()->name}}</a></li>
                                                @endauth
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div> 
                            
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    @endif
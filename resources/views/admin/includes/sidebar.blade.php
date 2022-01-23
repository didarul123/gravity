<div class="nav-left-sidebar sidebar-dark">
    <style type="text/css">
        .nav-left-sidebar .submenu {
            padding-left: 12px !important;
            padding-right: 0px !important;
            background: no-repeat !important; 
        }
        .actcol{
            background: black;
        }
    </style>
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="{{route('admin.dashboard')}}">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class=" fas fa-align-justify"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{Route::is('admin.dashboard') ? 'active' : ''}}" href="{{route('admin.dashboard')}}">
                        <i class="fas fa-tachometer-alt"></i>
                        Dashboard 
                        </a>
                    </li>
                    {{-- <li class="nav-item ">
                        <a class="nav-link {{Route::is('manage.category','create.category','manage.sub.category') ? 'active' : ''}}" href="{{route('manage.category')}}">
                        <i class="fa fa-user"></i>
                        Manage Categories 
                        </a>
                    </li> --}}
                    {{-- <li class="nav-item {{Route::is('manage.category','create.category','manage.sub.category','create.sub.category') ? '' : 'collapsed'}}">
                    <a class="nav-link {{Route::is('manage.category','create.category','manage.sub.category','create.sub.category') ? 'actcol' : ''}}" href="javascript:void(0);" data-toggle="collapse" aria-expanded="{{Route::is('manage.category','create.category','manage.sub.category','create.sub.category') ? 'true' : 'false'}}" data-target="#submenu-3" aria-controls="submenu-3">
                    <span class="menu-icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                    <span class="menu-text">Manage Categories</span>
                    </a>
                    <div id="submenu-3" class="collapse in submenu {{Route::is('manage.category','create.category','manage.sub.category','create.sub.category') ? 'show' : ''}}">
                        <ul class="nav flex-column ">
                            <li class="nav-item ">
                                <a class="nav-link {{Route::is('manage.category','create.category') ? 'actcol' : ''}}" href="{{ route('manage.category')}}">
                                <span class="menu-icon"><i class="glyphicon glyphicon-book" aria-hidden="true"></i></span><span class="menu-text active">Categories</span></a>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link {{Route::is('manage.sub.category','create.sub.category') ? 'actcol' : ''}}" href="{{route('manage.sub.category')}}"><span class="menu-icon"><i class="glyphicon glyphicon-book" aria-hidden="true"></i></span><span class="menu-text">Sub Categories</span></a>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
                @if(Auth::guard('admin')->user()->type=='A')
                     <li class="nav-item ">
                        <a class="nav-link {{Route::is('manage.teacher','create.teacher','view.teacher') ? 'active' : ''}}" href="{{route('manage.teacher')}}">
                        <i class="fas fa-lightbulb"></i> 
                        Manage Teacher
                        </a>
                    </li>
                     <li class="nav-item ">
                        <a class="nav-link {{Route::is('manage.branch.manager','create.branch.manager','view.branch.manager') ? 'active' : ''}}" href="{{route('manage.branch.manager')}}">
                        <i class="fas fa-lightbulb"></i> 
                        Manage Branch Manager
                        </a>
                    </li>
                   
                    {{-- <li class="nav-item ">
                        <a class="nav-link">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        Manage Branch Manager 
                        </a>
                    </li> --}}
                    {{-- <li class="nav-item ">
                        <a class="nav-link ">
                        <i class="fa fa-user"></i> 
                        Manage Student 
                        </a>
                    </li> --}}

                   {{--  <li class="nav-item ">
                        <a class="nav-link {{Route::is('manage.exam','create.exam','add.question','view.exam','view.question') ? 'active' : ''}}" href="{{route('manage.exam')}}">
                        <i class="fa fa-book"></i> 
                        Manage Exam 
                        </a>
                    </li> --}}

                   <li class="nav-item ">
                        <a class="nav-link {{Route::is('manage.student','create.student','view.student') ? 'active' : ''}}" href="{{route('manage.student')}}">
                        <i class="fas fa-lightbulb"></i> 
                        Manage Student
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link {{Route::is('manage.course','create.course','view.course') ? 'active' : ''}}" href="{{route('manage.course')}}">
                        <i class="fas fa-lightbulb"></i> 
                        Manage Course
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link {{Route::is('manage.subject','create.subject') ? 'active' : ''}}" href="{{route('manage.subject')}}">
                        <i class="fas fa-lightbulb"></i> 
                        Manage Subject
                        </a>
                    </li>


                    <li class="nav-item ">
                        <a class="nav-link {{Route::is('manage.class','create.class') ? 'active' : ''}}" href="{{route('manage.class')}}">
                        <i class="fas fa-lightbulb"></i> 
                        Manage Class
                        </a>
                    </li>



                    <li class="nav-item ">
                        <a class="nav-link {{Route::is('manage.notice.board','create.notice.board','view.notice.board') ? 'active' : ''}}" href="{{route('manage.notice.board')}}">
                        <i class="fas fa-lightbulb"></i> 
                        Manage Notice Board
                        </a>
                    </li>
                    
                    <li class="nav-item ">
                        <a class="nav-link {{Route::is('manage.exam','create.exam','add.question','view.exam','view.question') ? 'active' : ''}}" href="{{route('manage.exam')}}">
                        <i class="fa fa-book"></i> 
                        Manage Exam 
                        <a class="nav-link {{Route::is('manage.routine') ? 'active' : ''}}" href="{{route('manage.routine')}}">
                        <i class="fas fa-lightbulb"></i> 
                        Manage Routine
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{Route::is('manage.attendance') ? 'active' : ''}}" href="{{route('manage.attendance')}}">
                        <i class="fas fa-lightbulb"></i> 
                        Manage Attendance
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link {{Route::is('add.message') ? 'active' : ''}}" href="{{route('add.message')}}">
                        <i class="fas fa-lightbulb"></i> 
                        Send Message
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link {{Route::is('manage.slider','create.slider','view.slider') ? 'active' : ''}}" href="{{route('manage.slider')}}">
                        <i class="fas fa-lightbulb"></i> 
                        Manage Slider
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link {{Route::is('manage.testimonial','create.testimonial','view.testimonial') ? 'active' : ''}}" href="{{route('manage.testimonial')}}">
                        <i class="fas fa-lightbulb"></i> 
                        Manage Testimonial
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link {{Route::is('manage.publication','create.publication','store.publication') ? 'active' : ''}}" href="{{route('manage.publication')}}">
                        <i class="fas fa-lightbulb"></i> 
                        Manage Publication
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link {{Route::is('manage.fact','create.fact','store.fact') ? 'active' : ''}}" href="{{route('manage.fact')}}">
                        <i class="fas fa-lightbulb"></i> 
                        Manage Facts
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link {{Route::is('manage.faq','create.faq','store.faq') ? 'active' : ''}}" href="{{route('manage.faq')}}">
                        <i class="fas fa-lightbulb"></i> 
                        Manage Faq
                        </a>
                    </li>
                    @endif
                    
                    {{-- <li class="nav-item ">
                        <a class="nav-link {{Route::is('manage.program','create.program','view.program') ? 'active' : ''}}" href="{{route('manage.program')}}">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                         Manage Program 
                         </a>
                    </li> --}}

                    @if(Auth::guard('admin')->user()->type=='T')
                     <li class="nav-item ">
                        <a class="nav-link {{Route::is('teacher.view.course') ? 'active' : ''}}" href="{{route('teacher.view.course')}}">
                        <i class="fas fa-lightbulb"></i> 
                        Course Assign
                        </a>
                    </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.logout')}}">
                        <i class='fas fa-sign-out-alt'></i> 
                        Logout 
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
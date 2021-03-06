<div class="dashboard-header">
    <nav class="navbar navbar-expand-lg bg-white fixed-top">
        <a class="navbar-brand" href="{{route('admin.dashboard')}}"><img class="logo-img" src="{{asset('public/admin/images/logo.png')}}" style="margin-bottom: 10px;" alt=""></a>
        <button class="navbar-toggler ntifymnu" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class=" fas fa-align-right"></i></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right-top">
                <li class="nav-item dropdown nav-user">
                    <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if(@Auth::guard('admin')->user()->image)
                            <img src="{{asset('storage/app/admin/profileImage/'.Auth::guard('admin')->user()->image)}}" alt="" class="user-avatar-md rounded-circle">
                        @else
                            <img src="{{asset('public/admin/assets/images/avatar-1.jpg')}}" alt="" class="user-avatar-md rounded-circle"></a>
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                        <div class="nav-user-info">
                            <h5 class="mb-0 text-white nav-user-name">
                                {{-- {{Auth::guard('admin')->user()->name}} --}}
                                Admin
                            </h5>
                        </div>
                        <a class="dropdown-item" href="{{route('edit.admin.profile')}}"><i class="fas fa-edit mr-2"></i>Edit Profile</a>
                        <a class="dropdown-item" href="{{route('admin.logout')}}"><i class="fas fa-power-off mr-2"></i>Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
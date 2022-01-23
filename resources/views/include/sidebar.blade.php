<div class="col-lg-4">
    <div class="blog_right_sidebar">
        <aside class="single_sidebar_widget post_category_widget">
            <h4 class="widget_title" style="color: #2d2d2d;">Category</h4>
            <ul class="list cat-list">
                <li>
                    <a href="{{route('dashboard')}}" class="d-flex">
                        <p class="actt">Dashboard</p>
                    </a>
                </li>
                <li>
                    <a class="d-flex {{Route::is('edit.profile') ? 'actt' : ''}}" href="{{route('edit.profile')}}">
                        <p>Edit Profile</p>
                    </a>
                </li>
                {{-- <li>
                    <a href="{{route('course')}}" class="d-flex {{Route::is('course') ? 'actt' : ''}}">
                        <p>Courses</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('routine')}}" class="d-flex {{Route::is('routine') ? 'actt' : ''}}">
                        <p>Routine</p>
                    </a>
                </li> --}}
                <li>
                    <a href="{{route('my.enroll')}}" class="d-flex">
                        <p>My Enrollment</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('select.exam')}}" class="d-flex">
                        <p>Exam</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('logout')}}" class="d-flex">
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </aside>
    </div>
</div>
@extends('admin.layouts.app')
@section('title')
Teacher Attendance
@endsection
@section('links')
@include('admin.includes.links')
@endsection
@section('headers')
@include('admin.includes.header')
@endsection
@section('sidebar')
@include('admin.includes.sidebar')
@endsection
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Teacher Attendance</h2>
                <div class="page-breadcrumb"> 
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Teacher Attendance </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            @include('admin.includes.message')
            <div class="card">
                {{-- <h5 class="card-header">Assign Teacher To Course =>{{@$course->name}}</h5> --}}
                <div class="card-body">
                    <form action="{{route('store.teacher.attendance')}}" method="POST">
                        @csrf

                        {{-- <input type="hidden" name="course_id" value="{{@$course->id}}"> --}}
                        <div class="row">
                            <div class="form-group col-xl-3 col-lg-4 col-md-6 col-sm-4 col-12 pad-r pad-l">
                                <label for="inputText3" class="col-form-label">Teacher List</label>
                                <select class="form-control" name="teacher_id">
                                    <option value="">Select</option>
                                    @foreach(@$teacher_list as $val)
                                    <option value="{{@$val->id}}">{{@$val->name}}</option>
                                    {{-- <option value="I" {{@$key['status']=='I' ? 'selected' : ''}}>Inactive</option> --}}
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-xl-3 col-lg-4 col-md-6 col-sm-4 col-12 pad-r pad-l">
                                <label for="inputText3" class="col-form-label">Course List</label>
                                <select class="form-control" name="course_id">
                                    <option value="">Select</option>
                                    @foreach(@$course_list as $val)
                                    <option value="{{@$val->id}}">{{@$val->name}}</option>
                                    {{-- <option value="I" {{@$key['status']=='I' ? 'selected' : ''}}>Inactive</option> --}}
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-xl-3 col-lg-4 col-md-6 col-sm-3 col-12 pad-l">
                                <label for="inputPassword" class="col-form-label hide_label">&nbsp;</label>
                                <button type="submit" class="btn btn-primary search_btnUser">Submit</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive user_tableBoxMain">
                        <table id="table_id" class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <th>Teacher Name</th>
                                    <th>Course</th>
                                    {{-- <th>Profile Image</th> --}}
                                    <th>Date</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($attendance as $val)
                                <tr>
                                    <td>
                                        {{-- {{@$val->gerParentName->name ? @$val->gerParentName->name : '-'}} --}}
                                        {{@$val->getTeacherAttendance->name}}
                                    </td>
                                    
                                    {{-- <td class="sorting_1">
                                        <span class="userposted_imgBox">
                                            @if(@$val->image)
                                                <img src="{{asset('storage/app/teacher_image/'.@$val->image)}}">
                                            @else
                                                <img src="{{asset('public/noimg.png')}}">
                                            @endif
                                        </span>
                                    </td> --}}
                                    <td>{{@$val->getAttendCourse->name}}</td>
                                    <td>{{date('d-m-Y', strtotime(@$val->created_at))}}</td>
                                
                                </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                        {{-- <div class="paginate">{{$category->links()}}</div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
@include('admin.includes.footer')
@endsection
@section('script')
@include('admin.includes.scripts')
@endsection

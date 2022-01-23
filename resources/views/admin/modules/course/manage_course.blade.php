@extends('admin.layouts.app')
@section('title')
Manage Course
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
                <h2 class="pageheader-title">Manage Course</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Course </li>
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
                <h5 class="card-header">Manage Course <a class="adbtn btn btn-primary" title="Add new category" href="{{route('create.course')}}"><i class="fa fa-plus" aria-hidden="true"></i> Add Course</a></h5>
                <div class="card-body">
                    <form action="{{route('manage.course')}}">
                        <div class="row">
                            <div class="form-group col-xl-3 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label for="inputText3" class="col-form-label">keyword </label>
                                <input name="keyword" type="text" class="form-control" placeholder="Type Here" value="{{@$key['keyword']}}">
                            </div>
                            <div class="form-group col-xl-3 col-lg-4 col-md-6 col-sm-4 col-12 pad-r pad-l">
                                <label for="inputText3" class="col-form-label">Class</label>
                                <select class="form-control" name="parent_id">
                                    <option value="">Select</option>
                                    @foreach($parent as $val)
                                        <option value="{{$val->id}}" {{@$key['parent_id']==@$val->id ? 'selected' : ''}}>{{@$val->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-xl-3 col-lg-4 col-md-6 col-sm-3 col-12 pad-l">
                                <label for="inputPassword" class="col-form-label hide_label">&nbsp;</label>
                                <button type="submit" class="btn btn-primary search_btnUser">Search</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive user_tableBoxMain">
                        <table id="table_id" class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <th>Course Name</th>
                                    <!-- <th>Class Name</th> -->
                                    <th>From Date</th>
                                    <th>To Date</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    
                                    {{-- <th>Status</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($course as $val)
                                <tr>
                                    <td>
                                        {{-- {{@$val->gerParentName->name ? @$val->gerParentName->name : '-'}} --}}
                                        {{@$val->name}}
                                    </td>
                                    <!-- <td>
                                        {{@$val->gerParentName->name ? @$val->gerParentName->name : '-'}}
                                    </td> -->
                                    <td>{{@$val->from_date}}</td>
                                    <td>{{@$val->to_date}}</td>
                                    <td class="sorting_1">
                                        <span class="userposted_imgBox">
                                            @if(@$val->image)
                                                <img src="{{asset('storage/app/course/'.@$val->image)}}">
                                            @else
                                                <img src="{{asset('public/noimg.png')}}">
                                            @endif
                                        </span>
                                    </td>
                                    <td>{{@$val->price}}</td>
                                <td>
                                    {{-- <td>
                                        @if(@$val->status=='A')
                                            Active
                                        @elseif(@$val->status=='I')
                                            Inactive
                                        @endif
                                    </td>
                                    <td> --}}
                   
                                        {{-- @if($val->status=='A')
                                        <a  href="" onclick="return confirm('Do you want to change status for this category ?')"><i class=" fas fa-times" title="Inactive"></i></a>
                                        @elseif($val->status=='I')
                                        <a href="" onclick="return confirm('Do you want to change status for this category ?')"><i class="fas fa-check" title="Active"></i></a>
                                        @endif --}}
                                        <a href="{{route('view.course',[$val->id])}}"><i class="fas fa-eye" title="View"></i></a>
                                        <a href="{{route('create.course',[$val->id])}}"><i class=" fas fa-edit" title="Edit"></i></a>
                                        <a href="{{route('delete.course',[$val->id])}}" onclick="return confirm('Do you want to delete course ?')"><i class=" fas fa-trash" title="Delete"></i></a>
                                        <a href="{{route('assign.teacher.course',[$val->id])}}"><i class=" fas fa-plus" title="Assign Teacher"></i></a>
                                    </td>
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

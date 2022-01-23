@extends('admin.layouts.app')
@section('title')
Manage Exam
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
                <h2 class="pageheader-title">Manage Exam</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Exam </li>
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
                <h5 class="card-header">Manage Exam <a class="adbtn btn btn-primary" title="Create Exam" href="{{route('create.exam')}}"><i class="fa fa-plus" aria-hidden="true"></i> Add</a></h5>
                <div class="card-body">
                    <div class="Srarch_filterBox">
                        <form action="{{route('manage.exam')}}">
                            <div class="row">
                                <div class="form-group col-xl-3 col-lg-3 col-md-6 col-sm-5 col-12 pad-r">
                                    <label for="inputText3" class="col-form-label">keyword </label>
                                    <input name="keyword" type="text" class="form-control" placeholder="Type Here" value="{{@$key['keyword']}}">
                                </div>
                                <div class="form-group col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 pad-r pad-l">
                                    <label for="inputText3" class="col-form-label">Course</label>
                                    <select class="form-control" name="course_id">
                                        <option value="">Select</option>
                                        @foreach($course as $val)
                                            <option value="{{$val->id}}" {{@$key['course_id'] == $val->id ? 'selected' :''}}>{{@$val->name}}</option>
                                        @endforeach
                                       
                                    </select>
                                </div>
                                
                                <div class="form-group col-xl-3 col-lg-3 col-md-6 col-sm-4 col-12 pad-r pad-l">
                                    <label for="inputText3" class="col-form-label">Status</label>
                                    <select class="form-control" name="status">
                                        <option value="">Select</option>
                                        <option value="A" {{@$key['status']=='A' ? 'selected' : ''}}>Active</option>
                                        <option value="I" {{@$key['status']=='I' ? 'selected' : ''}}>Inactive</option>
                                    </select>
                                </div>
                                <div class="form-group col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12 pad-l">
                                    <label for="inputPassword" class="col-form-label hide_label">&nbsp;</label>
                                    <button type="submit" class="btn btn-primary search_btnUser">Search</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <div class="table-responsive table-ss wrapper2">
                        <table class="table table-striped table-bordered first ll-pl div2">
                            <thead>
                                <tr>
                                    <th>Exam Name</th>
                                    <th>Course</th>
                                    <th>Subject</th>
                                    <th>Exam Duration</th>
                                    <th>Total Question</th>
                                    <th>Added Question</th>
                                    <th>Exam Start Date Time</th>
                                    <th>Platform</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($exam as $val)
                                <tr>
                                    <td>{{@$val->exam_name ? @$val->exam_name : 'N.A'}}</td>
                                    <td>{{@$val->getCourse->name ?? ''}}</td>
                                    <td>{{@$val->subject->name ?? ''}}</td>
                                    <td>{{@$val->duration_in_minute.' Minutes'}}</td>
                                    <td>{{@$val->total_questions}}</td>
                                    <td>{{@$val->questions_added}}</td>
                                    <td>{{@$val->exam_date_time ? date("d-m-Y h:i A",strtotime(@$val->exam_date_time)) : 'N.A'}}</td>
                                    <td>{{@$val->platform}}</td>
                                    <td>
                                        @if(@$val->status=='A')
                                            Active
                                        @elseif(@$val->status=='I')
                                            Inactive
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('view.exam',[$val->id])}}"><i class="fas fa-eye" title="View"></i></a>
                                        <a href="{{route('add.question',[$val->id])}}"><i class="fa fa-plus" title="Add Question"></i></i></a>
                                        @if($val->status=='A')
                                        <a  href="{{route('change.exam.status',[$val->id])}}" onclick="return confirm('Do you want to change status for this exam ?')"><i class=" fas fa-times" title="Inactive"></i></a>
                                        @elseif($val->status=='I')
                                        <a href="{{route('change.exam.status',[$val->id])}}" onclick="return confirm('Do you want to change status for this exam ?')"><i class="fas fa-check" title="Active"></i></a>
                                        @endif
                                        <a href="{{route('create.exam',[$val->id])}}"><i class=" fas fa-edit" title="Edit"></i></a>
                                        <a href="{{route('delete.exam',[$val->id])}}" onclick="return confirm('Do you want to delete this exam ?')"><i class=" fas fa-trash" title="Delete"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Exam Name</th>
                                    <th>Course</th>
                                    <th>Exam Duration</th>
                                    <th>Total Question</th>
                                    <th>Added Question</th>
                                    <th>Exam Start Date Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
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
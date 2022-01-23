@extends('admin.layouts.app')
@section('title')
Exam Question List
@endsection
@section('links')
@include('admin.includes.links')
@endsection
@section('headers')
@include('admin.includes.header')
<div id="loader" class="center"></div> 
@endsection
@section('sidebar')
@include('admin.includes.sidebar')
@endsection
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Exam Question List</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('manage.exam')}}" class="breadcrumb-link">Manage Exam</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Exam Question List </li>
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
                <h5 class="card-header">Exam Question List 
                    <a class="adbtn btn btn-primary" title="Add Question" href="{{route('add.question',[$exam->id])}}"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
                    <input type="hidden" class="exam_master_id" name="exam_skill_master_id" value="{{$exam->id}}">
                </h5>
                <div class="card-body">
                    <h2>Course : {{$exam->getCourse->name}}</h2>                   
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <th>Version</th>
                                    <th>Question</th>
                                    <th>Answer 1</th>
                                    <th>Answer 2</th>
                                    <th>Answer 3</th>
                                    <th>Answer 4</th>
                                    <th>Answer</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($question as $val)
                                <tr>
                                    <td>
                                        {{ $val->qs_version }}
                                    </td>
                                    <td>
                                        
                                        @if($val->uddipok)
                                            {{ @$val->uddipok }}
                                        @else
                                            <img src="{{asset('storage/app/question/'.@$val->uddipok_image)}}" style="width: 227px;height: 97px;">
                                        @endif
                                            
                                    </td>

                                    <td>
                                        @if($val->answer_1)
                                            {{ @$val->answer_1 }}
                                        @else
                                            <img src="{{asset('storage/app/question/'.@$val->answer_1_image)}}" style="width: 227px;height: 97px;">
                                        @endif
                                    </td>

                                    <td>
                                        @if($val->answer_2)
                                            {{ @$val->answer_2 }}
                                        @else
                                            <img src="{{asset('storage/app/question/'.@$val->answer_2_image)}}" style="width: 227px;height: 97px;">
                                        @endif
                                    </td>

                                    <td>
                                        @if($val->answer_3)
                                            {{ @$val->answer_3 }}
                                        @else
                                            <img src="{{asset('storage/app/question/'.@$val->answer_3_image)}}" style="width: 227px;height: 97px;">
                                        @endif
                                    </td>

                                    <td>
                                        @if($val->answer_4)
                                            {{ @$val->answer_4 }}
                                        @else
                                            <img src="{{asset('storage/app/question/'.@$val->answer_4_image)}}" style="width: 227px;height: 97px;">
                                        @endif
                                    </td>

                                    <td>
                                        @if(@$val->correct_answer=='answer_1')
                                            Answer 1
                                        @elseif(@$val->correct_answer=='answer_2')
                                            Answer 2
                                        @elseif(@$val->correct_answer=='answer_3')
                                            Answer 3
                                        @elseif(@$val->correct_answer=='answer_4')
                                            Answer 4
                                        @endif
                                    </td>
                                    
                                    <td>
                                        <a href="{{route('view.question',[$val->id])}}"><i class="fas fa-eye" title="View"></i></a>

                                        <a href="{{route('edit.question',[$val->exam_master_id,$val->id])}}"><i class=" fas fa-edit" title="Edit"></i></a>

                                        <a href="{{route('delete.question',[$val->id])}}" onclick="return confirm('Do you want to delete this Question ?')"><i class=" fas fa-trash" title="Delete"></i></a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Version</th>
                                    <th>Question</th>
                                    <th>Answer 1</th>
                                    <th>Answer 2</th>
                                    <th>Answer 3</th>
                                    <th>Answer 4</th>
                                    <th>Answer</th>
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
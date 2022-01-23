@extends('admin.layouts.app')
@section('title')
Question Details
@endsection
@section('links')
@include('admin.includes.links')
<style type="text/css">
    img{
        height: 100px;
        width: 200px;
    }
</style>
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
                <h2 class="pageheader-title">Question Details</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('manage.exam')}}" class="breadcrumb-link">Manage Exam</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Question Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Question Details{{-- <a class="adbtn btn btn-primary" href="{{route('view.exam',[$question->exam_skill_master_id])}}"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a> --}}</h5>
                <div class="card-body">
                    <div class="manager-dtls dtls-div">
                        <div class="row fld">
                            <div class="col-md-12">


                                    <p>
                                        <span class="titel-span">Version</span> 
                                        <span class="deta-span">
                                            <strong>:</strong> 
                                            
                                            {{ @$question->qs_version }}
                                            
                                        </span> 
                                    </p>

                                    <p>
                                        <span class="titel-span">Uddipok</span> 
                                        <span class="deta-span">
                                            <strong>:</strong> 
                                            
                                            @if($question->question)
                                                {{ @$question->uddipok }}
                                            @else
                                                <img src="{{asset('storage/app/question/'.@$question->uddipok_image)}}">
                                            @endif
                                            
                                        </span> 
                                    </p>

                                    <p>
                                        <span class="titel-span">Question</span> 
                                        <span class="deta-span">
                                            <strong>:</strong> 
                                            @if($question->question)
                                                {{ @$question->question }}
                                            @else
                                                <img src="{{asset('storage/app/question/'.@$question->question_image)}}">
                                            @endif
                                        </span> 
                                    </p>

                                    <p>
                                        <span class="titel-span">Asnwer 1</span> 
                                        <span class="deta-span">
                                            <strong>:</strong> 

                                            @if($question->answer_1)
                                                {{ @$question->answer_1 }}
                                            @else
                                                <img src="{{asset('storage/app/question/'.@$question->answer_1_image)}}">
                                            @endif

                                        </span> 
                                    </p>



                                    <p>
                                        <span class="titel-span">Asnwer 2</span> 
                                        <span class="deta-span">
                                            <strong>:</strong> 

                                            @if($question->answer_2)
                                                {{ @$question->answer_2 }}
                                            @else
                                                <img src="{{asset('storage/app/question/'.@$question->answer_2_image)}}">
                                            @endif

                                    </p>


                                    <p>
                                        <span class="titel-span">Asnwer 3</span> 
                                        <span class="deta-span">
                                            <strong>:</strong> 

                                            @if($question->answer_3)
                                                {{ @$question->answer_3 }}
                                            @else
                                                <img src="{{asset('storage/app/question/'.@$question->answer_3_image)}}">
                                            @endif

                                        </span>
                                    </p>

                                    <p>
                                        <span class="titel-span">Asnwer 4</span> 
                                        <span class="deta-span">
                                            <strong>:</strong> 

                                            @if($question->answer_4)
                                                {{ @$question->answer_4 }}
                                            @else
                                                <img src="{{asset('storage/app/question/'.@$question->answer_4_image)}}">
                                            @endif

                                        </span> 
                                    </p>

                                    <p>
                                        <span class="titel-span">Correct Description</span> 
                                        <span class="deta-span">
                                            <strong>:</strong> 

                                            @if($question->cor_des)
                                                {{ @$question->cor_des }}
                                            @else
                                                <img src="{{asset('storage/app/question/'.@$question->cor_des_image)}}">
                                            @endif

                                        </span> 
                                    </p>
                                

                                <p><span class="titel-span">Correct Answer</span> <span class="deta-span"><strong>:</strong> 
                                        @if(@$question->correct_answer=='answer_1')
                                            Asnwer 1
                                        @elseif(@$question->correct_answer=='answer_2')
                                            Asnwer 2
                                        @elseif(@$question->correct_answer=='answer_3')
                                            Asnwer 3
                                        @elseif(@$question->correct_answer=='answer_4')
                                            Asnwer 4
                                        @elseif(@$question->correct_answer=='answer_5')
                                            Asnwer 5
                                        @endif
                                </span> </p>
                                
                            </div>
                        </div>
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
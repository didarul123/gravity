@extends('layouts.app')
@section('links')
@include('include.links')
<style type="text/css">
    .table .thead-dark th {
        color: #fff;
        background-color: #be01fc;
        border-color: blueviolet;
    }
    .genric-btn{
        float: right;
        margin-top: -10px;
        background: #ff9f67 !important;
        font-weight: bolder;
    }
    .genric-btn:hover{
        color: #000!important;
        font-weight: bolder;
    }
    .section-padding {
        padding-top: 20px!important;
    }
</style>
@endsection
@section('header')
@include('include.header')
@endsection
@section('body')
<main>
    <section class="slider-area ">
        <div class="slider-active">
            <div class="single-slider slider-height4 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="ed_detail_wrap light">
                                <div class="ed_header_caption">
                                    <h2 class="ed_title">Merit List</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="blog_area single-post-area section-padding">
        <div class="container">
            <div class="row">
                {{-- @include('include.sidebar') --}}
                <div class="col-lg-12">
                    @include('include.message')
                    <a href="{{route("select.exam")}}" class="genric-btn danger">Back</a>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Student Name</th>
                                <th scope="col">Exam Name</th>
                                <th scope="col">Exam Date</th>
                                <th scope="col">Total Questions</th>
                                <th scope="col">Correct Questions</th>
                                {{-- <th scope="col">Score</th> --}}
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($merit as $val)
                                <tr>
                                    <td>{{@$val->getUser->name}}</td>
                                    <td>{{@$val->getExamMaster->exam_name}}</td>
                                    <td>{{date("d-m-Y",strtotime(@$val->getExamMaster->exam_date_time))}}</td>
                                    <td>{{@$val->getExamMaster->total_questions}}</td>
                                    <td>{{$val->correct_answer}}</td>
                                    {{-- <td>{{$val->correct_answer}}</td> --}}
                                    <td><a href="{{route('score.card',$val->id)}}" class="link">Score Card</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
@section('scripts')
@include('include.scripts')
@endsection
@section('footer')
@include('include.footer')
@endsection
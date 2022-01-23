@extends('layouts.app')
@section('links')
@include('include.links')
<style type="text/css">
    .table .thead-dark th {
        color: #fff;
        background-color: #be01fc;
        border-color: blueviolet;
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
                                    <h2 class="ed_title">Exams</h2>
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
                @include('include.sidebar')
                <div class="col-lg-8">
                    @include('include.message')
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Exam Name</th>
                                <th scope="col">Exam date</th>
                                <th scope="col">Total Questions</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($exam as $val)
                                @php
                                    $flg=0;
                                    $endTime = strtotime("+".$val->duration_in_minute ."minutes", strtotime($val->exam_date_time));
                                    $endTime = date('Y-m-d H:i:s', $endTime);
                                    if(date("Y-m-d H:i")>$endTime){
                                        $flg=1;
                                    }
                                @endphp


                                <tr>
                                    <td>{{@$val->exam_name}}</td>
                                    <td>{{date("d-m-Y h:i A",strtotime(@$val->exam_date_time))}}</td>
                                    <td>{{@$val->total_questions}}</td>
                                    <td>
                                        @if($flg==1)
                                            <a href="{{route('merit.list',$val->id)}}" title="Exam Merit List." class="link">Merit List</a>
                                        @elseif(date("Y-m-d H:i")>=date("Y-m-d H:i",strtotime(($val->exam_date_time))))
                                            <a href="{{route('exam',$val->id)}}" class="link">Start Exam</a>
                                        @else
                                            -
                                        @endif
                                    </td>
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
@extends('layouts.app')
@section('links')
@include('include.links')
<style type="text/css">
    .properties__img img{
        height: 250px;
    }
    .act_class{
        color: #38a4ff !important;
        border-color: #38a4ff !important;
        background: #fff !important;
        border: 1px solid !important;
    }
</style>
@endsection
@section('header')
@include('include.header')
@endsection
@section('body')
<main>
    <section class="pricing pb-100 pt-100">
        <div class="container">
        </div>
    </section>
    <div class="courses-area section-padding40 fix">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-tittle text-center mb-55">
                        <h2>Our featured courses</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="tab_b">
                    <a href="{{route('course')}}" class="genric-btn info radius {{@request()->segment(2)==null ? 'act_class':''}}">All</a>
                    @foreach($course as $val)
                        <a href="{{route('course',@$val->id)}}" class="genric-btn info radius {{@request()->segment(2)==@$val->id ? 'act_class':''}}">{{@$val->name}}</a>
                    @endforeach
                </div>
            </div>
            <div class="row">
                @if(count($course_list)==0)
                    <h1 style="margin-left: 35%;">No Course avilable this class.</h1>
                @else
                    @foreach($course_list as $val)
                        <div class="col-lg-4">
                            <div class="properties properties2 mb-30">
                                <div class="properties__card">
                                    <h5 class="card-title text-muted text-uppercase text-center"></h5>
                                    <div class="properties__img overlay1">
                                        <a href="{{route('course.details',[$val->id])}}">
                                            @if(@$val->image)
                                                <img src="{{asset('storage/app/course/'.@$val->image)}}">
                                            @else
                                                <img src="{{asset('public/noimg.png')}}">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="properties__caption">
                                        <p>{{date('d-m-Y', strtotime(@$val->from_date))}} To {{date('d-m-Y', strtotime(@$val->to_date))}}</p>
                                        <h3><a href="{{route('course.details',[$val->id])}}">{{@$val->name}}</a></h3>
                                        <div class="properties__footer d-flex justify-content-between align-items-center">
                                            {{-- <div class="restaurant-name">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half"></i>
                                                </div>
                                                <p><span>(4.5)</span> based on 120</p>
                                            </div> --}}
                                            <div class="price">
                                                <span>{{@$val->price}}Tk</span>
                                            </div>
                                        </div>
                                        <a href="{{route('enroll.student',$val->id)}}" class="border-btn border-btn2">Enroll Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
        </div>
    </div>
</div>
</main>
@endsection
@section('scripts')
@include('include.scripts')
@endsection
@section('footer')
@include('include.footer')
@endsection
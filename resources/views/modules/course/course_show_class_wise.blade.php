@extends('layouts.app')
@section('links')
@include('include.links')
@endsection
@section('header')
@include('include.header')
@endsection
@section('body')
<main>
    <section class="pricing pb-100 pt-100">
        <div class="container">
            {{-- <header class="section-header">
                <h3>Our Programmes</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
            </header>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="card mb-5 mb-lg-0">
                        <div class="card-body">
                            <h5 class="card-title text-muted text-uppercase text-center">After HSC Board Exam</h5>
                            <h6 class="card-price text-center">Admisson</h6>
                            <hr>
                            <ul class="fa-ul">
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Live Class</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Live Exam</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Live Model Test</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Practice Exam</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Pdf notes</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Study Meterials</li>
                            </ul>
                            <a href="javascript:;" class="btn btn-block btn-primary text-uppercase">Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="card mb-5 mb-lg-0">
                        <div class="card-body">
                            <h5 class="card-title text-muted text-uppercase text-center"> HSC  ! SSC ! JSC</h5>
                            <h6 class="card-price text-center">Model Test</h6>
                            <hr>
                            <ul class="fa-ul">
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Live Class</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Live Exam</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Live Model Test</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Practice Exam</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Pdf notes</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Study Meterials</li>
                            </ul>
                            <a href="javascript:;" class="btn btn-block btn-primary text-uppercase">Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="card mb-5 mb-lg-0">
                        <div class="card-body">
                            <h5 class="card-title text-muted text-uppercase text-center"> HSC  ! SSC ! JSC</h5>
                            <h6 class="card-price text-center">Academic</h6>
                            <hr>
                            <ul class="fa-ul">
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Live Class</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Live Exam</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Live Model Test</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Practice Exam</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Pdf notes</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Study Meterials</li>
                            </ul>
                            <a href="javascript:;" class="btn btn-block btn-primary text-uppercase">Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="card mb-5 mb-lg-0">
                        <div class="card-body">
                            <h5 class="card-title text-muted text-uppercase text-center"> HSC  ! SSC ! JSC</h5>
                            <h6 class="card-price text-center">Talent Hunt</h6>
                            <hr>
                            <ul class="fa-ul">
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Live Class</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Live Exam</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Live Model Test</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Practice Exam</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Pdf notes</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Study Meterials</li>
                            </ul>
                            <a href="javascript:;" class="btn btn-block btn-primary text-uppercase">Details</a>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
    <div class="courses-area section-padding40 fix">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-tittle text-center mb-55">
                        <h2>Our Courses</h2>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="tab_b">
                    @foreach($course as $val)
                    <a href="{{route('course.details',[$val->id])}}" class="genric-btn info radius">{{@$val->name}}</a>
                    @endforeach
                    <a href="javascript:;" class="genric-btn info radius">Others</a>
                </div>
            </div> --}}
            <div class="row">
                @foreach($class_wise as $val)
                <div class="col-lg-4">
                    <div class="properties properties2 mb-30">
                        <div class="properties__card">
                            <h5 class="card-title text-muted text-uppercase text-center"> HSC  ! SSC ! JSC</h5>
                            <div class="properties__img overlay1">
                                @if(@$val->image)
                                <a href="{{route('course.details',[$val->id])}}"><img src="{{asset('storage/app/course/'.@$val->image)}}"></a>
                                @else
                                <img src="{{asset('public/noimg.png')}}">
                                @endif
                            </div>
                            <div class="properties__caption">
                                <p>{{date('d-m-Y', strtotime(@$val->from_date))}} To {{date('d-m-Y', strtotime(@$val->to_date))}}</p>
                                <h3><a href="{{route('course.details',[$val->id])}}">{{@$val->name}}</a></h3>
                                <div class="properties__footer d-flex justify-content-between align-items-center">
                                    <div class="restaurant-name">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half"></i>
                                        </div>
                                        <p><span>(4.5)</span> based on 120</p>
                                    </div>
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
        </div>
        {{-- <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8">
                <div class="section-tittle text-center mt-40">
                    <a href="javascript:;" class="border-btn">Load More</a>
                </div>
            </div>
        </div> --}}
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
@extends('layouts.app')

@section('links')
@include('include.links')
@endsection
@section('header')
@include('include.header')
@endsection
@section('body')

<main>
    <!--? slider Area Start-->


    <section class="slider-area ">
        <div class="slider-active">
            <!-- Single Slider -->

            @foreach($sliders as $slider)
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-7 col-md-12">
                            <div class="hero__caption py-3">
                                @include('include.message')

                                <h1 data-animation="fadeInLeft" data-delay="0.2s">{{$slider->title}}</h1>
                                <p data-animation="fadeInLeft" data-delay="0.4s">{{$slider->description}}</p>@guest
                                <a href="{{route('register')}}" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.7s">Join for Free</a>
                                @endguest
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-5 col-md-12">
                            <div class="b_img d-none d-lg-block">
                                <img src="{{asset('storage/app/slider/'.@$slider->image)}}" style="max-width: 400px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!-- ? services-area -->
    <div class="services-area">
        <div class="container">
            <header class="section-header">
                <h3 class="bblack">{{$notice_board_title->title ?? ''}}</h3>
                <p class="bblack">{{$notice_board_title->description ?? ''}}</p>
            </header>
            <div class="row justify-content-sm-center">
                @foreach($notice as $val)
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services mb-30">
                        <div class="bb">
                            <div class="features-icon">
                                <img src="{{asset('public/assets/img/icon/icon3.svg')}}" alt="">
                            </div>
                            <div class="features-caption">
                                <h3>{{@$val->title}}</h3>
                                <p class="text-justify">{{@$val->description}}</p>
                                <div class="times_bb">
                                    {{-- <div class="ddate"><i class="fa fa-calendar" aria-hidden="true"></i> {{date('d-m-Y', strtotime(@$val->created_at))}}
                                </div> --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            {{-- <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="single-services mb-30">
                            <div class="features-icon">
                                <img src="{{asset('public/assets/img/icon/icon3.svg')}}" alt="">
        </div>
        <div class="features-caption">
            <h3>Expert instructors</h3>
            <p>The automated process all your website tasks. The automated process all your website tasks.</p>
        </div>
        <div class="times_bb">
            <div class="ddate"><i class="fa fa-calendar" aria-hidden="true"></i> 23 march,2020</div>
            <div class="read_mm">Read More >></div>


        </div>
    </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-8">
        <div class="single-services mb-30">
            <div class="features-icon">
                <img src="{{asset('public/assets/img/icon/icon3.svg')}}" alt="">
            </div>
            <div class="features-caption">
                <h3>Life time access</h3>
                <p>The automated process all your website tasks. The automated process all your website tasks.</p>
                <div class="times_bb">
                    <div class="ddate"><i class="fa fa-calendar" aria-hidden="true"></i> 23 march,2020</div>
                    <div class="read_mm">Read More >></div>


                </div>
            </div>
        </div>
    </div> --}}
    </div>
    </div>
    </div>




    <!-- ======= Facts Section ======= -->
    <section id="facts">
        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h3>{{$fact->title ?? ''}}</h3>
                <p>{{$fact->description ?? ''}}</p>
            </header>

            <div class="row counters">

                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">{{@$fact->teachers ?? 0}}</span>
                    <p>teacher</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">{{@$fact->branch_managers ?? 0}}</span>
                    <p>Branch Manager</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">{{@$fact->students ?? 0}}</span>
                    <p>Student</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">{{@$fact->courses ?? 0}}</span>
                    <p>Courses</p>
                </div>

            </div>

            <div class="facts-img">
                <img src="{{asset('public/assets/img/facts-img.png')}}" alt="" class="img-fluid">
            </div>

        </div>
    </section><!-- End Facts Section -->


    <div class="services-area">
        <div class="container">
            <header class="section-header">
                <h3 class="bblack">Publication</h3>
                <p class="bblack">Latest Publication </p>
            </header>
            <div class="row justify-content-sm-center">
                @foreach($publ as $val)
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services mb-30">
                        <div class="bb">

                            <div class="features-caption">
                                <h3>{{@$val->title}}</h3>
                                <p>{{@$val->description}} </p>
                                <div class="times_bb">


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <section class="pricing pb-100 pt-100">
        <div class="container">
            <header class="section-header">
                <h3>Our Programmes</h3>
                <p></p>
            </header>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="card mb-5 mb-lg-0">
                        <div class="card-body">
                            <h5 class="card-title text-muted text-uppercase text-center"></h5>
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
                            <a href="{{route('course')}}" class="btn btn-block btn-primary text-uppercase">Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="card mb-5 mb-lg-0">
                        <div class="card-body">
                            <h5 class="card-title text-muted text-uppercase text-center"></h5>
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
                            <a href="{{route('course')}}" class="btn btn-block btn-primary text-uppercase">Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="card mb-5 mb-lg-0">
                        <div class="card-body">
                            <h5 class="card-title text-muted text-uppercase text-center"></h5>
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
                            <a href="{{route('course')}}" class="btn btn-block btn-primary text-uppercase">Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="card mb-5 mb-lg-0">
                        <div class="card-body">
                            <h5 class="card-title text-muted text-uppercase text-center"></h5>
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
                            <a href="{{route('course')}}" class="btn btn-block btn-primary text-uppercase">Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section class="courses-area section-padding40 fix">
        <div class="container">
            <header class="section-header">
                <h3 class="bblack">Popular course in this month</h3>
                <p></p>
            </header>
            <div class="row">
                @foreach($course as $val)
                <div class="col-sm-12 col-lg-4 col-md-4">

                    <div class="properties pb-40">
                        <div class="properties__card">
                            <h5 class="card-title text-muted text-uppercase text-center"></h5>
                            <div class="properties__img overlay1">
                                @if(@$val->image)
                                <a href="{{route('course.details',[$val->id])}}">
                                    <img src="{{asset('storage/app/course/'.@$val->image)}}" style="object-fit: cover; height: 190px;"></a>
                                @else
                                <img src="{{asset('public/noimg.png')}}" style="object-fit: cover; height: 190px;">
                                @endif
                            </div>
                            <div class="properties__caption">
                                <p>{{date('d-m-Y', strtotime(@$val->from_date))}} To {{date('d-m-Y', strtotime(@$val->to_date))}}</p>
                                <h3><a href="{{route('course.details',[$val->id])}}">{{@$val->name}}</a></h3>
                                {{-- <p>{{@$val->description}}

                                </p> --}}
                                <div class="properties__footer d-flex justify-content-between align-items-center">
                                    <div class="restaurant-name">
                                        <div class="rating">
                                            Admission Open
                                        </div>
                                        <p><span><i class="fa fa-calendar" aria-hidden="true"></i></span> {{date('d-m-Y', strtotime(@$val->from_date))}}</p>
                                    </div>
                                    <div class="price">
                                        <span>{{@$val->price}}Tk</span>
                                    </div>
                                </div>
                                <a href="{{route('enroll.student',@$val->id)}}" class="border-btn border-btn2">Enroll Now</a>
                            </div>

                        </div>
                    </div>

                </div>
                @endforeach


                <div class="col-sm-12 col-lg-12 col-md-12">
                    <div class="max-600"><a href="{{route('course')}}" class="border-btn border-btn1">More Courses</a></div>
                </div>


            </div>




        </div>



    </section>

    {{-- <section>
        
        
        
        <div class="site-section mb-40 mt-40">
<div class="container">
<div class="row mb-5 justify-content-center text-center">
<div class="col-lg-4 mb-5">
  <header class="section-header">
          <h3 class="bblack">Why are in medical Industry</h3>
          <p></p>
        </header>
</div>
</div>
<div class="row">

<div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
<div class="feature-1 border">
<div class="icon-wrapper bg-primary">
<span><img src="{{asset('public/assets/img/gallery/111.png')}}"></span>
    </div>
    <div class="feature-1-content">
        <h2>Unique Exam System</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit morbi hendrerit elit</p>
        <p><a href="#" class="btn btn-primary px-4 rounded-0">Learn More</a></p>
    </div>
    </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
        <div class="feature-1 border">
            <div class="icon-wrapper bg-primary">
                <span><img src="{{asset('public/assets/img/gallery/112.png')}}"></span>
            </div>
            <div class="feature-1-content">
                <h2>Trusted Courses</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit morbi hendrerit elit</p>
                <p><a href="#" class="btn btn-primary px-4 rounded-0">Learn More</a></p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
        <div class="feature-1 border">
            <div class="icon-wrapper bg-primary">
                <span><img src="{{asset('public/assets/img/gallery/113.png')}}"></span>
            </div>
            <div class="feature-1-content">
                <h2>Expert Teachers</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit morbi hendrerit elit</p>
                <p><a href="#" class="btn btn-primary px-4 rounded-0">Learn More</a></p>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
        <div class="feature-1 border">
            <div class="icon-wrapper bg-primary">
                <span><img src="{{asset('public/assets/img/111.png')}}"></span>
            </div>
            <div class="feature-1-content">
                <h2>24x7 Support</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit morbi hendrerit elit</p>
                <p><a href="#" class="btn btn-primary px-4 rounded-0">Learn More</a></p>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>




    </section>
    --}}

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-padding40 fix mt-40 mb-40">
        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h3>Frequently Asked Question</h3>
                <p></p>
            </header>
            <ul class="faq-list" data-aos="fade-up">
                @foreach($faq as $val)
                <li>
                    <a data-toggle="collapse" href="#faq{{@$val->id}}" class="collapsed"><b>{{@$val->question}}</b> <i class="fa fa-caret-down icon-show" aria-hidden="true"></i><i class="fa fa-times icon-close"></i></a>
                    <div id="faq{{@$val->id}}" class="collapse" data-parent=".faq-list">
                        <p style="font-size: 13px;">
                            {{@$val->answer}}
                        </p>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </section><!-- End Frequently Asked Questions Section -->


    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg pb-40">
        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h3 class="bblack">Testimonials</h3>
                <p></p>
            </header>

            <div class="owl-carousel testimonials-carousel">

                @foreach($testimonials as $val)
                <div class="testimonial-item">
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        {{@$val->description}}
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    @if(@$val->image)
                    <img src="{{asset('storage/app/testimonial/'.@$val->image)}}" class="testimonial-img" alt="">
                    @else
                    <img src="{{asset('public/assets/img/testimonials/testimonials-1.jpg')}}" class="testimonial-img" alt="">
                    @endif

                    <h3>{{@$val->title}}</h3>
                    {{-- <h4>Ceo &amp; Founder</h4> --}}
                </div>
                @endforeach
            </div>

        </div>
    </section><!-- End Testimonials Section -->

</main>

@endsection
@section('scripts')
@include('include.scripts')
@endsection
@section('footer')
@include('include.footer')
@endsection
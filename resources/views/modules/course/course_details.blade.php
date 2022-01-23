@extends('layouts.app')
@section('links')
@include('include.links')
<style>
    .ed_detail_head {
        padding: 2rem;
    }
    .ed_detail_head.lg{
        padding:4rem;
    }
    .ed_detail_wrap {
        width: 100%;
        display: block;
        position: relative;
    }
    .ed_header_caption ul {
        padding: 0;
        margin: 15px 0 0;
    }
    .ed_header_caption ul li, .edu_inline_info li {
        display: inline-block;
        margin-right: 1.5rem;
        list-style: none;
        font-size: 19px;
        color: #fff;
    }
    .ed_header_caption ul li:last-child, .edu_inline_info li:last-child{
        margin-right: 0rem;
    }
    .ed_header_caption ul li i, .edu_inline_info li i{
        margin-right:7px;
    }
    .ed_header_caption {
        width: 100%;
        display: block;
        margin-top: 0.5rem;
        margin-bottom: 1rem;
    }
    div.menu {
        width: 100%;
        background: transparent;
        margin: 30px 0 30px;
    }
    .ed_title{
        font-size: 32px;
        color: #fff;
    }
    .ss a:nth-child(1){
        background:#ff7f01; 
        color: #eee;
    }
    .ss a:nth-child(2){
        background:#F1FAEE; 
        color: #222;
    }
    .ss a:nth-child(3){
        background: #A8DADC; 
        color: #222;
    }
    .ss a:nth-child(4){
        background: #457B9D;
        color: #eee;
    }
    .ss a:nth-child(5){
        background: #1D3557;  
        color: #eee;
    }
    .ss .cnt{
        background: transparent;
        width: 100%;
    }
    .pricess{
        float: left;
        font-size: 30px;
        color: #fff;
    }
    .enroll_b{
        float: right;
        font-size: 30px;
        color: #fff;
    }
    .floatR{
        float: right;
    }
    .Fs18{
        font-size: 18px;
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
            <div class="single-slider slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-9">
                            <div class="ed_detail_wrap light" style="margin-top: 80px;">
                                <div class="ed_header_caption">
                                    <h2 class="ed_title">{{@$course->name}}</h2>
                                    <div class="clearfix"></div>
                                    <ul class="mt-20">
                                        <li class="d-block mb-3"><i class="ti-calendar"></i>Start Date : {{date('d-m-Y', strtotime(@$course->from_date))}}</li>
                                        <!-- <li><i class="ti-control-forward"></i>102 Lectures</li> -->
                                        <li class="d-block mb-3"><i class="ti-calendar"></i>End Date : {{date('d-m-Y', strtotime(@$course->to_date))}}</li>
                                    </ul>
                                    <a href="{{route('enroll.student',@$course->id)}}" class="genric-btn danger Fs18 mt-40 rounded">Enrollment Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="courses-details mb-5">
        <div class="container">
            <div class="row flex-row-reverse ss" style="transform: translateY(-74px);">
                <div class="menu text-left">
                    <a  class="showSingle shadow-none" target="3">Overview</a>
                    {{-- <a  class="showSingle" target="4">Meterials</a> --}}
                </div>
                <section class="cnt">
                    <div id="div3" class="targetDiv active">
                        <div class="row">
                            <!-- <div class="col-md-3">
                                @if(@$course->image)
                                <img src="{{asset('storage/app/course/'.@$course->image)}}" class="img-fluid">
                                @else
                                <img src="{{asset('public/noimg.png')}}">
                                @endif
                            </div> -->
                            <div class="col-md-12 mt-sm-20">
                                <p>
                                    {!! @$course->description !!}
                                </p>
                                @foreach($course_routines as $course_routine)
                                <h2><strong><a href="{{asset('storage/app/routine/'.@$course_routine->pdf)}}" target="_blank">Click Here</a> to Download {{$course_routine->title}}</strong></h2>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                 
                </section>
            </div>
        </div>
    </section>
    {{-- <section id="faq" class="faq section-padding40 fix mt-40 mb-40">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h3>Frequently Asked Question</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
            </header>
            <ul class="faq-list" data-aos="fade-up">
                <li>
                    <a data-toggle="collapse" class="collapsed" href="#faq1">Non consectetur a erat nam at lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
                    <div id="faq1" class="collapse" data-parent=".faq-list">
                        <p>
                            Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                        </p>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#faq2" class="collapsed">Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?  <i class="fa fa-caret-down icon-show" aria-hidden="true"></i><i class="fa fa-times icon-close"></i></a>
                    <div id="faq2" class="collapse" data-parent=".faq-list">
                        <p>
                            Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                        </p>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#faq3" class="collapsed">Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi?  <i class="fa fa-caret-down icon-show" aria-hidden="true"></i><i class="fa fa-times icon-close"></i></a>
                    <div id="faq3" class="collapse" data-parent=".faq-list">
                        <p>
                            Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                        </p>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#faq4" class="collapsed">Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla? <i class="fa fa-caret-down icon-show" aria-hidden="true"></i><i class="fa fa-times icon-close"></i></a>
                    <div id="faq4" class="collapse" data-parent=".faq-list">
                        <p>
                            Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                        </p>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#faq5" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="fa fa-caret-down icon-show" aria-hidden="true"></i><i class="fa fa-times icon-close"></i></a>
                    <div id="faq5" class="collapse" data-parent=".faq-list">
                        <p>
                            Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                        </p>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#faq6" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor?  <i class="fa fa-caret-down icon-show" aria-hidden="true"></i><i class="fa fa-times icon-close"></i></a>
                    <div id="faq6" class="collapse" data-parent=".faq-list">
                        <p>
                            Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
                        </p>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <section id="testimonials" class="testimonials section-bg pb-40">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h3 class="bblack">Testimonials</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
            </header>
            <div class="owl-carousel testimonials-carousel">
                <div class="testimonial-item">
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                    <h3>Saul Goodman</h3>
                    <h4>Ceo &amp; Founder</h4>
                </div>
                <div class="testimonial-item">
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                    <h3>Sara Wilsson</h3>
                    <h4>Designer</h4>
                </div>
                <div class="testimonial-item">
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                    <h3>Jena Karlis</h3>
                    <h4>Store Owner</h4>
                </div>
                <div class="testimonial-item">
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                    <h3>Matt Brandon</h3>
                    <h4>Freelancer</h4>
                </div>
                <div class="testimonial-item">
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                    <h3>John Larson</h3>
                    <h4>Entrepreneur</h4>
                </div>
            </div>
        </div>
    </section> --}}
</main>
@endsection
@section('header')
@include('include.header')
@endsection
@section('body')
@endsection
@section('scripts')
@include('include.scripts')
<script>
    jQuery(function(){
             jQuery('#showall').click(function(){
                   jQuery('.targetDiv').show();
            });
            jQuery('.showSingle').click(function(){
                  jQuery('.targetDiv').hide();
                  jQuery('#div'+$(this).attr('target')).show();
            });
    });
</script>
@endsection
@section('footer')
@include('include.footer')
@endsection
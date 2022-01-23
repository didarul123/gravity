{{-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
 --}}


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
                <div class="single-slider slider-height d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-7 col-md-12">
                                <div class="hero__caption">
                                    <h1 data-animation="fadeInLeft" data-delay="0.2s">Online learning<br> platform</h1>
                                    <p data-animation="fadeInLeft" data-delay="0.4s">Build skills with courses, certificates, and degrees online from world-class universities and companies </p>
                                    <a href="#" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.7s">Join for Free</a>
                                </div>
                            </div>
                             <div class="col-xl-6 col-lg-5 col-md-12">
                                <div class="b_img">
                                
                                <img src="{{asset('public/assets/img/hero/22.png')}}"></div></div>
                        </div>
                    </div>          
                </div>
                
                        <div class="single-slider slider-height d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-7 col-md-6">
                                <div class="hero__caption">
                                    <h1 data-animation="fadeInLeft" data-delay="0.2s">Online learning<br> platform</h1>
                                    <p data-animation="fadeInLeft" data-delay="0.4s">Build skills with courses, certificates, and degrees online from world-class universities and companies</p>
                                    <a href="#" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.7s">Join for Free</a>
                                </div>
                            </div>
                            
                            <div class="col-xl-6 col-lg-5 col-md-12">
                                <div class="b_img">
                                
                                <img src="{{asset('public/assets/img/hero/11.png')}}"></div></div>
                        </div>
                    </div>          
                </div>
            </div>
        </section>
        <!-- ? services-area -->
        <div class="services-area">
            <div class="container">
                <header class="section-header">
          <h3 class="bblack">Notice Board</h3>
          <p class="bblack">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </header>
                <div class="row justify-content-sm-center">
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="single-services mb-30">
                            <div class="bb">
                            <div class="features-icon">
                              <img src="{{asset('public/assets/img/icon/icon3.svg')}}" alt="">
                            </div>
                            <div class="features-caption">
                                <h3>60+ UX courses</h3>
                                <p>The automated process all your website tasks. The automated process all your website tasks.</p>
                                 <div class="times_bb"><div class="ddate"><i class="fa fa-calendar" aria-hidden="true"></i> 23 march,2020</div>
                            <div class="read_mm">Read More >></div>
                            
                            
                            </div>
                            </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="single-services mb-30">
                            <div class="features-icon">
                                <img src="{{asset('public/assets/img/icon/icon3.svg')}}" alt="">
                            </div>
                            <div class="features-caption">
                                <h3>Expert instructors</h3>
                                <p>The automated process all your website tasks. The automated process all your website tasks.</p>
                            </div>
                            <div class="times_bb"><div class="ddate"><i class="fa fa-calendar" aria-hidden="true"></i> 23 march,2020</div>
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
                                 <div class="times_bb"><div class="ddate"><i class="fa fa-calendar" aria-hidden="true"></i> 23 march,2020</div>
                            <div class="read_mm">Read More >></div>
                            
                            
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        
          <!-- ======= Facts Section ======= -->
    <section id="facts">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>Facts</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </header>

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">274</span>
            <p>teacher</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">421</span>
            <p>Student</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">1,364</span>
            <p>Hours Of Support</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">18</span>
            <p>Courses</p>
          </div>

        </div>

        <div class="facts-img">
          <img src="{{asset('public/assets/img/facts-img.png')}}" alt="" class="img-fluid">
        </div>

      </div>
    </section><!-- End Facts Section -->  
        
        
        
        
        
        
        
        
        
        
     
   <section class="courses-area section-padding40 fix">
       <div class="container">
           <header class="section-header">
          <h3 class="bblack">Popular course in this month</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </header>
           <div class="row">
           <div class="col-sm-12 col-lg-4 col-md-4">
               
          <div class="properties pb-40">
                        <div class="properties__card">
                            <div class="properties__img overlay1">
                                <a href="#"><img src="{{asset('public/assets/img/gallery/featured2.png')}}" alt=""></a>
                            </div>
                            <div class="properties__caption">
                                <p>04 Jul, 20 - 06 Aug, 20</p>
                                <h3><a href="#">Engineering Preparation + HSC Revision 2020</a></h3>
                                <p>The automated process all your website tasks. Discover tools and techniques to engage effectively with vulnerable children and young people.

                                </p>
                                <div class="properties__footer d-flex justify-content-between align-items-center">
                                    <div class="restaurant-name">
                                        <div class="rating">
                                           Admission Open
                                        </div>
                                        <p><span><i class="fa fa-calendar" aria-hidden="true"></i></span> 23 march,2020</p>
                                    </div>
                                    <div class="price">
                                        <span>$135</span>
                                    </div>
                                </div>
                                <a href="#" class="border-btn border-btn2">Enroll Mow</a>
                            </div>

                        </div>
                    </div>
               
               </div>
               <div class="col-sm-12 col-lg-4 col-md-4">
               
          <div class="properties pb-40">
                        <div class="properties__card">
                            <div class="properties__img overlay1">
                                <a href="#"><img src="{{asset('public/assets/img/gallery/featured1.png')}}" alt=""></a>
                            </div>
                            <div class="properties__caption">
                                <p>04 Jul, 20 - 06 Aug, 20</p>
                                <h3><a href="#">Varsity ‘KA’ Preparation + HSC Revision 2020</a></h3>
                                <p>The automated process all your website tasks. Discover tools and techniques to engage effectively with vulnerable children and young people.

                                </p>
                                <div class="properties__footer d-flex justify-content-between align-items-center">
                                    <div class="restaurant-name">
                                        <div class="rating">
                                           Admission Open
                                        </div>
                                        <p><span><i class="fa fa-calendar" aria-hidden="true"></i></span> 23 march,2020</p>
                                    </div>
                                    <div class="price">
                                        <span>$135</span>
                                    </div>
                                </div>
                                <a href="#" class="border-btn border-btn2">Enroll Mow</a>
                            </div>

                        </div>
                    </div>
               
               </div>
           
               <div class="col-sm-12 col-lg-4 col-md-4">
               
          <div class="properties pb-40">
                        <div class="properties__card">
                            <div class="properties__img overlay1">
                                <a href="#"><img src="{{asset('public/assets/img/gallery/featured3.png')}}" alt=""></a>
                            </div>
                            <div class="properties__caption">
                                <p>04 Jul, 20 - 06 Aug, 20</p>
                                <h3><a href="#">class 8 science<br> care 2020</a></h3>
                                <p>The automated process all your website tasks. Discover tools and techniques to engage effectively with vulnerable children and young people.

                                </p>
                                 <div class="properties__footer d-flex justify-content-between align-items-center">
                                    <div class="restaurant-name">
                                        <div class="rating">
                                           Admission Open
                                        </div>
                                        <p><span><i class="fa fa-calendar" aria-hidden="true"></i></span> 23 march,2020</p>
                                    </div>
                                    <div class="price">
                                        <span>$135</span>
                                    </div>
                                </div>
                                <a href="#" class="border-btn border-btn2">Enroll Mow</a>
                            </div>

                        </div>
                    </div>
               
               </div>
               
               
                <div class="col-sm-12 col-lg-4 col-md-4">
               
          <div class="properties pb-40">
                        <div class="properties__card">
                            <div class="properties__img overlay1">
                                <a href="#"><img src="{{asset('public/assets/img/gallery/featured4.png')}}" alt=""></a>
                            </div>
                            <div class="properties__caption">
                                <p>04 Jul, 20 - 06 Aug, 20</p>
                                <h3><a href="#">Class 9 Academic <br>Program 2020</a></h3>
                                <p>The automated process all your website tasks. Discover tools and techniques to engage effectively with vulnerable children and young people.

                                </p>
                              <div class="properties__footer d-flex justify-content-between align-items-center">
                                    <div class="restaurant-name">
                                        <div class="rating">
                                           Admission Open
                                        </div>
                                        <p><span><i class="fa fa-calendar" aria-hidden="true"></i></span> 23 march,2020</p>
                                    </div>
                                    <div class="price">
                                        <span>$135</span>
                                    </div>
                                </div>
                                <a href="#" class="border-btn border-btn2">Enroll Mow</a>
                            </div>

                        </div>
                    </div>
               
               </div>
               <div class="col-sm-12 col-lg-4 col-md-4">
               
          <div class="properties pb-40">
                        <div class="properties__card">
                            <div class="properties__img overlay1">
                                <a href="#"><img src="{{asset('public/assets/img/gallery/featured6.png')}}" alt=""></a>
                            </div>
                            <div class="properties__caption">
                                <p>04 Jul, 20 - 06 Aug, 20</p>
                                <h3><a href="#">Class 10 Academic <br>Programme 2020</a></h3>
                                <p>The automated process all your website tasks. Discover tools and techniques to engage effectively with vulnerable children and young people.

                                </p>
                               <div class="properties__footer d-flex justify-content-between align-items-center">
                                    <div class="restaurant-name">
                                        <div class="rating">
                                           Admission Open
                                        </div>
                                        <p><span><i class="fa fa-calendar" aria-hidden="true"></i></span> 23 march,2020</p>
                                    </div>
                                    <div class="price">
                                        <span>$135</span>
                                    </div>
                                </div>
                                <a href="#" class="border-btn border-btn2">Enroll Mow</a>
                            </div>

                        </div>
                    </div>
               
               </div>
           
               <div class="col-sm-12 col-lg-4 col-md-4">
               
          <div class="properties pb-40">
                        <div class="properties__card">
                            <div class="properties__img overlay1">
                                <a href="#"><img src="{{asset('public/assets/img/gallery/featured5.png')}}" alt=""></a>
                            </div>
                            <div class="properties__caption">
                                <p>04 Jul, 20 - 06 Aug, 20</p>
                                <h3><a href="#">class 8 science<br> care 2020</a></h3>
                                <p>The automated process all your website tasks. Discover tools and techniques to engage effectively with vulnerable children and young people.

                                </p>
                              <div class="properties__footer d-flex justify-content-between align-items-center">
                                    <div class="restaurant-name">
                                        <div class="rating">
                                           Admission Open
                                        </div>
                                        <p><span><i class="fa fa-calendar" aria-hidden="true"></i></span> 23 march,2020</p>
                                    </div>
                                    <div class="price">
                                        <span>$135</span>
                                    </div>
                                </div>
                                <a href="#" class="border-btn border-btn2">Enroll Mow</a>
                            </div>

                        </div>
                    </div>
               
               </div>
               
               
               <div class="col-sm-12 col-lg-12 col-md-12"><div class="max-600"><a href="#" class="border-btn border-btn1">More Courses</a></div></div>
           
           
           </div>
       
       
       
       
       </div>
        
        
        
        </section>
 
    <section>
        
        
        
        <div class="site-section mb-40 mt-40">
<div class="container">
<div class="row mb-5 justify-content-center text-center">
<div class="col-lg-4 mb-5">
  <header class="section-header">
          <h3 class="bblack">Why are in medical Industry</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
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
    
    
    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-padding40 fix mt-40 mb-40">
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
    </section><!-- End Frequently Asked Questions Section --> 
        
        
           <!-- ======= Testimonials Section ======= -->
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
            <img src="{{asset('public/assets/img/testimonials/testimonials-1.jpg')}}" class="testimonial-img" alt="">
            <h3>Saul Goodman</h3>
            <h4>Ceo &amp; Founder</h4>
          </div>

          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="{{asset('public/assets/img/testimonials/testimonials-2.jpg')}}" class="testimonial-img" alt="">
            <h3>Sara Wilsson</h3>
            <h4>Designer</h4>
          </div>

          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="{{asset('public/assets/img/testimonials/testimonials-3.jpg')}}" class="testimonial-img" alt="">
            <h3>Jena Karlis</h3>
            <h4>Store Owner</h4>
          </div>

          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="{{asset('public/assets/img/testimonials/testimonials-4.jpg')}}" class="testimonial-img" alt="">
            <h3>Matt Brandon</h3>
            <h4>Freelancer</h4>
          </div>

          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="{{asset('public/assets/img/testimonials/testimonials-5.jpg')}}" class="testimonial-img" alt="">
            <h3>John Larson</h3>
            <h4>Entrepreneur</h4>
          </div>

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
 
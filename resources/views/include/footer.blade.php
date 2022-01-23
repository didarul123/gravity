<footer>
     <div class="footer-wrappper footer-bg">
        <!-- Footer Start-->
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-4 col-lg-5 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <!-- Logo -->
                                <div class="col-xl-2 col-lg-2" style="margin-left: -30px;margin-top: -20px;margin-bottom: 80px;">
                                    <div class="logo">
                                        <a href="{{route('home')}}"><img style="width: 251px;height: 60px;" src="{{asset('public/assets/img/logo/logo.png')}}" alt=""></a>
                                    </div>
                                </div>
                                <!-- social -->
                                <div class="footer-social">
                                    <a target="_blank" href="https://www.linkedin.com/in/gravity-education-220192205/"><i class="fa fa-linkedin"></i></a>
                                    <a target="_blank" href="https://www.facebook.com/gravityeduaction/"><i class="fab fa-facebook-f"></i></a>
                                    <a target="_blank" href="https://www.youtube.com/channel/UCajcaQZNSiVyRhnfcKeM3yw/"><i class="fa fa-youtube-play"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Online courses</h4>
                                <ul>
                                    <li><a href="{{route('home')}}">Home</a></li>
                                    @guest
                                    <li><a href="{{route('register')}}">Join</a></li>
                                    <li><a href="{{route('login')}}" >Login</a></li>
                                    @else
                                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                                    <li><a href="{{route('my.enroll')}}">My Enrollment</a></li>
                                    @endguest
                                    {{-- <li><a href="javascript:;">Programing</a></li>
                                    <li><a href="javascript:;">Architecture</a></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Support</h4>
                                <ul>
                                    <li><a href="{{route('contact.us')}}">Contact us</a></li>
                                    <li><a href="{{route('privacy.policy')}}">Privacy Policy</a></li>
                                    <li><a href="{{route('terms.conditions')}}">Terms And Conditions</a></li>
                                    {{-- <li><a href="javascript:;">Programing</a></li> --}}
                                    {{-- <li><a href="javascript:;">Architecture</a></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Study Meterials</h4>
                                <ul>
                                    <li><a href="{{route('course')}}">Course</a></li>
                                    <li><a href="{{route('routine')}}">Routine</a></li>
                                    @auth
                                    <li><a href="{{route('select.exam')}}" >Exam</a></li>
                                    @endauth
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom area -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex align-items-center">
                        <div class="col-xl-12 ">
                            <div class="footer-copy-right text-center">
                                <p>Copyright © 2015-2021 Gravity Education.All Rights Reserved</p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Footer End-->
      </div>
  </footer> 
  <!-- Scroll Up -->

  <!-- Scroll Up -->
  <div id="back-top" >
    <a title="Go to Top" href="javascript:;"> <i class="fas fa-level-up-alt"></i></a>
</div>
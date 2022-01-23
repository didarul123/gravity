@extends('layouts.app')

@section('title','Success')

@section('links')

@include('include.links')

<style type="text/css">

  /*.main-header{

    margin-top: -50px;

  }*/



 /* .parent-divddd { 

    margin-left: 60px;

}*/

  

</style>

@endsection

@section('header')

@include('include.header')

@endsection

@section('body') 

 <section class="login_main_section">

    <div class="container">

      <div class="container">

        <div class="">

           <div class="mesg-cls">

              {{-- <span class="img-span"><img width="100" src="{{asset('public/success.png')}}" alt=""></span> --}}

              <h2 class="thankyou">Success !!</h2>

              @if(Session::has('success'))

                 <div class="alert alert-success" role="alert">

                    <p style="font-family: 'poppins';">{{ session('success') }}</p>

                 </div>

              @endif

              <div class="col-lg-12">

                 <div class="sign-up-box">

                    <a href="{{ route('login') }}" class="sign-up-btn customer-signup-btn success_login">Go to Login</a>

                 </div>

              </div>

           </div>

        </div>

      </div>

    </div>

</section> 

@endsection

@section('footer')

@include('include.footer')

@endsection

@section('script')

@include('include.scripts')

@endsection
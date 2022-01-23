@extends('admin.layouts.app')
@section('title')
    Link Expired
@endsection
@section('links')
@include('admin.includes.links')
<link rel="icon" href="{{asset('public/admin/images/fav.png')}}" type="image/x-icon">
<style>
.mesg-cls {
  float: left;
  width: 100%;
  padding: 40px 20px;
  text-align: center;
  background: #ffdcdc;
  margin: 40px 0;
  border: 1px solid #ff0000;
  border-radius: 5px;
  box-shadow: 0px 0px 30px 7px rgba(106, 105, 105, 0.1);
}
 .img-span img{
    width: 110px;
    display:inline-block;
    margin-bottom: 15px;
 }
 .thankyou{
  width: 100%;
  text-align: center;
  font-size: 26px;
  color: #333;
  font-weight: 600;
  margin-bottom:0px;
 }
 .parent-divddd{
  min-width: 80%;
  float: left;
  display: inline-block;
  /*margin-top: 100px;*/
 }
 .success_login{
  color: #fff;
  font-size: 16px;
  font-weight: 500;
  font-family: 'Roboto';
  background: #5a038d;
  border-radius: 4px;
  padding: 9px 20px;
  margin-top: 10px;
  display: inline-block;
 }
.success_login:hover{
  color: #fff;
  background-color: #000 !important;
  border-color: #000 !important;
}
.alert-success{
  border: none !important;
  background: none !important;
}
.alert-success p{
  font-size: 16px;
} 

</style>
@endsection
@section('header')
@include('admin.includes.header')
@endsection
@section('content')
<section class="sign-up-body">
    <div class="container">
      <div class="container" style="text-align: center; margin-top: 50px;">
        <div class="parent-divddd">
           <div class="mesg-cls">
              <span class="img-span"><img src="{{asset('public/error.png')}}" alt=""></span>
              <h2 class="thankyou">Opps !!</h2>
              @if(Session::has('error'))
                 <div class="alert alert-success" role="alert">
                    <p style="font-family: 'poppins';">{{ Session::get('error') }}</p>
                 </div>
              @endif
              <div class="col-lg-12">
                 <div class="sign-up-box">
                    <a href="{{ route('admin.login') }}" class="sign-up-btn customer-signup-btn success_login">Go to Login</a>
                 </div>
              </div>
           </div>
        </div>
      </div>
    </div>
</section>     
@endsection

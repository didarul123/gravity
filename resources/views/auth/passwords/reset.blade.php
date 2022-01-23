
@extends('layouts.app')
@section('title','Reset Password')
@section('links')
@include('include.links')
@endsection
@section('header')
@include('include.header')
@endsection
@section('body')

    <main class="login-body" data-vide-bg="{{asset('public/assets/img/login-bg.mp4')}}">
        <!-- Login Admin -->

        <form method="POST" action="{{ route('password.update') }}" id="loginForm">
            @csrf
            
            <div class="login-form">
                <!-- logo-login -->
                <div class="logo-login">
                    <a href="#"><img src="{{asset('public/assets/img/logo/loder.png')}}" alt=""></a>
                </div>
                <h2>Reset Password</h2>
                @include('include.message')
                <div class="form-input">
                    <label for="name">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password">
                </div>
                <div class="form-input">
                    <label for="name">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Password Confirmation">
                </div>
                <div class="form-input pt-30">
                    <input type="submit" name="submit" value="Submit" style="background-color:#6610f2">
                </div>
                
                <!-- Forget Password -->
                <a href="{{route('login')}}" class="login">Login</a>
            
            </div>
        </form>
        <!-- /end login form -->
    </main>
@endsection
@section('scripts')
@include('include.scripts')
<script>
    $(document).ready(function(){
        validator = $('#loginForm').validate({
           rules:{
            password: { required: true},
            password_confirmation: {
                required: true,
                equalTo: '#password'
              }
           },
           submitHandler:function(form){
               form.submit();
            },
        });
    });
</script>
@endsection

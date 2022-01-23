
@extends('layouts.app')
@section('title','Login')
@section('links')
@include('include.links')
@endsection
@section('body')
@section('header')
@include('include.header')
@endsection
@section('body')
    <main class="login-body" data-vide-bg="{{asset('public/assets/img/login-bg.mp4')}}">
        <!-- Login Admin -->

        <form method="POST" action="{{ route('login') }}" id="loginForm">
            
            @csrf
            
            <div class="login-form">
                <!-- logo-login -->
                <div class="logo-login">
                    <a href="index.html"><img src="{{asset('public/assets/img/logo/loder.png')}}" alt=""></a>
                </div>
                <h2>Login Here</h2>
                @include('include.message')
                <div class="form-input">
                    <label for="name">Phone Number</label>
                    <input  type="text" name="mobile" id="mobile" placeholder="Phone Number">
                </div>
                <div class="form-input">
                    <label for="name">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password">
                </div>
                <div class="form-input pt-30">
                    <input type="submit" name="submit" value="login" style="background-color:#6610f2">
                </div>
                
                <!-- Forget Password -->
                <a href="{{route('password.request')}}" class="forget">Forget Password</a>
                <!-- Forget Password -->
                <a href="{{route('register')}}" class="registration">Registration</a>
            </div>
        </form>
        <!-- /end login form -->
    </main>
@endsection
@section('scripts')
@include('include.scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js"></script>
<script>
    $(document).ready(function(){
        validator = $('#loginForm').validate({
           rules:{
            mobile:{required: true},
            password: { required: true},
           },
           submitHandler:function(form){
               form.submit();
            },
        });
    });
</script>
@endsection

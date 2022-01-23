
@extends('layouts.app')
@section('title','Forget Password')
@section('links')
@include('include.links')
@endsection
@section('header')
@include('include.header')
@endsection
@section('body')


    <main class="login-body" data-vide-bg="{{asset('public/assets/img/login-bg.mp4')}}">
        <!-- Login Admin -->

        <form method="POST" action="{{route('password.email')}}" id="loginForm">
            
            @csrf
            <div class="login-form">
                <!-- logo-login -->
                <div class="logo-login">
                    <a href="#"><img src="{{asset('public/assets/img/logo/loder.png')}}" alt=""></a>
                </div>
                <h2>Forget Password</h2>
                @include('include.message')
                <div class="form-input">
                    <label for="name">Email</label>
                    <input  type="email" name="email" placeholder="Email" id="email">
                </div>
                <div class="form-input pt-30">
                    <input type="submit" name="submit" value="Send Password Reset Link" style="background-color:#6610f2">
                </div>
                
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
            email:{required: true},
           },
           submitHandler:function(form){
               form.submit();
            },
        });
    });
</script>
@endsection

@extends('layouts.app')
@section('title','Register')
@section('links')
@include('include.links')
<style>
    
    .nice-select {
    -webkit-tap-highlight-color: transparent;
        background: none;
 
    border-radius: 5px;
    border-bottom: solid 2px #fff;
        border-left:none;
        border-right:none;
        border-top:none;
    box-sizing: border-box;
    clear: both;
    cursor: pointer;
    display: block;
    float: left;
    font-family: inherit;
    font-size: 18px;
    font-weight: normal;
    height: 42px;
    line-height: 40px;
    outline: none;
    padding-left: 18px;
    padding-right: 30px;
    position: relative;
    text-align: left !important;
    -webkit-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    white-space: nowrap;
    width: 100%;
}
        .current{
            color: #fff !important
            
        }
    
    
    </style>
@endsection
@section('header')
@include('include.header')
@endsection
@section('body')



<!-- Register -->

<main class="login-body">
    <!-- Login Admin -->
    <form method="POST" action="{{ route('register') }}" id="regForm">
        @csrf
        <div class="login-form">
            <!-- logo-login -->
           
            <h2>Registration Here</h2>
            @include('include.message')
            <div class="form-input">
                <label for="name">Full name</label>
                <input  type="text" name="name" id="name" placeholder="Full name">
            </div>
            <div class="form-input">
                <label for="name">Email Address</label>
                <input type="email" name="email" id="email" placeholder="Email Address">
            </div>
             <div class="form-input">
                <label for="name">Phone Number</label>
                <input type="text" name="mobile" id="mobile" placeholder="Phone Number">
            </div>

        <div class="form-input">
                    <label for="level_of_education_id">Level of education</label>
                    <select class="form-control" name="level_of_education_id" id="level_of_education_id">
                        <option name="">Select</option>
                        @foreach(@$level as $val)
                            <option value="{{@$val->name}}">{{@$val->name}}</option>
                        @endforeach
                    </select>
                </div>
            <div class="form-input">
                <label for="name">Password</label>
                <input type="password" name="password" id="password" placeholder="Password">
            </div>
            <div class="form-input">
                <label for="name">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
            </div>
           
            <div class="form-input pt-30">
                <input type="submit" name="submit" value="Registration" style="background-color:#6610f2">
            </div>
            <!-- Forget Password -->
            <a href="{{route('login')}}" class="registration">Already Have an account please login</a>
        </div>
    </form>
    <!-- /end login form -->
</main>

@endsection
@section('scripts')
@include('include.scripts')
<script>
    $(document).ready(function(){
        validator = $('#regForm').validate({
           rules:{
            name:{required: true},
            //email:{required: true},
            email:{
                required: true, 
                email:true,
                remote: {
                url: '{{ route("user.email.check") }}',
                type: "post",
                data: {
                    email: function() {
                        return $( "#email" ).val();
                    },
                    _token: '{{ csrf_token() }}'
                    }
                }
            },
            mobile:{
             required:true,
             minlength: 8,
             // maxlength: 10,
             number:true,
             remote: {
                   url: '{{ route("user.mobile.check") }}',
                   type: "post",
                   data: {
                     mobile: function() {
                       return $( "#mobile" ).val();
                     },
                   _token: '{{ csrf_token() }}'
                   }
               }   
    
           },
            level_of_education_id:{required: true},
            password: { required: true},
            password_confirmation:{required: true, equalTo: "#password"}
           },
           messages: {
            email:{
               remote: 'This email has benn already taken'  
            } ,
            mobile:{
               remote: 'This Phone Number has benn already taken'  
            } ,
         },
           submitHandler:function(form){
               form.submit();
            },
        });
    });
</script>
@endsection


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gravity Education :: Admin |Forgot Password</title>
    <link rel="icon"  href="{{asset('public/favicon.png')}}" type="image/x-icon">
     @include('admin.includes.links')
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
     <style type="text/css">
        .error{
            float: left !important;
            color: red !important;
            border-width: 1px !important;
            border-color: red !important;
        }
    </style>
</head>

<body>
    <div class="splash-container">
        <div class="card ">
            @include('admin.includes.message')
            <div class="card-header text-center"><a href="javascript:;"><img class="logo-img" src="{{asset('public/admin/images/logo.png')}}" alt="logo"></a><span class="splash-description">Enter Your Email Address</span></div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.password.email') }}" class="forgotePassword">
                        @csrf
                    <div class="form-group">
                        <input class="form-control form-control-lg {{ $errors->has('email') ? ' is-invalid' : '' }} required" id="email" type="text" placeholder="Email Address" value="{{ old('email') }}" autocomplete="off" name="email">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Password Rest</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <div class="card-footer-item card-footer-item-bordered">
                        <a href="{{route('admin.login')}}" class="footer-link">Login</a>
                    </div>
                </div>
            </div>
    </div>  
    <script src="{{asset('public/admin/assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <script src="{{asset('public/admin/js/jquery.validate.js')}}"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        validator = $('.forgotePassword').validate({
           rules:{
            email: { required: true, email:true}
           },
           submitHandler:function(form){
               form.submit();
            },
        });
    });
</script>
</body>

</html>
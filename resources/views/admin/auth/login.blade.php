<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gravity Education :: Admin | Login</title>
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
        .form-group {
            margin-bottom: 12px;
            float: left;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="splash-container">
        <div class="card ">
            @include('admin.includes.message')
            <div class="card-header text-center"><a href="javascript:;"><img style="margin-bottom: 10px;" class="logo-img" src="{{asset('public/admin/images/logo.png')}}" alt="logo"></a><span class="splash-description">Please enter your user information.</span></div>
            <div class="card-body">
                <form method="POST" id="SigninForm" action="{{ route('admin.login') }}" aria-label="{{ __('Login') }}">
                        @csrf
                    <div class="form-group">
                        <input class="form-control form-control-lg {{ $errors->has('email') ? ' is-invalid' : '' }} required" id="email" type="text" placeholder="Email Address" value="{{ @$email }}" autocomplete="off" name="email">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg {{ $errors->has('password') ? ' is-invalid' : '' }} required" id="password" type="password" placeholder="Password" name="password" value="{{@$password}}">
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" name="remember" id="remember" type="checkbox" {{ @$remember ? 'checked' : '' }}><span class="custom-control-label">Remember Me</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="{{route('admin.password.request')}}" class="footer-link">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>
     <script src="{{asset('public/admin/assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <script src="{{asset('public/admin/js/jquery.validate.js')}}"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#SigninForm').validate({
            rules: {
                email: { required: true,email:true},
                password: { required: true},
            },
            
            submitHandler:function(form){
               form.submit();
            },
        });
    });
</script>
</body>

</html>
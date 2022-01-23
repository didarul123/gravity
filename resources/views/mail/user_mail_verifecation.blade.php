<!DOCTYPE html>
<html>
    <head>
        <title>Gravity</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @include('mail.layouts.header')
    </head>
    <body>
        <div class="container">
           <div class="container_logo_div">
                <div class="container_logo_div_inner">
                    <img src="{{ url('public/admin/images/logo.png') }}" alt="">
                </div>
            </div>
            <div class="heading">
                <p>Thank You for connecting with Gravity</p>
            </div>
            <div class="main_body">
                <h1>Dear {{@$data['name']}},</h1> 

                <div class="btnlbldiv">
                    <p>Please click the link below verify email to verify your registered email :</p>
                </div>
                <div class="body_text_div">
                    <p class="ptitle"> Login Id</p>
                    <p class="pdetails"> {{@$data['mobile']}}</p>
                </div>
                <div class="btndiv">
                    <a href="{{ route('verify', [@$data['vcode'],md5(@$data['id'])]) }}">Verify</a>
                </div>
                <p class="footertxt">Thank you.</p>
                <p class="footertxt">Team Gravity</p>
            </div>
        </div>
    </body>
</html>
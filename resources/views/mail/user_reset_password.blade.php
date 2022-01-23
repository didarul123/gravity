<!DOCTYPE html>
<html>
    <head>
        <title>Gravity Mail</title>
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
                <p>Thank You for connecting with Gravity </p>
            </div>
            <div class="main_body">
                <h1>Dear {{@$data['name']}},</h1>

                {{-- @if (@$data['mailBody'] == 'forgotpassword')
                    <div class="body_text_div">
                        <p class="ptitle">
                            @if(@$data['mailBody'] == 'forgotpassword')
                               Your forgot password Details:
                            @else
                               Your Login Details:
                            @endif
                        </p>
                    </div>
                    <div class="body_text_div">
                        <p class="ptitle"><strong>Email</strong>:</p><p class="pdetails">{{ @$data['email'] }}</p>
                    </div>
                    @if(@$data['mailType']!='resend')
                        @if(@$data['vcode'])
                        <div class="body_text_div">
                            <p class="ptitle"><strong>Verification Code</strong>: </p> <p class="pdetails">{{ @$data['vcode'] }} </p>
                        </div>
                        @else
                        <div class="body_text_div">
                           <p class="ptitle"><strong>Password</strong>:</p> <p class="pdetails">{{ @$data['password'] }}</p>
                        </div>
                        @endif
                    @endif
                @endif --}}
                
                @if(@$data['mailBody'] == 'forgotpassword')
                    <div class="btnlbldiv">
                        <p>Please click the link below to reset password:</p>
                    </div>
                    <div class="btndiv">
                        <a href="{{ @$data['link'] }}">Click Here</a>
                    </div>
                @endif
                <p class="footertxt">Thank you.</p>
                <p class="footertxt">Team Gravity</p>
            </div>
        </div>
    </body>
</html>
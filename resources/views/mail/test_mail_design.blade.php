<!DOCTYPE html>
<html>
	<head>
		<title>Mail</title>
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
            <div class="heading"><p>Thank You for connecting with Gravity</p></div>
			<div class="main_body">
				<h1>Dear Test,</h1>
				<div class="body_text_div">
					<p class="ptitle">Username :</p>
					<p class="pdetails">Username name here Se Will</p>
				</div>
				<div class="body_text_div">
					<p class="ptitle">Password :</p>
					<p class="pdetails">abcd145235</p>
				</div>			
				<div class="btnlbldiv">
					<p>please click the link below :</p>
				</div>
				<div class="btndiv">
					<a href="#">Click Here</a>
				</div>
				<p class="footertxt">Thank you.</p>
				<p class="footertxt">Team Gravity</p>
			</div>
		</div>
	</body>
</html>
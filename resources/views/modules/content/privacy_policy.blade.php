@extends('layouts.app')
@section('links')
@include('include.links')
<style type="text/css">
    .table .thead-dark th {
    color: #fff;
    background-color: #be01fc;
    border-color: blueviolet;
    }
    .cnttus h2{
        color: #000;
        margin-top: 15px;
        margin-bottom: 20px;
        font-size: 25px;
    }
    .cnttus h3{
        color: #000;
        margin-top: 10px;
        margin-bottom: 10px;
        font-size: 20px;
    }
    .cnttus p{
        color: #000;
        margin-top: 10px;
        font-size: 18px;
    }
</style>
@endsection
@section('header')
@include('include.header')
@endsection
@section('body')
<main>
    <section class="slider-area " style="height: 180px;">
        <div class="slider-active">
            <div class="single-slider slider-height4 d-flex align-items-center" >
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="ed_detail_wrap light">
                                <div class="ed_header_caption">
                                    <h2 class="ed_title">Privacy Policy</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="blog_area single-post-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @include('include.message')
                    <div class="cnttus">
                        <h2 style="text-align: center;">Privacy Policy</h2>
                        <p style="margin-bottom: 50px;">
                            Kindly read this privacy policy thoroughly so that you may learn more about the ways in which we use and protect your personal information. GRAVITY Education is committed to the highest ethical standards and is sensitive to the perspective that we would be dealing with data and information that may be personal in nature. By using this website and providing your personal information, you agree to the terms of Gravity Education’s online privacy policy and to its processing of such personal information for the purposes explained in this policy. As part of our normal operations we collect, and in some cases, disclose information about you. By registering on the site or by subscribing to a service and providing your contact details (telephone, email, mobile number, shipping address, credit card details etc), you agree that this action constitutes a consent, for the purposes of the telemarketing laws, to receive information about products and services (“Services”) from Us. 
                        </p>

                        <h3>Privacy :</h3>
                        <p style="margin-bottom: 50px;">
                            Your privacy is of utmost importance to us. We follow stringent procedures to protect the security of the information and or data stored on our Website. The information that you have shared on our Website is stored in secure server with encryption and can be accessed only for official purposes. 
                        </p>

                        <h3>Registration :</h3>
                        <p style="margin-bottom: 50px;">
                            On signing up on our Website, you are required to provide us with certain basic mandatory information inter-alia including your e-mail id, name, gender, password etc. Once the registration is completed, the said e-mail, password, roll, registration etc. or a certain combination can be used to access your account every time you visit our Website.
                        </p>
                        
                        <h3>Information we collect from you :</h3>
                        <p style="margin-bottom: 50px;">
                            We collect information that is either anonymous or personally identifiable. When you visit our site to read or download any information, we collect and store the name of the domain from which you access the internet, the date and time you access our site and the internet address of the website from which you link to our site, the search terms you enter into our search utility, browser software and internet service provider you use and any other relevant information, in order to improve security, analyze trends and administer the site. 
                        </p>
                        
                        <h3>SMS and Voice Communications :</h3>
                        <p style="margin-bottom: 50px;">
                            Upon subscribing to any services on our Website, we shall be entitled to use your registered mobile number on the Website to send transaction related SMS/Voice calls to you, irrespective of DND services being activated on your mobile. We may occasionally send promotional SMS/Voice Calls to your registered mobile number.
                        </p>

                        <h3>Automatic Information:</h3>
                        <p style="margin-bottom: 50px;">
                            We receive and store certain types of information whenever you interact with us. For example, like many websites, we use “cookies,” and we obtain certain types of information when your Web browser accesses our website or advertisements and other content served by or on behalf of Gravity education on other websites.
                        </p>

                        <h3>Payment Information :</h3>
                        <p style="margin-bottom: 50px;">
                            We do not store any Debit/Credit card, Internet banking details or any other information related to these on our website. On clicking the option Pay Now, you will be redirected to either Secure Payment Gateway or Bank’s Net Banking website for completing the transaction. You will then be required to enter your relevant card details or net banking details on the page to complete the transaction. On successful completion of the transaction, you will be redirected to our website. It is to be noted that we will not be storing any bank related information on our records and none of our staffs will hold or be exposed to this information.
                        </p>

                        <h3>SMS and Voice Communications :</h3>
                        <p style="margin-bottom: 50px;">
                            Upon subscribing to any services on our Website, we shall be entitled to use your registered mobile number on the Website to send transaction related SMS/Voice calls to you, irrespective of DND services being activated on your mobile. We may occasionally send promotional SMS/Voice Calls to your registered mobile number.
                        </p>

                        <h3>Information from Other Sources :</h3>
                        <p style="margin-bottom: 50px;">
                            We may also receive relevant information from other sources and use such information for providing better customer experience.
                        </p>

                        <h3>Social Media Links/Widgets :</h3>
                        <p style="margin-bottom: 50px;">
                            The Website may include certain social media features, such as the ‘Facebook like’ button and widgets such as the ‘Share this button’ or interactive mini-programs that run on the Website. On using these features, the IP addresses of the user may be collected depending on the page that is being visited and the Website may set appropriate cookie to enable the feature to function properly. The social media features and widgets are either hosted by a third party or hosted directly on the Website.
                        </p>

                        <h3>Server Logs :</h3>
                        <p style="margin-bottom: 50px;">
                            In order to ensure easy and comfortable surfing on our Website, each time you visit our Website, the server collects certain statistical information. These statistics are only used to provide us information in relation to the type of user using our website by maintaining history of page viewed and at no point they identify the personal details of the user. We may make use of this data to understand as to how our Website is being used.
                        </p>

                        <h3>Security : </h3>
                        <p style="margin-bottom: -10px;">
                            We have in place appropriate technical and security measures to prevent unauthorized or unlawful access to or accidental loss of or destruction or damage to your information. When we collect data through our website, we collect your personal details on a secured server. The payment details are entered on the Payment Gateway’s or Bank’s page on a secured SSL. The data is transferred between Bank and gateways in an encrypted manner.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
@section('scripts')
@include('include.scripts')
@endsection
@section('footer')
@include('include.footer')
@endsection
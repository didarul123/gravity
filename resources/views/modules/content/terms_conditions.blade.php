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
    <section class="slider-area " style="height: 230px;">
        <div class="slider-active">
            <div class="single-slider slider-height4 d-flex align-items-center" >
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="ed_detail_wrap light">
                                <div class="ed_header_caption">
                                    <h2 class="ed_title">Terms And Conditions</h2>
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
                        <h2 style="text-align: center;">Terms And Conditions :</h2>
                        <p style="margin-bottom: 50px;">
                            This website is owned and operated by Gravity Education. Kindly read the given terms and conditions carefully as your use of the service are subject to your acceptance of and compliance with the following terms and conditions (“Terms”) as the Terms constitute a binding contract and or agreement between you and Gravity Education. By accessing this Website, subscribing to or using any of its services you agree that you have read, understood and are bound by the Terms, irrespective of how you subscribe to or use the services. If you do not want to be bound by the Terms, you must not subscribe to or use our services. If you want to ask anything about the Terms or have any comments or suggestions or complaints on or about our Website, kindly us on 01608483766.
                        </p>

                        <h3 style="text-align: center;">Eligibility for Use</h3>
                        <p style="margin-bottom: 10px;">
                            Use of the Website is available only to persons who can form legally binding contracts If you are a minor i.e. under the age of 18 years, you shall not register as a User of the Website and shall not transact on or use the Website without having permission from your guardian. The site reserves the right to terminate your subscription and/or refuse to provide you the access to the Website if it is found that you are if you are not paid and not eligible.
                        </p>
                        <p style="margin-bottom: 10px;">
                            You are prohibited from selling, trading, or otherwise transferring your account to any other party. The site owns no responsibility in any manner over any dispute arising out of transactions by any third party using your account/e-mail provided by you to the site or payments made by any of the payment methods by any third party. We make no representation that any products or services referred to in the materials on this website are appropriate for use, or available outside Bangladesh. Those who choose to access this Website from outside Bangladesh are responsible for compliance with local laws if and to the extent local laws are applicable.
                        </p>

                        <h3 style="text-align: center;">Content Accuracy</h3>
                        <p style="margin-bottom: 50px;">
                            This site takes utmost care in the preparation of the content of this Website. It disclaims all warranties, express or implied, as to the accuracy of the information contained in any of the materials on this Website except to the extent permitted by applicable law. This site shall not be liable to any person for any loss or damage which may arise from the use of any of the information contained in any of the materials on this Website.
                        </p>

                        <h3>Electronic Communications</h3>
                        <p style="margin-bottom: 50px;">
                            When you visit Gravity Education website or send email(s) to us, you are communicating with us electronically. You consent to receive communications from this site. We will communicate with you by email or SMS. You agree that all disclosures, agreements, notices, and other communications that Gravity provides to you electronically satisfy all legal requirements.
                        </p>

                        <h3>SMS Communication:</h3>
                        <p style="margin-bottom: 50px;">
                            On registering with Gravity Education’s Website, you agree that this site may use your registered mobile number on the Website to send SMS to you.
                        </p>

                        <h3></h3>
                        <p style="margin-bottom: 50px;"></p>

                        <h3>Account and Registration Obligations</h3>
                        <p style="margin-bottom: 50px;">
                            In consideration of your use of this Website, you represent that you are of legal age to enter into a binding contract and are not a person barred from receiving services under the laws as applicable in Bangladesh. You also agree to provide accurate, true, current and complete information about yourself as prompted by this Website’s registration form or any information provided by you by other means of communication. If you provide any information that is false, inaccurate, not current or incomplete (or becomes untrue, inaccurate, not current or incomplete), or Gravity Educationhas reasonable grounds to suspect that such information is false, inaccurate, not current or incomplete, Gravity Educationhas the right to suspend or terminate your account and refuse any and all current or future use of this Website or any part thereof.
                        </p>

                        <h3>Mobile Financial Service (MFS), Internet Banking and Debit/Credit Card Transaction:</h3>
                        <p style="margin-bottom: 50px;">
                            You agree, understand and confirm that the MFS details provided by you for availing the services on this site is correct. You further agree and undertake to provide the correct and valid debit/credit card details while making payment on this website. We do not store any information related to your Debit/Credit card or Internet banking. In case we do not receive an authorization from the respective bank or the transaction gets interrupted due to any reason, the transaction will be treated as failed and no order will be processed for that transaction. In this case, if any amount has been deducted from your account, the same will be credited back. We shall not be liable in any event, for any card fraud that occurs to you. The liability for use of a card fraudulently will be on you and the onus to ‘prove otherwise’ shall be exclusively on you.
                        </p>

                        <h3>Fraudulent /Declined Transactions:</h3>
                        <p style="margin-bottom: 50px;">
                            The site’s payment partners (being the Payment Gateways and facilitators and Banks) and its fraud detection team constantly monitor your account in order to avoid fraudulent accounts and transactions. We reserve the right to initiate legal proceedings against any such persons for fraudulent use of this Website and any other unlawful acts or omissions in breach of these terms and conditions. In the event of detection of any fraudulent or declined transaction, prior to initiation of legal actions, Gravity Education reserves the right to immediately delete such user account(s) and or dishonour all past and pending orders without any liability. For the purpose of this clause, Gravity Education shall owe no liability for any refunds.
                        </p>

                        <h3>Cancellations and Refunds Policy:</h3>
                        <p style="margin-bottom: 50px;">
                            User once admitted for a specific program/service, paid amount will be reflected on user account. User can avail the opportunity to migrate from admitted program/service to another program/service based on availability and his funds will be adjusted but not refunded. Due to technical error, while making payment, user paid more than agreed amount, then user has to claim the refund of paid extra amount within 3 days and then refund will be done within 7-10 working days. 
                        </p>

                        <h3>Abuse or Misuse of the Website:</h3>
                        <p style="margin-bottom: 50px;">
                            The user hereby agrees that the user shall neither by itself nor be part of any kind of abuse or misuse of the Website in any manner whatsoever. By availing to the live online class sessions available on the Website, the user agrees that, apart from not sharing any kind of personal information of any kind with any other party, the user shall also ensure that he/she shall not inter-alia share, display, convey, transmit or portray abusive content of any kind in any manner whatsoever. Likewise, the user hereby also agrees that he/she shall not inter-alia share, display or transmit any copyrighted material which he/she is not permitted to do so in the course of the facilities availed from the Website. The user shall be entitled to share only such materials which have an open source code and that they have specifically permitted the user to share. You agree and confirm that you shall not use the Website for any of the following purposes:
                        </p>

                        <h3>Reviews, Feedback & Submissions:</h3>
                        <p style="margin-bottom: 50px;">
                            All reviews, comments, feedback, postcards, suggestions, ideas, and other submissions disclosed, submitted or offered on or by this Website, submitted or offered in connection with your use of its Website (collectively, the “Comments”) shall be and remain Gravity Education’s property. Such disclosure, submission or offer of any Comments shall constitute an assignment to Gravity Education of all worldwide rights, titles and interests in all copyrights and other intellectual properties in the Comments. Thus, Gravity Educationowns exclusively all such rights, titles and interests and shall not be limited in any way in its use, commercial or otherwise, of any Comments. The site will be entitled to use, reproduce, disclose, modify, adapt, create derivative works from, publish, display and distribute any Comments you submit for any purpose whatsoever, without restriction and without compensating you in any way. Gravity Educationis and shall be under no obligation (1) to maintain any Comments in confidence; (2) to pay you any compensation for any Comments or use of comments; or (3) to respond to any Comments. You agree that any Comments submitted by you to the Website shall not violate this policy or any right of any third party, including copyright, trademark, privacy or other personal or proprietary right(s), and shall not cause injury to any person or entity. 
                        </p>

                        <h3 style="text-align: center;">Modification in Terms & Conditions of Service:</h3>
                        <p style="margin-bottom: 10px;">
                            These Terms shall be construed in accord with the applicable laws of Bangladesh. The Courts at Dhaka shall have exclusive jurisdiction in any proceedings arising out of these Terms.
                        </p>
                        <p style="margin-bottom: 10px;">
                            In case of any dispute or difference either in interpretation or otherwise, of any terms of these Terms of Use, the same shall be referred to an independent arbitrator who will be appointed by Gravity Educationand such arbitrator’s decision shall be final and binding on you. The above arbitration shall be in accordance with the Arbitration and Conciliation Act, 2001 as amended time to time. The arbitration shall be conducted in English language and shall be held in Dhaka.
                        </p>
                        <p style="margin-bottom: 10px;">
                            Gravity Educationmay at any time modify the Terms of its Website without any prior notification to the user. Should you wish to terminate your account due to a modification to the Terms or the Privacy Policy, you may do so by contacting us. However, if you continue to use the service you shall be deemed to have agreed to accept and abide by the modified Terms of this Website.
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
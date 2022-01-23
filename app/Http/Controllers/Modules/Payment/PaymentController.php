<?php

namespace App\Http\Controllers\Modules\Payment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Enroll;
use Auth;
use Route;
use Session;
class PaymentController extends Controller
{
    public function payment(Request $request)
    {


    Session::put('course_id', $request->id);

    	// shurjoPay sandbox URL
	  $payment_url = "https://shurjopay.com/sp-data.php"; // Please ask over email  
	   // $payment_url = "https://shurjopay.com";

	  // Merchant Return URL
	  // $return_url = 'https://gravityeducation.online/payment_test/PHP/sp.php'; // 
	  $return_url = route('payment.response'); // 
	  // Customer IP
	  $clientIP = '162.213.253.54';
	  $merchant_username = 'gravityeducation'; // Please ask over email
	  $merchant_password = '7xIRgkkL8Lsm'; // Please ask over email
	  $merchant_transaction_id_prefix = 'GEO'; // Please ask over email


	  $uniq_transaction_key = $merchant_transaction_id_prefix.uniqid();  
	  $amount = $request->amount;  

	  $xml_data = 'spdata=<?xml version="1.0" encoding="utf-8"?>
	                <shurjoPay><merchantName>'.$merchant_username.'</merchantName>
	                <merchantPass>'.$merchant_password.'</merchantPass>
	                <userIP>'.$clientIP.'</userIP>
	                <uniqID>'.$uniq_transaction_key.'</uniqID>
	                <totalAmount>'.$amount.'</totalAmount>
	                <paymentOption>shurjopay</paymentOption>
	                <returnURL>'.$return_url.'</returnURL></shurjoPay>';

	  // echo "<pre>";
	  // print_r($xml_data);

    	// dd($xml_data);
	                
	  
	  $ch = curl_init();  
	  curl_setopt($ch,CURLOPT_URL,$payment_url);
	  curl_setopt($ch,CURLOPT_POST, 1);          
	  curl_setopt($ch,CURLOPT_POSTFIELDS,$xml_data);
	  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
	  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
	  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	  $response = curl_exec($ch);
	  if (curl_errno($ch)) {
	    $error_msg = curl_error($ch);
	    print_r($error_msg);
	  }
	  curl_close ($ch);
	  echo "<pre>";
	  print_r($response);

	  

    }

    public function paymentResponse(Request $request){
    	// $uri = $request->path();
    	$uri = Route::currentRouteName();
    	// dd($uri);

       	@$enroll['user_id'] = Auth::User()->id;
		@$enroll['course_id'] = Session::get('course_id'); 		
		$data['enroll'] = Enroll::create($enroll);

    	return redirect()->route('my.enroll');
    }

    
}

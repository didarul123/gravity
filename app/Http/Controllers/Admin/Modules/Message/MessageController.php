<?php

namespace App\Http\Controllers\Admin\Modules\Message;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class MessageController extends Controller
{
    public function addMessage()
    {
    	$data['student'] = User::where('status','A')->get();
    	//dd($data);
    	return view('admin.modules.message.send_message')->with($data);
    }


     public function sendMessage(Request $request)
    {
    	
    	dd($request->all());
    	return view('admin.modules.message.send_message');
    }
}

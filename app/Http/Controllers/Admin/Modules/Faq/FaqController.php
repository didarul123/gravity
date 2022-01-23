<?php

namespace App\Http\Controllers\Admin\Modules\Faq;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq;

class FaqController extends Controller
{
    public function manageFaq()
    {
    	$data['faq'] = Faq::orderBy('id','desc')->get();
    	return view('admin.modules.faq.manage_faq')->with($data);
    }


    public function createFaq(Request $request,$id=null)
    {
    	if($request->all()){
            $request->validate([
                'question'        => 'required',
                'answer'   => 'required',
            ]);
            $faq['question'] = $request->question;
            $faq['answer'] = $request->answer;
        	

            if(@$request->ID){
                Faq::where('id',$request->ID)->update($faq);
                return redirect()->route('manage.faq')->with('success','Faq updated successfully.');
            }
            Faq::create($faq);
            return redirect()->route('manage.faq')->with('success','Faq added successfully.');
        }
        $data['faq'] = Faq::where('id',@$id)->first();
    	return view('admin.modules.faq.create_faq')->with($data);
    }



    public function deleteFaq(Request $request , $id){
        $del = Faq::where('id',$id)->first();
        if($del){
            Faq::where('id',$id)->delete();
            return redirect()->back()->with('success','Faq deleted successfully.');
        } else {
            return redirect()->back()->with('error','Somthing went be wrong.');
        }
    }
}

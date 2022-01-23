<?php

namespace App\Http\Controllers\Admin\Modules\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Storage;

class StudentController extends Controller
{
    public function manageStudent(Request $request)
   {
   		$data['student'] = User::where('status','!=','D')->orderBy('created_at','desc');
        if ($request->all()) {
            if (@$request->keyword) {
                $data['student'] = $data['student']->where('name', 'like', '%' . $request->keyword . '%');
            }
            
            if (@$request->status) {
                $data['student'] = $data['student']->where('status', $request->status);
            }
        }
        $data['student'] = $data['student']->get();
        $data['key'] = $request->all();
   		return view('admin.modules.student.manage_student')->with($data);
   }


   public function createStudent(Request $request,$id=null){

        if($request->all()){
            $request->validate([
                'name'        => 'required',
                'email'   => 'required',
                'class'   => 'required',
                'mobile'   => 'required',
            ]);
            $student['name'] = $request->name;
            $student['email'] = $request->email;
            $student['class'] = $request->class;
            $student['mobile'] = $request->mobile;
            $student['dob'] = $request->dob;
            $student['father_name'] = $request->father_name;
            $student['address'] = $request->address;
            $student['college_school'] = $request->college_school;
            $student['past_academic_result'] = $request->past_academic_result;
            $student['branch'] = $request->branch;
            $student['how_to_read'] = $request->how_to_read;
            $student['guardian_info'] = $request->guardian_info;
        	
        	if(@$request->image){
                $image = $request->image;
                $filename = time().'-'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
                Storage::putFileAs('profileImage', $image, $filename);
                @unlink(storage_path('app/profileImage/'.@$request->image));
                $student['image'] = $filename;
            }

            if(@$request->ID){
                User::where('id',$request->ID)->update($student);
                return redirect()->route('manage.student')->with('success','Student updated successfully.');
            }
            $storeManager = User::create($student);
            return redirect()->route('manage.student')->with('success','Student added successfully.');
        }
        $data['student'] = User::where('id',@$id)->first();
        return view('admin.modules.student.create_student')->with(@$data);
    }


    public function deleteStudent(Request $request , $id){
        $del = User::where('id',$id)->first();
        if($del){
            User::where('id',$id)->update(['status'=>'D']);
            return redirect()->back()->with('success','Student deleted successfully.');
        } else {
            return redirect()->back()->with('error','Somthing went be wrong.');
        }
    }

    public function viewStudent(Request $request , $id){
        $data['student'] = User::where('id',$id)->first();
        if($data['student']){
            
            $smsData['number'] = "1707766816";
            $smsData['msg'] = "This is test sms.";
            $this->sendSms($smsData);
            return view('admin.modules.student.student_details')->with($data);
        } else {
            return redirect()->back()->with('error','Somthing went be wrong.');
        }
    }

    private function sendSms($smsData) {
      $url = "http://www.bangladeshsms.com/smsapi";
      $data = [
        "api_key" => "C20074935fe36e2edffef4.68741436",
        "type" => "application/json",
        "contacts" => "+880".$smsData['number'],
        "senderid" => "8809612446756",
        "msg" => $smsData['msg'],
      ];
      // dd($data);
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $response = curl_exec($ch);
      dd($response);
      curl_close($ch);
      return $response;
    }
}

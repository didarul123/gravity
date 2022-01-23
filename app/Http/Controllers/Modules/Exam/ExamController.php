<?php

namespace App\Http\Controllers\Modules\Exam;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ExamMaster;
use App\Models\ExamDetail;
use App\Models\UserExam;
use App\Models\UserExamDetail;
use App\Models\UserExamMaster;
use App\Models\Subject;
use Auth;
use Session;
use App\Models\Enroll;
use App\User;
class ExamController extends Controller
{
	/**
    *   Method      : selectExam
    *   Description : This is use select Exam
    *   Author      : Pankaj -> Niloy
    *   Date        : 2020-Dec-01
    **/
    public function selectExam(Request $request){
        $data['exam'] = ExamMaster::orderBy('id','desc')->where('is_complete','YES')->get();
		return view('modules.exam.exam_select')->with($data);
	}
	
    /**
    *   Method      : exam
    *   Description : This is use start exam
    *   Author      : Pankaj -> Niloy
    *   Date        : 2020-Dec-02
    **/
    public function exam(Request $request,$id=null){
		$user_id = @Auth::id();
        $getExamMaster = ExamMaster::where(['id'=>$id,'status'=>'A','is_complete'=>'YES'])->first();
    	if(@$user_id && $id && $getExamMaster){
            $UserExamData = UserExam::create([
                                    'user_id'    => $user_id,
                                    'date_start' => date('Y-m-d h:i:s'),
                                    'status'     => 'Started'
                                ]);
            $UserExamMasterdata = UserExamMaster::create([
                                        'user_exam_id'      => $UserExamData->id,
                                        'user_id'           => $user_id,
                                        'exam_master_id' 	=> $getExamMaster->id,
                                        'total_question'    => $getExamMaster->total_questions,
                                        'status'            => 'P'
                                    ]);
            $getExamDetail = ExamDetail::where('exam_master_id',$getExamMaster->id)->inRandomOrder()->get();
            foreach ($getExamDetail as $key => $value) {
                if($key<$getExamMaster->total_questions){
            		UserExamDetail::create([
                        'user_exam_master_id'   => $UserExamMasterdata->id,
                        'exam_details_id'  		=> $value->id,
                    ]);
                }
            }

            // $data['exammaster'] = UserExam::with('getExamSection')->where(['id'=>$UserExamData->id,'user_id'=>$user_id])->first();
            $data['user_exam'] = UserExamDetail::where('user_exam_master_id',$UserExamMasterdata->id)->with('getQuestion')->get();
            $data['totQ'] = $getExamMaster->total_questions;
            $data['exammaster'] = $getExamMaster;
            $data['userExam'] = $UserExamData;
            // dd($data);
			return view('modules.exam.exam')->with($data);
    	} else {
    		return redirect()->back()->with('error','Somthing went be wrong.');
    	}
	}


    /**
    *   Method      : selectOption
    *   Description : This is use to select Option (AJAX)
    *   Author      : Pankaj -> Niloy
    *   Date        : 17-01-2021
    **/
    public function selectOption(Request $request){
        $response = [
            'jsonrpc' => '2.0'
        ];
        $chkAns = ExamDetail::where('id',@$request->data['ques'])->first();
        if(substr($chkAns->correct_answer,-1,1)==@$request->data['ans']){
            $is_correct = 'YES';
        } else {
            $is_correct = 'NO';
        }
        $response['result'] =  UserExamDetail::where('id',@$request->data['EQid'])
                                                ->update([
                                                    'answer_no'=>@$request->data['ans'],
                                                    'is_correct'=>$is_correct
                                                ]);
        return response()->json($response);
    }

    /**
    *   Method      : nextQuestion
    *   Description : This is use to next Question (AJAX)
    *   Author      : Pankaj -> Niloy
    *   Date        : 2020-Dec-03
    **/
    public function nextQuestion(Request $request){
        $response = [
            'jsonrpc' => '2.0'
        ];
        $QUES = UserExamDetail::where('user_exam_master_id',$request->data['user_exam_master_id'])->pluck('id');
        $response['result']['next'] = 0;
        $response['result']['prev'] = 0;
        foreach ($QUES as $key => $value) {
            if($value==@$request->data['q_id']){
                $response['result']['next'] = @$QUES[$key+1];
                $response['result']['prev'] = @$QUES[$key-1];
            }
        }

        if(@$request->data['type']=='S'){
            $chkAns = ExamDetail::where('id',@$request->data['ques'])->first();
            if(substr($chkAns->correct_answer,-1,1)==@$request->data['ans']){
                $is_correct = 'YES';
            } else {
                $is_correct = 'NO';
            }
            UserExamDetail::where('id',@$request->data['EQid'])
                            ->update([
                                'answer_no'=>@$request->data['ans'],
                                'is_correct'=>$is_correct
                            ]);
        }

        $question = UserExamDetail::with('getQuestion')
                                  ->where('id',@$request->data['q_id'])
                                  ->first();
        // dd($question);
        if(@$question->getQuestion){
            $response['result']['question']             = $question->getQuestion->question;
            $response['result']['answer_1']             = $question->getQuestion->answer_1;
            $response['result']['answer_2']             = $question->getQuestion->answer_2;
            $response['result']['answer_3']             = @$question->getQuestion->answer_3;
            $response['result']['answer_4']             = @$question->getQuestion->answer_4;
            $response['result']['quesno']               = @$question->getQuestion->id;
            $response['result']['user_exam_detail_id']  = @$question->id;            
            $response['result']['answer_no']            = @$question->answer_no;
            $response['result']['user_exam_master_id']  = @$question->user_exam_master_id;
        }
        return response()->json($response);
    }

    /**
    *   Method      : scoreCard
    *   Description : This is use Score Card Page
    *   Author      : Pankaj -> Niloy
    *   Date        : 2020-Dec-05
    **/


    public function meritList($examId=null){
        $data['merit'] = UserExamMaster::where(['exam_master_id'=>$examId,'status'=>'C'])
                                 ->groupBy('user_id')
                                 ->orderBy('id','desc')
                                 ->get();
        return view('modules.exam.merit_list')->with($data);
    }

    public function getsubjects($course_id)
    {
        $subjects = Subject::where('course_id', $course_id)->get();
        if($course_id){
            $subjects = Subject::where('course_id', $course_id)->get();
        }else{
            $subjects = Subject::get();
        }
        return view('modules.exam.getsubjects', compact('subjects'));

    }

    public function filterExam(Request $request)
    {
        sleep(1);
        $course_id = $request->course_id;

        $subject_id = $request->subject_id;
        $platform = $request->platform;

        // $exams = ExamMaster::where('status', 'A')
        //         ->where('course_id', $course_id)
        //         ->where('subject_id', $subject_id)
        //         ->where('platform', $platform)
        //         ->get();

        $exams = ExamMaster::where(function($filter) use ($course_id, $subject_id, $platform) {
                       if (!empty($course_id) || $course_id != '') {
                           $filter->where('course_id', $course_id);
                       }
                       if (!empty($subject_id) || $subject_id != '') {
                           $filter->where('subject_id',  $subject_id);
                       } 
                       if (!empty($platform) || $platform != '') {
                           $filter->where('platform',  $platform);
                       }                       
                       
                   })
                ->where('status', 'A')
                ->get();
        return view('modules.exam.filterExam', compact('exams'));


    }

    public function takeExam($exam_id)
    {
        $exam = ExamMaster::find($exam_id);
        return view('modules.exam.takeExam', compact('exam'));
    }

    public function ExamQuestion(Request $request)
    {
        $user_id = @Auth::id();
        $exam_master_id = $request->examMasterId;
        $exam = ExamMaster::find($exam_master_id);

        $course_id = $request->courseId;
        $subject_id = $request->subjectId;
        $examVersion = $request->examVersion;


        Session::put('exam_master_id', $exam_master_id);
        Session::put('examVersion', $examVersion);
        Session::put('exam', $exam);


        if($user_id && $exam){

        $UserExamData = UserExam::create([
                            'user_id'    => $user_id,
                            'date_start' => date('Y-m-d h:i:s'),
                            'status'     => 'Started'
                        ]);

        $UserExamMasterdata = UserExamMaster::create([
                                'user_exam_id'      => $UserExamData->id,
                                'user_id'           => $user_id,
                                'exam_master_id'    => $exam->id,
                                'total_question'    => $exam->total_questions,
                                'status'            => 'P'
                            ]);

        $getExamDetail = ExamDetail::where('exam_master_id',$exam->id)->where('qs_version', $examVersion)->inRandomOrder()->get();

        Session::put('totalQuestion', count($getExamDetail));


            foreach ($getExamDetail as $key => $value) {
                if($key<$exam->total_questions){
                    UserExamDetail::create([
                        'user_exam_master_id'   => $UserExamMasterdata->id,
                        'exam_details_id'       => $value->id,
                    ]);
                }
            }
            
            $UserExam = $UserExamData->id;

            $start_time = date("h:i:A");
            $duration = '+'.($exam->duration_in_minute).' '.'minutes';

            // $end_time = date('h:i:A', strtotime($duration, strtotime($start_time)));

            $end_time = date("h:i:A",strtotime(date($start_time.$duration)));

            $exam_questions = ExamDetail::where('exam_master_id', $exam_master_id)->where('qs_version', $examVersion)->where('status', 1)->get();
            return view('modules.exam.ExamQuestion', compact('exam_questions', 'exam', 'start_time', 'end_time', 'UserExam'));
        }else{
            return redirect()->back()->with('error','Somthing went be wrong.');
        }
    }

     public function submitExam(Request $request){
        if ($request->ans) {

            $user_examId = $request->user_examId;

            Session::put('user_examId', $user_examId);
            foreach ($request->ans as $key => $value) {

                // dd($key);

                $chkAns = ExamDetail::where('id', $key)->first();

                if($chkAns->correct_answer == $value){
                    $is_correct = 'YES';
                }else{
                    $is_correct = 'NO';
                }
                UserExamDetail::where('exam_details_id', $key)
                            ->update([
                                'answer_no'=> $value,
                                'is_correct'=> $is_correct
                            ]);
            }
        }

        return redirect()->route('result_page');

        // return redirect()->route('score.card', $request->user_examId); //old route
    }

    public function scoreCard(Request $request,$examId=null){
        $user_id = @Auth::id();
        if($user_id && $examId){
            $exId = UserExamMaster::where('user_exam_id', $examId)->first();

            $userExamVersion = Session::get('userExamVersion');
            $totalQuestion = Session::get('totalQuestion');


            $getEm = ExamMaster::find($exId->exam_master_id);
                

                // $data['totQ'] = $exId->total_question;
                $data['totQ'] = $totalQuestion;

                // $data['totQ'] = UserExamDetail::where('user_exam_master_id',$examId)->count();

                $data['totA'] = UserExamDetail::where('user_exam_master_id', $examId)->whereNotNull('is_correct')->count();
                $data['totR'] = UserExamDetail::where('user_exam_master_id', $examId)->where('is_correct','YES')->count();
                $data['totW'] = UserExamDetail::where('user_exam_master_id', $examId)->where('is_correct','NO')->count();
                $data['score'] = $data['totR']*$getEm->marks_right - $data['totW'] * $getEm->marks_wrong;

                UserExam::where(['user_id'=>$user_id,'id'=>$examId])->update(['date_end'=>date('Y-m-d h:i:s'),'status'=>'Completed','score'=>$data['score']]);

                UserExamMaster::where('user_exam_id',$examId)->update(['status'=>'C','total_answer'=>$data['totA'],'correct_answer'=>$data['totR']]);


                // $data['totA'] = $exId->total_answer;
                // $data['totR'] = $exId->correct_answer;
                // $data['totW'] = $exId->total_answer - $exId->correct_answer;
                // $data['score'] = $data['totR']*$getEm->marks_right - $data['totW']*$getEm->marks_wrong;

                // dd($data);

            
            // dd($exId);
            return view('modules.exam.score_card')->with(@$data);
        } else {    
            return redirect()->back()->with('error','Somthing went be wrong.');
        }
    }



    public function result_page()
    {
        $user_id = @Auth::id();

        if($user_id){

            $exam_master_id = Session::get('exam_master_id');
            $examVersion = Session::get('examVersion');
            $exam = Session::get('exam');
            $user_examId = Session::get('user_examId');
            $totalQuestion = Session::get('totalQuestion');

            $exId = UserExamMaster::where('user_exam_id', $user_examId)->first();
            $getEm = ExamMaster::find($exId->exam_master_id);

            $exam_questions = ExamDetail::where('exam_master_id', $exam_master_id)->where('qs_version', $examVersion)->where('status', 1)->get();

            return view('modules.exam.result_page', compact('exam_questions', 'exam', 'exId', 'getEm', 'totalQuestion', 'user_examId'));
        
        }else{
            return redirect()->back()->with('error','Somthing went be wrong.');
        }
    }


}

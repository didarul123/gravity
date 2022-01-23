<?php

namespace App\Http\Controllers\Admin\Modules\Exam;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ExamDetail;
use App\Models\ExamMaster;
use App\Models\Course;
use App\Models\Subject;
use Storage;

class ExamController extends Controller
{
    /**
    *   Method      : manageExam
    *   Description : This is use to manageExam page
    *   Author      : Pankaj
    *   Date        : 02-09-2020
    **/
    public function manageExam(Request $request){
    	$data['course'] = Course::get();
    	$data['exam'] = ExamMaster::where('status','!=','D')->orderBy('created_at','desc');
    	// if ($request->all()) {
     //        if (@$request->keyword) {
     //            $data['exam'] = $data['exam']->whereHas('getSkill',function($e) use ($request){
     //    										$e->where('skill', 'like', '%' . $request->keyword . '%');
     //    									});
     //        }
     //        if (@$request->category_id) {
     //            $data['exam'] = $data['exam']->whereHas('getSkill',function($e) use ($request){
     //                                            $e->where('category_id', $request->category_id);
     //                                        });
     //        }
     //        if (@$request->subcategory_id) {
     //            $data['exam'] = $data['exam']->whereHas('getSkill',function($e) use ($request){
     //                                            $e->where('subcategory_id', $request->subcategory_id);
     //                                        });
     //        }
     //        if (@$request->status) {
     //            $data['exam'] = $data['exam']->where('status', $request->status);
     //        }
     //    }
        $data['exam'] = $data['exam']->get();
        $data['key'] = $request->all();
    	return view('admin.modules.exam.manage_exam')->with($data);
    }    

    /**
    *   Method      : createExam
    *   Description : This is use to createExam page
    *   Author      : Pankaj
    *   Date        : 02-09-2020
    **/
    public function createExam(Request $request,$id=null){
    	// $getCourss  = ExamMaster::where('status','!=','D')->where('id','!=',@$id)->pluck('course_id');

    	$data['course'] = Course::/*whereNotIn('id',$getCourss)->*/get();
    	if($request->all()){
    		// dd($request->all());
            $request->validate([
                'course_id'        		=> 'required',
                'subject_id'             => 'required',
                'duration_in_minute'   	=> 'required',
                'total_questions'   	=> 'required',
                'platform'       => 'required',
                'instructions_eng'       => 'required',
                'instructions_bangla'       => 'required'
            ]);
            $Exam['course_id'] = $request->course_id;
            $Exam['subject_id'] = $request->subject_id;
            $Exam['platform'] = $request->platform;
            $Exam['duration_in_minute'] = $request->duration_in_minute;
            $Exam['total_questions'] = $request->total_questions;
            $Exam['exam_name'] = $request->exam_name;
            $Exam['marks_wrong'] = $request->marks_wrong;
            $Exam['marks_right'] = $request->marks_right;
            $Exam['exam_date_time'] = $request->exam_date_time;
            $Exam['instructions_eng'] = $request->instructions_eng;
            $Exam['instructions_bangla'] = $request->instructions_bangla;
            if(@$request->ID){
                ExamMaster::where('id',$request->ID)->update($Exam);
                return redirect()->route('manage.exam')->with('success','Exam updated successfully.');
            }
            $Exam['status'] = 'A';
            $Exam['questions_added'] = 0;
            ExamMaster::create($Exam);
            return redirect()->route('manage.exam')->with('success','Exam added successfully.');
        }
        $data['exam'] = ExamMaster::where('id',@$id)->first();

        if($data['exam']){
            $data['subjects'] = Subject::where('status', 1)->where('course_id', $data['exam']->course_id)->get();
        }
    	return view('admin.modules.exam.create_exam')->with($data);
    }

    /**
    *   Method      : changeStatus
    *   Description : This is use to changeStatus
    *   Author      : Pankaj
    *   Date        : 2020-Sep-11
    **/
    public function changeStatus(Request $request , $id){
        $Exam = ExamMaster::where('id',$id)->first();
        if(!$Exam){
            return redirect()->back()->with('error','Somthing went be wrong.');
        }
        if($Exam->status=='A') {
            $update_status['status'] = 'I';
        }           
        if($Exam->status=='I') {
            $update_status['status'] = 'A';
        }
        $Exam->update($update_status);
        return redirect()->back()->with('success','Exam status changed successfully.');
    }

    /**
    *   Method      : deleteExam
    *   Description : This is use to deleteExam
    *   Author      : Pankaj
    *   Date        : 2020-Sep-11
    **/
    public function deleteExam(Request $request , $id){
        $delExam = ExamMaster::where('id',$id)->first();
        if($delExam){
            ExamMaster::where('id',$id)->update(['status'=>'D']);
            return redirect()->back()->with('success','Exam deleted successfully.');
        } else {
            return redirect()->back()->with('error','Somthing went be wrong.');
        }
    }

	/**
    *   Method      : viewExam
    *   Description : This is use to viewExam
    *   Author      : Pankaj
    *   Date        : 2020-Sep-11
    **/
    public function viewExam(Request $request , $id){
        $data['exam'] = ExamMaster::where('id',$id)->first();
        if($data['exam']){
            $data['question'] = ExamDetail::where('exam_master_id',$id)->orderBy('created_at','desc')->get();
            return view('admin.modules.exam.view_exam')->with($data);
        } else {
            return redirect()->back()->with('error','Somthing went be wrong.');
        }
    }

    /**
    *   Method      : deleteQuestion
    *   Description : This is use to deleteQuestion
    *   Author      : Pankaj
    *   Date        : 2020-Sep-11
    **/
    public function deleteQuestion(Request $request , $id){
        $delQues= ExamDetail::where('id',$id)->first();
        if($delQues){
            ExamMaster::where('id',$delQues->exam_master_id)->decrement('questions_added',1);
            $delQues->delete();
            $examMaster = ExamMaster::where('id',$delQues->exam_master_id)->first();
            if($examMaster->questions_added<$examMaster->total_questions){
                $examMaster->update(['is_complete'=>'NO']);
            }
            return redirect()->back()->with('success','Question deleted successfully.');
        } else {
            return redirect()->back()->with('error','Somthing went be wrong.');
        }
    }

    /**
    *   Method      : viewQuestion
    *   Description : This is use to viewQuestion
    *   Author      : Pankaj
    *   Date        : 2020-Sep-11
    **/
    public function viewQuestion(Request $request , $id){
        $data['question'] = ExamDetail::with('getExam')->where('id',$id)->first();
        if($data['question']){
            return view('admin.modules.exam.view_question')->with($data);
        } else {
            return redirect()->back()->with('error','Somthing went be wrong.');
        }
    }

    /**
    *   Method      : addQuestion
    *   Description : This is use to addQuestion page
    *   Author      : Pankaj
    *   Date        : 02-09-2020
    **/
    public function addQuestion(Request $request,$id=null,$question_id=null){
    	if($request->all()){
            $request->validate([
                // 'question'      => 'required',
                // 'answer_1'   	=> 'required',
                // 'answer_2'   	=> 'required',
                // 'answer_3'   	=> 'required',
                // 'answer_4'   	=> 'required',
                'qs_version'=> 'required',
                'correct_answer'=> 'required',
            ]);

            $ExamQuestion = new ExamDetail();
            $ExamQuestion->exam_master_id = $request->exam_master_id;
            $ExamQuestion->qs_version = $request->qs_version;
            $ExamQuestion->status = $request->status;

            if($request->uddipok_text){
                $ExamQuestion->uddipok = $request->uddipok_text;
            }else{
                $image = $request->uddipok_image;
                $filename1 = time().'-'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
                Storage::putFileAs('question', $image, $filename1);
                $ExamQuestion->uddipok_image = $filename1;
            }

            if($request->question){
                $ExamQuestion->question = $request->question;
            }else{
                $image = $request->question_image;
                $filename2 = time().'-'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
                Storage::putFileAs('question', $image, $filename2);
                $ExamQuestion->question_image = $filename2;
            }

            if($request->answer_1){
                $ExamQuestion->answer_1 = $request->answer_1;
            }else{
                $image = $request->answer_1_image;
                $filename3 = time().'-'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
                Storage::putFileAs('question', $image, $filename3);
                $ExamQuestion->answer_1_image = $filename3;
            }
            
            if($request->answer_2){
                $ExamQuestion->answer_2 = $request->answer_2;
            }else{
                $image = $request->answer_2_image;
                $filename4 = time().'-'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
                Storage::putFileAs('question', $image, $filename4);
                $ExamQuestion->answer_2_image = $filename4;
            }

            if($request->answer_3){
                $ExamQuestion->answer_3 = $request->answer_3;
            }else{
                $image = $request->answer_3_image;
                $filename5 = time().'-'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
                Storage::putFileAs('question', $image, $filename5);
                $ExamQuestion->answer_3_image = $filename5;
            }
            
            if($request->answer_4){
                $ExamQuestion->answer_4 = $request->answer_4;
            }else{
                $image = $request->answer_4_image;
                $filename6 = time().'-'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
                Storage::putFileAs('question', $image, $filename6);
                $ExamQuestion->answer_4_image = $filename6;
            }
            
            if($request->cor_des_text){
                $ExamQuestion->cor_des = $request->cor_des_text;
            }else{
                $image = $request->cor_des_image;
                $filename7 = time().'-'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
                Storage::putFileAs('question', $image, $filename7);
                $ExamQuestion->cor_des_image = $filename7;
            }
            $ExamQuestion->correct_answer =  $request->correct_answer;   
            $ExamQuestion->save();

            ExamMaster::where('id', $request->exam_master_id)->increment('questions_added',1);
            $examMaster = ExamMaster::where('id', $request->exam_master_id)->first();
            if($examMaster->questions_added>=$examMaster->total_questions){
                $examMaster->update(['is_complete'=>'YES']);
            }

            return redirect()->route('view.exam', $request->exam_master_id)->with('success','Question added successfully.');


            // if($request->type=='TEXT'){
            //     $ExamQuestion['qs_version'] = $request->qs_version;
            //     $ExamQuestion['question'] = $request->question;
            //     $ExamQuestion['answer_1'] = $request->answer_1;
            //     $ExamQuestion['answer_2'] = $request->answer_2;
            //     $ExamQuestion['answer_3'] = @$request->answer_3;
            //     $ExamQuestion['answer_4'] = @$request->answer_4;                
            // }
            // if($request->type=='IMAGE'){
            //     if(@$request->question){
            //         $image = $request->question;
            //         $filename1 = time().'-'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
            //         Storage::putFileAs('question', $image, $filename1);
            //         $ExamQuestion['question'] = $filename1;
            //     }
            //     if(@$request->answer_1){
            //         $image = $request->answer_1;
            //         $filename2 = time().'-'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
            //         Storage::putFileAs('question', $image, $filename2);
            //         $ExamQuestion['answer_1'] = $filename2;
            //     }
            //     if(@$request->answer_2){
            //         $image = $request->answer_2;
            //         $filename3 = time().'-'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
            //         Storage::putFileAs('question', $image, $filename3);
            //         $ExamQuestion['answer_2'] = $filename3;
            //     }
            //     if(@$request->answer_3){
            //         $image = $request->answer_3;
            //         $filename4 = time().'-'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
            //         Storage::putFileAs('question', $image, $filename4);
            //         $ExamQuestion['answer_3'] = $filename4;
            //     }
            //     if(@$request->answer_4){
            //         $image = $request->answer_4;
            //         $filename5 = time().'-'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
            //         Storage::putFileAs('question', $image, $filename5);
            //         $ExamQuestion['answer_4'] = $filename5;
            //     }            
            // }


            // $ExamQuestion['correct_answer'] = $request->correct_answer;           
            // if (@$request->question_id) {
            // 	ExamDetail::where('id',$request->ques ion_id)->update($ExamQuestion);
            // 	return redirect()->route('view.exam',$request->exam_master_id)->with('success','Question updated successfully.');
            // } 
            // else {
            //     $ExamQuestion['exam_master_id'] = $request->exam_master_id;
            //     $ExamQuestion['type'] = $request->type;
	           //  $storeQues = ExamDetail::create($ExamQuestion);
	           //  if ($storeQues) {
	           //  	ExamMaster::where('id',$storeQues->exam_master_id)->increment('questions_added',1);
            //         $examMaster = ExamMaster::where('id',$storeQues->exam_master_id)->first();
            //         if($examMaster->questions_added>=$examMaster->total_questions){
            //             $examMaster->update(['is_complete'=>'YES']);
            //         }
	           //  }
	           //  return redirect()->route('view.exam',$request->exam_master_id)->with('success','Question added successfully.');
            // }
        }
     //    if (@$question_id) {
     //    	$data['question']=ExamDetail::where('id',$question_id)->first();
     //    }
    	// return view('admin.modules.exam.add_question')->with(@$data);
    }

    public function addExamQuestion()
    {
        return view('admin.modules.question.add_question');
    }

    public function editExamQuestion($id, $ques_id)
    {
        $question = ExamDetail::where('id',$ques_id)->first();
        $exam_master = ExamMaster::where('id',$id)->first();
        return view('admin.modules.question.edit_question', compact('question', 'exam_master'));
    }

    public function updateQuestion(Request $request, $id)
    {
            $ExamQuestion = ExamDetail::find($id);
            $ExamQuestion->exam_master_id = $request->exam_master_id;
            $ExamQuestion->qs_version = $request->qs_version;
            $ExamQuestion->status = $request->status;

            if($request->uddipok_text){
                $ExamQuestion->uddipok = $request->uddipok_text;
            }else{
                $image = $request->uddipok_image;
                if($image){
                    $filename1 = time().'-'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
                    Storage::putFileAs('question', $image, $filename1);
                    @unlink(storage_path('app/question/'.@$ExamQuestion->uddipok_image));
                    $ExamQuestion->uddipok_image = $filename1;
                }
            }

            if($request->question){
                $ExamQuestion->question = $request->question;
            }else{
                $image = $request->question_image;
                if($image){
                    $filename2 = time().'-'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
                    Storage::putFileAs('question', $image, $filename2);
                    @unlink(storage_path('app/question/'.@$ExamQuestion->question_image));
                    $ExamQuestion->question_image = $filename2;
                }
            }

            if($request->answer_1){
                $ExamQuestion->answer_1 = $request->answer_1;
            }else{
                $image = $request->answer_1_image;
                if($image){
                    $filename3 = time().'-'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
                    Storage::putFileAs('question', $image, $filename3);
                    @unlink(storage_path('app/question/'.@$ExamQuestion->answer_1_image));
                    $ExamQuestion->answer_1_image = $filename3;
                }
            }
            
            if($request->answer_2){
                $ExamQuestion->answer_2 = $request->answer_2;
            }else{
                $image = $request->answer_2_image;
                if($image){
                    $filename4 = time().'-'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
                    Storage::putFileAs('question', $image, $filename4);
                    $ExamQuestion->answer_2_image = $filename4;
                    @unlink(storage_path('app/question/'.@$ExamQuestion->answer_2_image));
                }
            }

            if($request->answer_3){
                $ExamQuestion->answer_3 = $request->answer_3;
            }else{
                $image = $request->answer_3_image;
                if($image){
                    $filename5 = time().'-'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
                    Storage::putFileAs('question', $image, $filename5);
                    @unlink(storage_path('app/question/'.@$ExamQuestion->answer_3_image));
                    $ExamQuestion->answer_3_image = $filename5;
                }
            }
            
            if($request->answer_4){
                $ExamQuestion->answer_4 = $request->answer_4;
            }else{
                $image = $request->answer_4_image;
                if($image){
                    $filename6 = time().'-'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
                    Storage::putFileAs('question', $image, $filename6);
                    @unlink(storage_path('app/question/'.@$ExamQuestion->answer_4_image));
                    $ExamQuestion->answer_4_image = $filename6;
                }
            }
            
            if($request->cor_des_text){
                $ExamQuestion->cor_des = $request->cor_des_text;
            }else{
                $image = $request->cor_des_image;
                if($image){
                    $filename7 = time().'-'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
                    Storage::putFileAs('question', $image, $filename7);
                    @unlink(storage_path('app/question/'.@$ExamQuestion->cor_des_image));
                    $ExamQuestion->cor_des_image = $filename7;
                }
            }
            $ExamQuestion->correct_answer =  $request->correct_answer;   
            $ExamQuestion->save();


            return redirect()->back()->with('success','Question Updated successfully.');
    }

}

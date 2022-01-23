<?php

namespace App\Http\Controllers\Modules\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\NoticeBoard;
use App\Models\Publication;
use App\Models\Slider;
use App\Models\Faq;
use App\Models\NoticeBoardTitle;
use App\Models\Testimonial;
use App\Models\Fact;
use App\User;
use App\Admin;

class HomeController extends Controller
{
    public function viewHome()
    {
    	$data['course'] = Course::where('parent_id','>',0)->orderBy('id','desc')->get()->take(6);
        $data['notice'] = NoticeBoard::orderBy('id','desc')->get()->take(3);
        $data['total_course'] = Course::where('parent_id','>',0)->count();
        $data['total_student'] = User::where('status','!=','D')->count();
        $data['total_teacher'] = Admin::where('type','T')->where('status','!=','D')->count();
        $data['total_manager'] = Admin::where('type','B')->where('status','!=','D')->count();
        $data['teacher'] = Admin::where('type','T')->where('status','!=','D')->orderBy('id','desc')->get()->take(6);
        $data['faq'] = Faq::orderBy('id','desc')->get();
        $data['publ'] = Publication::orderBy('id','desc')->get()->take(3);
        $data['sliders'] = Slider::orderBy('id','desc')->get();
        $data['notice_board_title'] = NoticeBoardTitle::first();
        $data['fact'] = Fact::first();
        $data['testimonials'] = Testimonial::where('status', 1)->orderBy('created_at', 'desc')->get();
    	//dd($data);
    	return view('modules.home.home')->with($data);
    }

}

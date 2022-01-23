<?php

namespace App\Http\Controllers\Admin\Modules\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\NoticeBoard;
use App\Admin;


class DashboardController extends Controller
{
    public function dashboard(){
    	
    	$data['teacher'] = Admin::where('type','T')->where('status','A')->count();
    	$data['branch_manager'] = Admin::where('type','B')->where('status','A')->count();
    	$data['course'] = Course::count();
    	$data['notice'] = NoticeBoard::count();
    	//dd($data);
    	return view('admin.modules.dashboard.dashboard')->with($data);
    }
}

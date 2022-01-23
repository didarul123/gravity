<?php

namespace App\Http\Controllers\Admin\Modules\NoticeBoard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NoticeBoard;
use App\Models\NoticeBoardTitle;

class NoticeBoardController extends Controller
{
    public function manageNoticeBoard(Request $request)
   {
   		$data['notice'] = NoticeBoard::where('status','!=','D')->orderBy('created_at','desc');
        if ($request->all()) {
            if (@$request->keyword) {
                $data['notice'] = $data['notice']->where('title', 'like', '%' . $request->keyword . '%');
            }
            
            if (@$request->status) {
                $data['notice'] = $data['notice']->where('status', $request->status);
            }
        }
        $data['notice'] = $data['notice']->get();
        $data['key'] = $request->all();
        $data['notice_board_title'] = NoticeBoardTitle::first();
   		return view('admin.modules.notice_board.manage_notice_board')->with($data);
   }


   public function createNoticeBoard(Request $request,$id=null){

        if($request->all()){
            $request->validate([
                'title'        => 'required',
                'description'   => 'required',
            ]);
            $notice['title'] = $request->title;
            $notice['description'] = $request->description;
            $notice['status'] = 'A';
        	
        	// if(@$request->image){
         //        $image = $request->image;
         //        $filename = time().'-'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
         //        Storage::putFileAs('branch_manager_image', $image, $filename);
         //        @unlink(storage_path('app/branch_manager_image/'.@$request->image));
         //        $student['image'] = $filename;
         //    }

            if(@$request->ID){
                NoticeBoard::where('id',$request->ID)->update($notice);
                return redirect()->route('manage.notice.board')->with('success','Notice Board updated successfully.');
            }
            $storeManager = NoticeBoard::create($notice);
            return redirect()->route('manage.notice.board')->with('success','Notice Board added successfully.');
        }
        $data['notice'] = NoticeBoard::where('id',@$id)->first();
        return view('admin.modules.notice_board.create_notice_board')->with(@$data);
    }


    public function deleteNoticeBoard(Request $request , $id){
        $del = NoticeBoard::where('id',$id)->first();
        if($del){
            NoticeBoard::where('id',$id)->update(['status'=>'D']);
            return redirect()->back()->with('success','Notice Board deleted successfully.');
        } else {
            return redirect()->back()->with('error','Somthing went be wrong.');
        }
    }

     public function viewNoticeBoard(Request $request , $id){
        $data['notice'] = NoticeBoard::where('id',$id)->first();
        if($data['notice']){
            return view('admin.modules.notice_board.notice_board_details')->with($data);
        } else {
            return redirect()->back()->with('error','Somthing went be wrong.');
        }
    }

    public function update_notice_board_title(Request $request, $id)
    {
        $data = NoticeBoardTitle::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->save();
        return redirect()->back()->with('success','Updated successfully.');
    }
}

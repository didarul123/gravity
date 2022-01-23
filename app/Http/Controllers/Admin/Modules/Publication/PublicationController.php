<?php

namespace App\Http\Controllers\Admin\Modules\Publication;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Publication;

class PublicationController extends Controller
{
    public function managePublication(Request $request)
    {
        $data['pub'] = Publication::orderBy('created_at','desc');
        if ($request->all()) {
            if (@$request->keyword) {
                $data['pub'] = $data['pub']->where('title', 'like', '%' . $request->keyword . '%');
            }
            
            // if (@$request->status) {
            //     $data['notice'] = $data['notice']->where('status', $request->status);
            // }
        }
        $data['pub'] = $data['pub']->get();
        $data['key'] = $request->all();
    	//$data['pub'] = Publication::get();
    	return view('admin.modules.publication.manage_publication')->with($data);
    }

    public function createPublication(Request $request,$id=null)
    {
        if($request->all()){
            $request->validate([
                'title'        => 'required',
                'description'   => 'required',
            ]);
            $pub['title'] = $request->title;
            $pub['description'] = $request->description;

            if(@$request->ID){
                Publication::where('id',$request->ID)->update($pub);
                return redirect()->route('manage.publication')->with('success','Publication updated successfully.');
            }
            $storeManager = Publication::create($pub);
            return redirect()->route('manage.publication')->with('success','Publication added successfully.');
        }
        $data['pub'] = Publication::where('id',@$id)->first();
    	return view('admin.modules.publication.create_publication')->with($data);
    }


     public function deletePublication($id)
    {
        $del = Publication::where('id',$id)->first();
        if($del){
            Publication::where('id',$id)->delete();
            return redirect()->back()->with('success','Publication deleted successfully.');
        } else {
            return redirect()->back()->with('error','Somthing went be wrong.');
        }
    }
}

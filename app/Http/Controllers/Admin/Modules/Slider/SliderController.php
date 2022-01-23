<?php

namespace App\Http\Controllers\Admin\Modules\Slider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Storage;

class SliderController extends Controller
{
    public function manageSlider(Request $request)
    {
        $data['slider'] = Slider::orderBy('created_at','desc');
        if ($request->all()) {
            if (@$request->keyword) {
                $data['slider'] = $data['slider']->where('title', 'like', '%' . $request->keyword . '%');
            }
          
        }
        $data['slider'] = $data['slider']->get();
        return view('admin.modules.slider.manage_slider')->with($data);
        // $data = Slider::orderBy('created_at','desc')->get();
        // return view('admin.modules.slider.manage_slider', compact('data'));
    }
    public function createSlider(Request $request,$id=null)
    {

        if($request->all()){
            $request->validate([
                'title'        => 'required',
                'description'   => 'required',
            ]);
            $slider['title'] = $request->title;
            $slider['description'] = $request->description;
            $slider['status'] = $request->status;

            if(@$request->image){
                $image = $request->image;
                $filename = time().'-'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
                Storage::putFileAs('slider', $image, $filename);
                @unlink(storage_path('app/slider/'.@$request->image));
                $slider['image'] = $filename;
            }

            if(@$request->ID){
                Slider::where('id',$request->ID)->update($slider);
                return redirect()->route('manage.slider')->with('success','Slider updated successfully.');
            }
            $storeManager = Slider::create($slider);
            return redirect()->route('manage.slider')->with('success','Slider added successfully.');
        }
        $data['slider'] = Slider::where('id',@$id)->first();
        return view('admin.modules.slider.create_slider')->with($data);

    }

    public function deleteSlider(Request $request , $id){
        $del = Slider::where('id',$id)->first();
        if($del){
            Slider::where('id',$id)->delete();
            return redirect()->back()->with('success','Slider deleted successfully.');
        } else {
            return redirect()->back()->with('error','Somthing went be wrong.');
        }
    }

}

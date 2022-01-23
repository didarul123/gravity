<?php

namespace App\Http\Controllers\Admin\Modules\Testimonial;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Storage;
use Image;

class TestimonialController extends Controller
{
    public function manageTestimonial(Request $request)
    {
        $data['testimonial'] = Testimonial::orderBy('created_at','desc');
        if ($request->all()) {
            if (@$request->keyword) {
                $data['testimonial'] = $data['testimonial']->where('title', 'like', '%' . $request->keyword . '%');
            }
          
        }
        $data['testimonial'] = $data['testimonial']->get();
        return view('admin.modules.testimonial.manage_testimonial')->with($data);
    }

    public function createTestimonial(Request $request,$id=null)
    {

        if($request->all()){
            $request->validate([
                'full_name'        => 'required',
                'description'   => 'required',
            ]);
            $testimonial['full_name'] = $request->full_name;
            $testimonial['description'] = $request->description;
            $testimonial['status'] = $request->status;

            if(@$request->image){
                $image = $request->image;
                $filename = time().'-'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
                $upload_path = Storage::putFileAs('testimonial', $image, $filename);
                @unlink(storage_path('app/testimonial/'.@$request->image));
                $testimonial['image'] = $filename;
            }

            if(@$request->ID){
                Testimonial::where('id',$request->ID)->update($testimonial);
                return redirect()->route('manage.testimonial')->with('success','Testimonial updated successfully.');
            }
            $storeManager = Testimonial::create($testimonial);
            return redirect()->route('manage.testimonial')->with('success','Testimonial added successfully.');
        }
        $data['testimonial'] = Testimonial::where('id',@$id)->first();
        return view('admin.modules.testimonial.create_testimonial')->with($data);

    }

    public function deleteTestimonial(Request $request , $id){
        $del = Testimonial::where('id',$id)->first();
        if($del){
            Testimonial::where('id',$id)->delete();
            return redirect()->back()->with('success','Testimonial deleted successfully.');
        } else {
            return redirect()->back()->with('error','Somthing went be wrong.');
        }
    }


}

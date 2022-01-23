<?php

namespace App\Http\Controllers\Admin\Modules\Fact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fact;

class FactController extends Controller
{
    public function manageFact()
    {
        $fact = Fact::first();
        return view('admin.modules.fact.create_fact', compact('fact'));
    }

    public function createSlider(Request $request, $id)
    {
       $data = Fact::find($id);
       $data->title = $request->title;
       $data->description = $request->description;
       $data->teachers = $request->teachers;
       $data->branch_managers = $request->branch_managers;
       $data->students = $request->students;
       $data->courses = $request->courses;
       $data->save();

       return redirect()->back()->with('success','Updated successfully.');
    }
}

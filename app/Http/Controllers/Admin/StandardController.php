<?php

namespace App\Http\Controllers\Admin;

use App\Models\Branch;
use App\Models\Standard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StandardController extends Controller
{
    public function index(Request $request,$id)
    {
        $standard=Standard::where('branch_id',$id)->get();
        $request->ids=$id;
        $data=$request->ids;
        $branch=Branch::findOrFail($id);
        return view('admin.school.Standard.index',compact('standard','data','branch'));
    }
   

    public function store(Request $request)
    {
        $standard = new Standard;

        $standard->branch_id=$request->ids;
        $standard->std_name=$request->std_name;
        $standard->sem=$request->sem==true ? '1':'0';
        $standard->pass_percentage=$request->pass_percentage;
        $standard->grade=$request->grade;
        $standard->age_limit=$request->age_limit;
        $standard->notes=$request->notes;
        $standard->max_limit=$request->max_limit;
        $standard->status=$request->status==true? '1':'0';
        $standard->save();

        return back()->with('status',"Standard Added Successfully");
        
    }
    public function edit(Request $request,$id)
    {
        $request->ids=$id;
        $data=$request->ids;
        $standard=Standard::findOrFail($id);
        
        return view('admin.school.Standard.edit',compact('standard','data'));
    }
    public function update(Request $request,$id)
    {
        $standard=Standard::findOrFail($id);

        $standard->branch_id=$request->ids;
        $standard->std_name=$request->std_name;
        $standard->sem=$request->sem==true ? '1':'0';
        $standard->pass_percentage=$request->pass_percentage;
        $standard->grade=$request->grade;
        $standard->age_limit=$request->age_limit;
        $standard->notes=$request->notes;
        $standard->max_limit=$request->max_limit;
        $standard->status=$request->status==true? '1':'0';
        $standard->update();

        return redirect('admin/manageschool')->with('status',"Standard Updated Successfully");
    }
    public function delete($id)
    {
        $standard=Standard::findOrFail($id);
        if($standard)
        {
            $standard->trash='0';
            $standard->save();
        }

        return redirect('admin/manageschool')->with('status',"Standard Deleted Successfully");
    }
}

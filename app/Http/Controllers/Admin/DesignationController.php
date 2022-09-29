<?php

namespace App\Http\Controllers\Admin;

use App\Models\Designation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DesignationController extends Controller
{
    public function index()
    {
        $designation=Designation::where('Status','1')->where('Trash','1')->get();
        return view('admin.staff.designation.index',compact('designation'));
    }
    public function store(Request $request)
    {
        $designation = new Designation;
        
        $designation->Designation=$request->Designation;
        $designation->save();

        return back()->with('status','Designation Added Successfully');
    }
    public function edit($id)
    {
        $designation=Designation::findOrFail($id);
        if($designation)
        {
            return response()->json([
                'status'=>200,
                'designation'=>$designation,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Designation Not Found',
            ]);
        }
    }
    public function update(Request $request,$id)
    {
        $designation=Designation::findOrFail($id);

        if($designation)
        {
            $designation->Designation=$request->Designation;
            $designation->update();
            return response()->json([
                'status'=>200,
                'message'=>'Designation Updated Successfully',
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Designation Not Found',
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DivisionController extends Controller
{
    public function index(Request $request,$id)
    {
        $division=Division::where('status','1')->where('trash','1')->where('standard_id',$id)->get();
        // echo "<pre>";
        // print_r($division);
        // print_r($id);
        // exit;
        $request->ids=$id;
        $data=$request->ids;
        return view('admin.school.Division.index',compact('division','data'));
    }
   
    public function store(Request $request)
    {
        $division= new Division;

        $division->standard_id=$request->ids;
        $division->division=$request->division;
        $division->max_limit=$request->max_limit;
        $division->status=$request->status==true ? '1':'0';
        $division->save();

        return back()->with('status','Division Added Successfuly');
    }
    public function edit(Request $request,$id)
    {
        $division=Division::findOrFail($id);
        $request->ids=$id;
        $data=$request->ids;
        return view('admin.school.Division.edit',compact('division','data'));
    }
    public function update(Request $request,$id)
    {
       $division=Division::findOrFail($id);

       
        $division->division=$request->division;
        $division->max_limit=$request->max_limit;
        $division->status=$request->status==true ? '1':'0';
        $division->update();

        return back()->with('status','Division Updated Successfuly');
    }
}

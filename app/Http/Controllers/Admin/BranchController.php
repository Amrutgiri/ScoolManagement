<?php

namespace App\Http\Controllers\Admin;

use App\Models\Board;
use App\Models\Branch;
use App\Models\Medium;
use App\Models\School;
use App\Models\Standard;
use App\Models\Branchtype;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BranchController extends Controller
{
    public function index()
    {
        $school=School::where('id',1)->first();
        $board=Board::where('status',1)->get();
        $medium=Medium::all();
        $branchtype=Branchtype::where('status',1)->get();
        $standard=Standard::where('status',1)->where('trash',1)->get();
        $branch=Branch::where('status','1')->where('trash','1')->get();
        return view('admin.school.Branch.index',compact('branch','board','medium','branchtype','standard'));
    }
    // public function index_view()
    // {
    //     $branch=Branch::where('status','1')->where('trash','1')->get();
    //     return view('admin.school.Branch.index',compact('branch'));
    // }
    public function edit($id)
    {
        $school=School::where('id',1)->first();
        $board=Board::where('status',1)->get();
        $medium=Medium::all();
        $branchtype=Branchtype::where('status',1)->get();
        $branch=Branch::findOrFail($id);
        return view('admin.school.Branch.edit',compact('school','board','medium','branchtype','branch'));
    }
    public function store(Request $request)
    {
        $branch = new Branch;
        
        $branch->branch_name=strtoupper($request->branch_name);
        $branch->board=$request->board;
        $branch->medium=$request->medium;
        $branch->branch_type=$request->branch_type;
        $branch->indexno=$request->indexno;
        if($request->hasfile('principal_sign'))
        {
            $file=$request->file('principal_sign');
            $filename='principal_sign'.time().'.'.$file->getClientOrigianlExtension();
            $file->move('uploads/principal/',$filename);
            $branch->principal_sign=$filename;
        }
        $branch->save();

        return back()->with('status',"Branch Added Successfully");
    }
    public function update(Request $request,$id)
    {
        $branch=Branch::findOrFail($id);

        $branch->branch_name=strtoupper($request->branch_name);
        $branch->board=$request->board;
        $branch->medium=$request->medium;
        $branch->branch_type=$request->branch_type;
        $branch->indexno=$request->indexno;
        if($request->hasfile('principal_sign'))
        {
            $destination='uploads/principal/'.$branch->principal_sign;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file=$request->file('principal_sign');
            $filename='principal_sign'.time().'.'.$file->getClientOrigianlExtension();
            $file->move('uploads/principal/',$filename);
            $branch->principal_sign=$filename;
        }
        $branch->update();

        return back()->with('status',"Branch Updated Successfully");
    }
    public function delete($id)
    {
        $branch=Branch::findOrFail($id);

        if($branch)
        {
            $branch->trash='0';
            $branch->save();
        }
        return back()->with('status',"Branch Deleted Successfully");
    }
}

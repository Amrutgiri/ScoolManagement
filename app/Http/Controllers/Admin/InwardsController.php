<?php

namespace App\Http\Controllers\Admin;

use App\Models\Inward;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\InwardRequest;
use Illuminate\Support\Facades\File;

class InwardsController extends Controller
{
    public function index()
    {
        $inwards=Inward::where('trash','1')->get();
        return view('admin.school.inwards.index',compact('inwards'));
    }
    public function store(InwardRequest $request)
    {
        
        $inwards=new Inward;

        $inwards->Date=$request->Date;
        $inwards->RecieveFrom=$request->RecieveFrom;
        $inwards->Title=$request->Title;
        if($request->hasfile('Document'))
        {
            $file=$request->file('Document');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/inward/',$filename);
            $inwards->Document=$filename;
        }
        $inwards->Description=$request->Description;
        $inwards->save();

        return redirect('admin/inwards')->with('status','Inward Added Successfully');
        
    }
    public function edit($id)
    {
        $inwards=Inward::findOrFail($id);
        return view('admin.school.inwards.edit',compact('inwards'));
    }
    public function update(InwardRequest $request,$id)
    {
        $inwards=Inward::findOrFail($id);

        $inwards->Date=$request->Date;
        $inwards->RecieveFrom=$request->RecieveFrom;
        $inwards->Title=$request->Title;
        if($request->hasfile('Document'))
        {
            $destination='uploads/inward/'.$inwards->Document;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file=$request->file('Document');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/inward/',$filename);
            $inwards->Document=$filename;
        }
        $inwards->Description=$request->Description;
        $inwards->update();

        return redirect('admin/inwards')->with('status','Inward Updated Successfully');
    }
    public function delete($id)
    {
        $inwards=Inward::findOrFail($id);
        if($inwards)
        {
            $inwards->trash=0;
            $inwards->save();
        }
        return redirect('admin/inwards')->with('status','Inward Deleted Successfully');
    }
}

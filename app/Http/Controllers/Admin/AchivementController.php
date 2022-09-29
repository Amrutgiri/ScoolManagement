<?php

namespace App\Http\Controllers\Admin;

use App\Models\Achivement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AchivementController extends Controller
{
    public function index()
    {
        $achivement=Achivement::where('status','1')->where('trash','1')->get();
        return view('admin.website.achivement.index',compact('achivement'));
    }
    public function create()
    {
        return view('admin.website.achivement.create');
    }
    public function store(Request $request)
    {
        $achivement=new Achivement;

        $achivement->heading=$request->heading;
        $achivement->description=$request->description;
        if($request->hasfile('image'))
        {
            $file =$request->file('image');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/achivement/',$filename);
            $achivement->image=$filename;
        }
        $achivement->status=$request->status==true?'1':'0';
        $achivement->save();

        return redirect('admin/achivements')->with('status','Achivement Added Successfully !');

    }
    public function edit($id)
    {
        $achivement=Achivement::find($id);
        return view('admin.website.achivement.edit',compact('achivement'));
    }
    public function update(Request $request,$id)
    {
        $achivement=Achivement::find($id);

        $achivement->heading=$request->heading;
        $achivement->description=$request->description;
        if($request->hasfile('image'))
        {
            $destination ='uploads/achivement/'.$achivement->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file =$request->file('image');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/achivement/',$filename);
            $achivement->image=$filename;
        }
        $achivement->status=$request->status==true?'1':'0';
        $achivement->update();
        return redirect('admin/achivements')->with('status','Data Updated Successfully');
    }
    public function delete($id)
    {
        $achivement=Achivement::find($id);
        if($achivement)
        {
            $achivement->trash='0';
            $achivement->update();
            return redirect('admin/achivements')->with('status','Data Deleted');
        }
        else
        {
            return redirect('admin/achivements')->with('status','Data Not Found');
        }
    }
}

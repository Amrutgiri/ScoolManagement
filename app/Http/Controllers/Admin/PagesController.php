<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class PagesController extends Controller
{
    public function index()
    {
        $aboutus=About::where('trash','1')->get();
        return view('admin.website.createpages.index',compact('aboutus'));
    }
    public function create()
    {
        return view('admin.website.createpages.create');
    }
    public function store(Request $request)
    {
        $aboutus=new About;

        $aboutus->heading=$request->heading;
        $aboutus->description=$request->description;
        if($request->hasfile('image'))
        {
            $file=$request->file('image');
            $filename='about-'.time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/aboutus/',$filename);
            $aboutus->image=$filename;
        }
        $aboutus->status=$request->status==true?'1':'0';
        $aboutus->save();

        return redirect('admin/createpages')->with('status',"Data Added Successfully !");
    }
    public function edit($id)
    {
        $aboutus=About::find($id);
        return view('admin.website.createpages.edit',compact('aboutus'));
    }
    public function update(Request $request,$id)
    {
        $aboutus=About::find($id);

        $aboutus->heading=$request->heading;
        $aboutus->description=$request->description;
        if($request->hasfile('image'))
        {   
            $destination ='uploads/aboutus/'.$aboutus->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file=$request->file('image');
            $filename='about-'.time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/aboutus/',$filename);
            $aboutus->image=$filename;
        }
        $aboutus->status=$request->status==true?'1':'0';
        $aboutus->update();

        return redirect('admin/createpages')->with('status',"Data Added Successfully !");
    }
    public function delete($id)
    {
        $createpage=About::find($id);

        if($createpage)
        {
            $createpage->trash='0';
            $createpage->save();

            return redirect('admin/createpages')->with('status',"Data Deleted Successfully !");
        }
        else
        {
            return redirect('admin/createpages')->with('status',"Record Not Found !");
        }
    }
}

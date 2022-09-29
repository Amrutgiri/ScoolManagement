<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedback=Feedback::where('status','1')->where('trash','1')->get();
        return view('admin.website.feedback.index',compact('feedback'));
    }
    public function store(Request $request)
    {
        $feedback = new Feedback;
        $feedback->stud_name=$request->stud_name;
        $feedback->stud_edu_year=$request->stud_edu_year;
        if($request->hasfile('stud_image'))
        {
            $file =$request->file('stud_image');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/feedback/',$filename);
            $feedback->stud_image=$filename;
        }
        $feedback->stud_feedback=$request->stud_feedback;
        $feedback->status=$request->status==true?'1':'0';
        $feedback->save();

        return redirect('admin/feedback')->with('status','Feedback Added Successfuly');
    }
    public function edit($id)
    {
        $feedback=Feedback::find($id);
        return view('admin.website.feedback.edit',compact('feedback'));
    }
    public function update(Request $request,$id)
    {
        $feedback=Feedback::find($id);

        $feedback->stud_name=$request->stud_name;
        $feedback->stud_edu_year=$request->stud_edu_year;
        if($request->hasfile('stud_image'))
        {
            $destination ='uploads/feedback/'.$feedback->stud_image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file =$request->file('stud_image');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/feedback/',$filename);
            $feedback->stud_image=$filename;
        }
        $feedback->stud_feedback=$request->stud_feedback;
        $feedback->status=$request->status==true?'1':'0';
        $feedback->update();

        return redirect('admin/feedback')->with('status','Feedback Updated Successfuly');
    }
    public function delete($id)
    {
        $feedback=Feedback::find($id);

        if($feedback)
        {
            $feedback->trash='0';
            $feedback->save();
        }
        return redirect('admin/feedback')->with('status','Feedback Deleted Successfuly');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications=Notification::where('trash',0)->get();
        return view('admin.website.notification.index',compact('notifications'));
    }
    public function store(Request $request)
    {
        $notification = new Notification;

        $notification->heading=$request->heading; 
        $notification->description=$request->description; 
        if($request->hasfile('docs'))
        {
            $file=$request->file('docs');
            $filename='notifi-'.time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/notification/',$filename);
            $notification->docs=$filename;
        }
        $notification->start_date=$request->start_date;
        $notification->end_date=$request->end_date;  
        $notification->status=$request->status==true?'1':'0';
        $notification->save();
        
        return back()->with('status',"Notification Addedd Successfully");

    }
    public function edit($id)
    {
       
        $notifications=Notification::find($id);
        return view('admin.website.notification.edit',compact('notifications'));
    }
    public function update(Request $request,$id)
    {
        $notification=Notification::findOrFail($id);

        $notification->heading=$request->heading; 
        $notification->description=$request->description; 
        if($request->hasfile('docs'))
        {
            $destination ='uploads/notification/'.$notification->docs;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file=$request->file('docs');
            $filename='notifi-'.time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/notification/',$filename);
            $notification->docs=$filename;
        }
        $notification->start_date=$request->start_date;
        $notification->end_date=$request->end_date;  
        $notification->status=$request->status==true?'1':'0';
        $notification->update();
        
        return redirect('admin/notifications')->with('status',"Notification Updated Successfully");

    }
}

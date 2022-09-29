<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use App\Models\Gallerybulk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    public function index()
    {
        $album=Gallery::where('status','1')->where('trash','1')->get();
        return view('admin.website.gallery.index',compact('album'));
    }
    public function create_albume(Request $request)
    {
        $album=new Gallery;

        $album->title=$request->title;
        $album->description=$request->description;
        $album->event_date=$request->event_date;
        $album->status=$request->status==true?'1':'0';
        $album->save();
        return redirect('admin/gallery')->with('status','Album Created Successfully');
    }
    public function upload_view($id)
    {
       $gview=Gallery::find($id);
       $aview=Gallerybulk::where('album_id',$id)->get();
        return view('admin.website.gallery.albumview',compact('gview','aview'));
    }
    public function store_multiple(Request $request)
    {

        foreach($request->file('images') as $file)
        {
            $bulk= new Gallerybulk;

            $image_name='gallery-';
            $ext=strtolower($file->getClientOriginalExtension());
            $fullname=$image_name.'.'.$ext;
            $upload_path='uploads/gallery/';
            $image_url=$upload_path.$fullname;
            $file->move($upload_path,$fullname);
            $bulk->image=$image_url;
            $bulk->album_id=$request->iid;
            $bulk->save();
        }
        return back()->with('status','Images Upload Successfully');
    }
}

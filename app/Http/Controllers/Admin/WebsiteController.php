<?php

namespace App\Http\Controllers\Admin;

use App\Models\School;
use App\Models\Carousel;
use Illuminate\Http\Request;
use App\Models\Welcomesetion;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class WebsiteController extends Controller
{
    public function index()
    {
        $schools=School::find(1);
        return view('admin.website.schoolinfo',compact('schools'));

    }
    public function store(Request $request)
    {
        $validator =Validator::make($request->all(),[
            'name'=> 'required|max:255',
            'trust_name'=> 'required',
            'address'=> 'required',
            'contact1' => 'required',
            'contact2'=> 'nullable',
            'email'=> 'required',
            
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        $schools=School::where('id','1')->first();
        
        if($schools)
        {
            
            $schools=School::where('id','1')->first();
            $schools->name=$request->name;
            $schools->trust_name=$request->trust_name;
            $schools->address=$request->address;
            $schools->contact1=$request->contact1;
            $schools->contact2=$request->contact2;
            $schools->email=$request->email;
            $schools->facebook=$request->facebook;
            $schools->instagram=$request->instagram;
            $schools->whatsapp=$request->whatsapp;
            $schools->twitter=$request->twitter;
            if($request->hasfile('school_logo'))
            {
                $destination ='uploads/school/'.$schools->school_logo;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file =$request->file('school_logo');
                $filename=time().'.'.$file->getClientOriginalExtension();
                $file->move('uploads/school/',$filename);
                $schools->school_logo=$filename;
            }
            $schools->status=$request->status==true?'1':'0';
            $schools->update();

            return redirect('admin/school_info')->with('status',"School Information Updated Successfully !");
        }
        else
        {
            $schools=new School;
            $schools->name=$request->name;
            $schools->trust_name=$request->trust_name;
            $schools->address=$request->address;
            $schools->contact1=$request->contact1;
            $schools->contact2=$request->contact2;
            $schools->email=$request->email;
            $schools->facebook=$request->facebook;
            $schools->instagram=$request->instagram;
            $schools->whatsapp=$request->whatsapp;
            $schools->twitter=$request->twitter;
            if($request->hasfile('school_logo'))
            {
                $file =$request->file('school_logo');
                $filename=time().'.'.$file->getClientOriginalExtension();
                $file->move('uploads/school/',$filename);
                $schools->school_logo=$filename;
            }
            $schools->status=$request->status==true?'1':'0';
            $schools->save();

            return redirect('admin/school_info')->with('status',"School Information Added Successfully !");
        }
    }
    public function carousel()
    {
        $carousel=Carousel::all();
        return view('admin.website.carousel.carousel',compact('carousel'));
    }
    public function addcarousel_store(Request $request)
    {
        $validator =Validator::make($request->all(),[
            'image'=> 'required|max:255',
            'description'=> 'required',
            
        ]);
        if($validator->fails())
        {
            return redirect('admin/carousel')->withErrors($validator);
        }
        $carousel=new Carousel;
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $filename='Carousel'.time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/carousel/',$filename);
            $carousel->image=$filename;
        }
        $carousel->description=$request->description;
        $carousel->status=$request->status==true?'1':'0';
        $carousel->save();

        return redirect('admin/carousel')->with('status','Carousel Added Successfully');

    }
    public function editCarousel($id)
    {
        $editcarousels=Carousel::find($id);
        return view('admin.website.carousel.edit',compact('editcarousels'));
    }
    public function updatecarousel(Request $request,$id)
    {
        $carousel=Carousel::find($id);
        if($request->hasfile('image'))
        {
            $destination ='uploads/carousel/'.$carousel->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file =$request->file('image');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/carousel/',$filename);
            $carousel->image=$filename;
        }
        $carousel->description=$request->description;
        $carousel->status=$request->status==true?'1':'0';
        $carousel->update();
        return redirect('admin/carousel')->with('status','Carousel Updated Successfully !');
    }
    public function deleteCarousel($id)
    {
        $carousel=Carousel::find($id);
        $carousel->delete();

        return redirect('admin/carousel')->with('status','Carousal Deleted !');
    }
    public function welcomesection()
    {
        $sections=Welcomesetion::where('id','1')->first();
        return view('admin.website.welcomesection.index',compact('sections'));
    }
   
    public function section_store(Request $request,$id)
    {

            $section=Welcomesetion::findOrFail($id);
            
            if($request->hasfile('image'))
            {
                $destination ='uploads/welcome/'.$section->image;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file =$request->file('image');
                $filename=time().'.'.$file->getClientOriginalExtension();
                $file->move('uploads/welcome/',$filename);
                $section->image=$filename;
            }
            $section->heading=$request->heading;
            $section->description=$request->description;
            $section->status=$request->status==true?'1':'0';
            $section->update();
            return redirect('admin/welcomesection')->with('status','Section Addedd Successfully !');

    }
    
    public function update_section(Request $request,$sid)
    {
       
       

            $section=Welcomesetion::find($sid);
            if($section)
            {
                
                $section->heading=$request->input('heading');
                $section->description=$request->input('description');
                $section->status=$request->input('status')==true?'1':0;
    
                $section->update();
                
                
              
            
        }

    }
}

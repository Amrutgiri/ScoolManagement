<?php

namespace App\Http\Controllers\Admin;

use Barryvdh\DomPDF\PDF;
use App\Models\Letterpad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class LetterpadController extends Controller
{
    public function index()
    {
        $letterpad=Letterpad::where('trash','1')->get();
        return view('admin.school.letterpad.index',compact('letterpad'));
    }
    public function create()
    {
        return view('admin.school.letterpad.create');
    }
    public function store(Request $request)
    {
        $letterpad = new Letterpad;
        
        $letterpad->header_name=$request->header_name;
        $letterpad->border=$request->border==true ? '1':'0';
        if($request->hasfile('bgimage'))
        {
            $file=$request->file('bgimage');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/letterpad/',$filename);
            $letterpad->bgimage=$filename;
        }
        if($request->hasfile('bgwatermark'))
        {
            $file=$request->file('bgwatermark');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/letterpad/',$filename);
            $letterpad->bgwatermark=$filename;
        }
        $letterpad->report=$request->report;
        $letterpad->save();

        return redirect('admin/letterpad')->with('status','Latterpad Added !');

    }
    public function edit($id)
    {
        $letterpad=Letterpad::findOrFail($id);
        return view('admin.school.letterpad.edit',compact('letterpad'));
    }
    public function update(Request $request,$id)
    {
        $letterpad=Letterpad::findOrFail($id);

        $letterpad->header_name=$request->header_name;
        $letterpad->border=$request->border==true ? '1':'0';
        if($request->hasfile('bgimage'))
        {
            $destination='uploads/letterpad/'.$letterpad->bgimage;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file=$request->file('bgimage');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/letterpad/',$filename);
            $letterpad->bgimage=$filename;
        }
        if($request->hasfile('bgwatermark'))
        {
            $destination='uploads/letterpad/'.$letterpad->bgwatermark;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file=$request->file('bgwatermark');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/letterpad/',$filename);
            $letterpad->bgwatermark=$filename;
        }
        $letterpad->report=$request->report;
        $letterpad->update();

        return redirect('admin/letterpad')->with('status','Latterpad Updated !');
    }
    public function delete($id)
    {
        $letterpad=Letterpad::findOrFail($id);
        if($letterpad)
        {
            $letterpad->trash=0;
        }
        $letterpad->save();
        return redirect('admin/letterpad')->with('status','Latterpad Delete !');
    }
    public function view_report()
    {
        return view('admin.school.letterpad.view');
    }
    public function generatePDF($id)
    {
        $data=[
            'title'=>'test pdf',
            'date'=>date('d-m-Y')
        ];
        $pdf=PDF::loadView('testPDF',$data);

        return $pdf->download('testinf.pdf');
    }
}

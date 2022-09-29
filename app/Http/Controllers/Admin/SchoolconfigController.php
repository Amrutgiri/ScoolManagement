<?php

namespace App\Http\Controllers\Admin;

use App\Models\Schoolconfig;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SchoolconfigController extends Controller
{
    public function index()
    {
        $schoolconfig=Schoolconfig::where('id',1)->first();
        return view('admin.school.schoolconfig.index',compact('schoolconfig'));
    }
    public function store(Request $request)
    {
        $schoolconfig=Schoolconfig::where('id',1)->first();
        
        if($schoolconfig)
        {
            $schoolconfig->TermDate=$request->TermDate;
            $schoolconfig->AgeCompareDate=$request->AgeCompareDate;
            $schoolconfig->SenderName=$request->SenderName;
            $schoolconfig->Username=$request->Username;
            $schoolconfig->Password=md5($request->Password);
            $schoolconfig->Email=$request->Email;
            $schoolconfig->ShowBirthday=$request->ShowBirthday==true?'1':'0';
            $schoolconfig->ShowEvent=$request->ShowEvent==true?'1':'0';
            $schoolconfig->ShowExam=$request->ShowExam==true?'1':'0';
            $schoolconfig->ShowAttend=$request->ShowAttend==true?'1':'0';
            $schoolconfig->EventNotify=$request->EventNotify;
            $schoolconfig->ReportHeader=$request->ReportHeader;

            $schoolconfig->update();

            return back()->with('success','School Configuration Updated Successfully');
        }
        else
        {
            $schoolconfig = new Schoolconfig;

            $schoolconfig->TermDate=$request->TermDate;
            $schoolconfig->AgeCompareDate=$request->AgeCompareDate;
            $schoolconfig->SenderName=$request->SenderName;
            $schoolconfig->Username=$request->Username;
            $schoolconfig->Password=md5($request->Password);
            $schoolconfig->Email=$request->Email;
            $schoolconfig->ShowBirthday=$request->ShowBirthday==true?'1':'0';
            $schoolconfig->ShowEvent=$request->ShowEvent==true?'1':'0';
            $schoolconfig->ShowExam=$request->ShowExam==true?'1':'0';
            $schoolconfig->ShowAttend=$request->ShowAttend==true?'1':'0';
            $schoolconfig->EventNotify=$request->EventNotify;
            $schoolconfig->ReportHeader=$request->ReportHeader;

            $schoolconfig->save();

            return back()->with('success','School Configuration Set Successfully');
        }
        
    }
}

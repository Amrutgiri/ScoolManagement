<?php

namespace App\Http\Controllers\Admin;

use App\Models\Staff;
use App\Models\Branch;
use App\Models\Division;
use App\Models\Standard;
use App\Models\Designation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaffController extends Controller
{
    public function index()
    {
        $branch=Branch::where('status','1')->where('trash','1')->get();
        $staff=Staff::where('status','1')->where('trash','1')->get();
        return view('admin.staff.staff.index',compact('branch','staff'));
    }
    public function create()
    {
        $staff=Staff::where('status','1')->where('trash','1')->get();
        $designation=Designation::where('status','1')->where('trash','1')->get();
        $branch=Branch::where('status','1')->where('trash','1')->get();
        $standard=Standard::where('status','1')->where('trash','1')->get();
        $division=Division::where('status','1')->where('trash','1')->get();
        return view('admin.staff.staff.create',compact('branch','standard','division','staff','designation'));
    }
    public function store(Request $request)
    {
        $staff = new Staff;

        $staff->Designation=$request->Designation;
        $staff->Branch=$request->Branch;
        $staff->Surname=$request->Surname;
        $staff->FirstName=$request->FirstName;
        $staff->FatherHusbandName=$request->FatherHusbandName;
        $staff->AllowedBranch=implode(',',$request->AllowedBranch);
        $staff->AllowedStandard=implode(',',$request->AllowedStandard);
        $staff->ClassBranch=implode(',',$request->ClassBranch);
        $staff->ClassStandard=implode(',',$request->ClassStandard);
        $staff->ClassDivision=implode(',',$request->ClassDivision);
        $staff->AttBranch=implode(',',$request->AttBranch);
        $staff->AttStandard=implode(',',$request->AttStandard);
        $staff->AttDivision=implode(',',$request->AttDivision);
        $staff->Shift=$request->Shift;
        $staff->Senior=$request->Senior;
        $staff->AttendenceType=$request->AttendenceType;
        $staff->Gender=$request->Gender;
        $staff->Birthdate=$request->Birthdate;
        $staff->BloodGroup=$request->BloodGroup;
        $staff->MotherTongue=$request->MotherTongue;
        $staff->PersonType=$request->PersonType;
        $staff->MaritalStatus=$request->MaritalStatus;
        $staff->Remark=$request->Remark;
        $staff->Mobileno1=$request->Mobileno1;
        $staff->Mobileno2=$request->Mobileno2;
        $staff->WhatsApp=$request->WhatsApp;
        $staff->AddharNumber=$request->AddharNumber;
        $staff->District=$request->District;
        $staff->State=$request->State;
        $staff->Country=$request->Country;
        $staff->Pincode=$request->Pincode;
        $staff->NativeVillage=$request->NativeVillage;
        $staff->NativeTaluka=$request->NativeTaluka;
        $staff->NativeDistrict=$request->NativeDistrict;
        $staff->Email=$request->Email;
        $staff->JoiningDate=$request->JoiningDate;
        $staff->JobLeavingDate=$request->JobLeavingDate;
        $staff->PaymentType=$request->PaymentType;
        $staff->EmployeeNo=$request->EmployeeNo;
        $staff->BankName=$request->BankName;
        $staff->AccountNo=$request->AccountNo;
        $staff->BankBranch=$request->BankBranch;
        $staff->IFSCCode=$request->IFSCCode;
        $staff->ApplyPF=$request->ApplyPF==true?'1':'0';
        $staff->ApplyTDS=$request->ApplyTDS==true?'1':'0';
        $staff->ApplyTax=$request->ApplyTax==true?'1':'0';
        $staff->PFNumber=$request->PFNumber;
        $staff->Username=$request->Username;
        $staff->Password=md5($request->Password);

        if($request->hasfile('StaffProfile'))
        {
            $file=$request->file('StaffProfile');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/StaffProfile/',$filename);
            $staff->StaffProfile=$filename;
        }
        if($request->hasfile('StaffSign'))
        {
            $file=$request->file('StaffSign');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/StaffSign/',$filename);
            $staff->StaffSign=$filename;
        }
      
        $staff->save();

        
        return back()->with('status','Staff Added Successfully');
    }
    public function edit($id)
    {
        $staffs=Staff::findOrFail($id);
        $staff=Staff::where('status','1')->where('trash','1')->get();
        $designation=Designation::where('status','1')->where('trash','1')->get();
        $branch=Branch::where('status','1')->where('trash','1')->get();
        $standard=Standard::where('status','1')->where('trash','1')->get();
        $division=Division::where('status','1')->where('trash','1')->get();
        return view('admin.staff.staff.edit',compact('staffs','staff','designation','branch','standard','division'));
    }
    public function update(Request $request,$id)
    {
        $staff=Staff::findOrFail($id);
        $staff->Designation=$request->Designation;
        $staff->Branch=$request->Branch;
        $staff->Surname=$request->Surname;
        $staff->FirstName=$request->FirstName;
        $staff->FatherHusbandName=$request->FatherHusbandName;
        $staff->AllowedBranch=implode(',',$request->AllowedBranch);
        $staff->AllowedStandard=implode(',',$request->AllowedStandard);
        $staff->ClassBranch=implode(',',$request->ClassBranch);
        $staff->ClassStandard=implode(',',$request->ClassStandard);
        $staff->ClassDivision=implode(',',$request->ClassDivision);
        $staff->AttBranch=implode(',',$request->AttBranch);
        $staff->AttStandard=implode(',',$request->AttStandard);
        $staff->AttDivision=implode(',',$request->AttDivision);
        $staff->Shift=$request->Shift;
        $staff->Senior=$request->Senior;
        $staff->AttendenceType=$request->AttendenceType;
        $staff->Gender=$request->Gender;
        $staff->Birthdate=$request->Birthdate;
        $staff->BloodGroup=$request->BloodGroup;
        $staff->MotherTongue=$request->MotherTongue;
        $staff->PersonType=$request->PersonType;
        $staff->MaritalStatus=$request->MaritalStatus;
        $staff->Remark=$request->Remark;
        $staff->Mobileno1=$request->Mobileno1;
        $staff->Mobileno2=$request->Mobileno2;
        $staff->WhatsApp=$request->WhatsApp;
        $staff->AddharNumber=$request->AddharNumber;
        $staff->District=$request->District;
        $staff->State=$request->State;
        $staff->Country=$request->Country;
        $staff->Pincode=$request->Pincode;
        $staff->NativeVillage=$request->NativeVillage;
        $staff->NativeTaluka=$request->NativeTaluka;
        $staff->NativeDistrict=$request->NativeDistrict;
        $staff->Email=$request->Email;
        $staff->JoiningDate=$request->JoiningDate;
        $staff->JobLeavingDate=$request->JobLeavingDate;
        $staff->PaymentType=$request->PaymentType;
        $staff->EmployeeNo=$request->EmployeeNo;
        $staff->BankName=$request->BankName;
        $staff->AccountNo=$request->AccountNo;
        $staff->BankBranch=$request->BankBranch;
        $staff->IFSCCode=$request->IFSCCode;
        $staff->ApplyPF=$request->ApplyPF==true?'1':'0';
        $staff->ApplyTDS=$request->ApplyTDS==true?'1':'0';
        $staff->ApplyTax=$request->ApplyTax==true?'1':'0';
        $staff->PFNumber=$request->PFNumber;
        $staff->Username=$request->Username;
        $staff->Password=md5($request->Password);
       
        $staff->update();

        
        return back()->with('status','Staff Updated Successfully');
    }
    
}

@extends('admin.layouts.master')


@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('admin/staff')}}">Staff Manage</a></li>
                        <li class="breadcrumb-item">Edit Staff</li>

                    </ol>
                </div>
                
            </div>
        </div>
    </div>     
    <!-- end page title -->
    <div class="row mt-3 mb-3 justify-content-center">
        <div class="col-md-12">
            @if (session('status'))
            <h4 class="alert alert-warning">{{session('status')}}</h4>
            @endif
            <div class="card ribbon-box border border-dark shadow">
                <div class="card-header bg-dark">
                    <div class="ribbon ribbon-warning float-left shadow">
                        <h4>Edit Staff</h4>
                    </div>
                    
                </div>
                <form action="{{url('admin/update_staff/'.$staffs->id)}}" enctype="multipart/form-data" name="add_employee" id="form">
                    @csrf
                    @method('PUT')
                <div class="card-body">
                   
                        <div class="row">
                            <div class="col-md-2 bg-dark text-center">
                                <img src="{{asset('admin/images/no_image.png')}}" class="bg-white mt-2 mb-2" height="250px" width="200px" alt="">
                                <br><input type="file" name="StaffProfile" class="form-control mb-3 bg-dark" id="">
                                <img src="{{asset('admin/images/no_image.png')}}" class="bg-white mt-2 mb-2" height="50px" width="200px" alt="">
                                <br><input type="file" name="StaffSign" class="form-control mb-3 bg-dark" id="">
                            </div>
                            <div class="col-md-10 px-3" >
                                <ul class="nav nav-tabs nav-bordered">
                                    <li class="nav-item">
                                        <a href="#basic-b1" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                            Basic
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#contact-b1" data-toggle="tab" aria-expanded="true" class="nav-link ">
                                            Contact
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#qualification-b1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                            Qualification
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#bankdetails-b1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                            Bank Details
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#login-b1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                            Login
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="basic-b1">
                                        
                                        <div class="row" >
                                            <div class="col-md-6 mt-2 mb-2">
                                                <label for="">Designation<span class="text-danger">*</span></label> 
                                                <select name="Designation" id="" class="form-control">
                                                    <option value="{{$staffs->Designation}}">{{$staffs->Designation}}</option>
                                                    @foreach ($designation as $item)
                                                        <option value="{{$item->Designation}}">{{$item->Designation}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 mt-2 mb-2">
                                                Default Branch <span class="text-danger"></span>
                                                <select name="Branch" id="" class="form-control">
                                                    <option value="{{$staffs->Branch}}"> {{$staffs->Branch}} </option>
                                                    @foreach ($branch as $item)
                                                    <option value="{{$item->branch_name}}">{{$item->branch_name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 mt-2 mb-2">
                                                Surname <span class="text-danger">*</span>
                                                <input type="text" name="Surname" value="{{$staffs->Surname}}" class="form-control" id="">
                                            </div>
                                            <div class="col-md-4 mt-2 mb-2">
                                                First Name <span class="text-danger">*</span>
                                                <input type="text" name="FirstName" value="{{$staffs->FirstName}}" class="form-control" id="">
                                            </div>
                                            <div class="col-md-4 mt-2 mb-2">
                                                Father/Husband Name <span class="text-danger">*</span>
                                                <input type="text" name="FatherHusbandName" value="{{$staffs->FatherHusbandName}}" class="form-control" id="">
                                            </div>
                                            <div class="col-md-6 mt-2 mb-2">
                                                Allwoed Branch <span class="text-danger"></span>
                                                <select class="allowedbranch form-control" name="AllowedBranch[]" id="" multiple>
                                                    @php
                                                        $branch_array=explode(',',$staffs->AllowedBranch);
                                                    @endphp
                                                    @foreach ($branch_array as $row)
                                                        <option value="{{$row}}"><?php echo $row; ?></option>
                                                    @endforeach
                                                    @foreach ($branch as $item)
                                                        <option value="{{$item->branch_name}}">{{$item->branch_name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 mt-2 mb-2">
                                                Allwoed Standard <span class="text-danger"></span>
                                                <select class="allowedbranch form-control" name="AllowedStandard[]" id="" multiple>
                                                    @php
                                                        $branch_array=explode(',',$staffs->AllowedStandard);
                                                    @endphp
                                                    @foreach ($branch_array as $row)
                                                        <option value="{{$row}}"><?php echo $row; ?></option>
                                                    @endforeach
                                                    @foreach ($standard as $item)
                                                        <option value="{{$item->std_name}}">{{$item->std_name}} ({{$item->Branch->branch_name}}) </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            
                                        {{-- Class Teacher --}}
                                            <div class="col-md-4 mt-2 mb-2">
                                                Class Teacher 
                                                <select class="allowedbranch form-control branch" name="ClassBranch[]" id="branch" multiple>
                                                    @php
                                                        $branch_array=explode(',',$staffs->ClassBranch);
                                                    @endphp
                                                    @foreach ($branch_array as $row)
                                                        <option value="{{$row}}"><?php echo $row; ?></option>
                                                    @endforeach
                                                    @foreach ($branch as $item)
                                                        <option value="{{$item->branch_name}}">{{$item->branch_name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 mt-4 mb-2">
                                                <select class="allowedbranch form-control standard" name="ClassStandard[]" id="standard" multiple>
                                                    @php
                                                        $branch_array=explode(',',$staffs->ClassStandard);
                                                    @endphp
                                                    @foreach ($branch_array as $row)
                                                        <option value="{{$row}}"><?php echo $row; ?></option>
                                                    @endforeach
                                                    @foreach ($standard as $item)
                                                        <option value="{{$item->std_name}}">{{$item->std_name}} ({{$item->Branch->branch_name}}) </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 mt-4 mb-2">
                                                <select class="allowedbranch form-control division" name="ClassDivision[]" id="division" multiple>
                                                    @php
                                                        $branch_array=explode(',',$staffs->ClassDivision);
                                                    @endphp
                                                    @foreach ($branch_array as $row)
                                                        <option value="{{$row}}"><?php echo $row; ?></option>
                                                    @endforeach
                                                    @foreach ($division as $item)
                                                        <option value="{{$item->division}}">{{$item->division}} ({{$item->Standard->std_name}}) </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        {{-- End Class Teacher --}}

                                        {{-- Fill Attendence --}}
                                            <div class="col-md-4 mt-1 mb-2">
                                                Fill Attendence
                                                <select class="allowedbranch form-control branch" name="AttBranch[]" id="attbranch" multiple>
                                                    @php
                                                        $branch_array=explode(',',$staffs->AttBranch);
                                                    @endphp
                                                    @foreach ($branch_array as $row)
                                                        <option value="{{$row}}"><?php echo $row; ?></option>
                                                    @endforeach
                                                    @foreach ($branch as $item)
                                                        <option value="{{$item->branch_name}}">{{$item->branch_name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 mt-3 mb-2">
                                                <select class="allowedbranch form-control standard" name="AttStandard[]" id="attstandard" multiple>
                                                    @php
                                                        $branch_array=explode(',',$staffs->AttStandard);
                                                    @endphp
                                                    @foreach ($branch_array as $row)
                                                        <option value="{{$row}}"><?php echo $row; ?></option>
                                                    @endforeach
                                                    @foreach ($standard as $item)
                                                        <option value="{{$item->std_name}}">{{$item->std_name}} ({{$item->Branch->branch_name}}) </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 mt-3 mb-2">
                                                <select class="allowedbranch form-control division" name="AttDivision[]" id="attdivision" multiple>
                                                    @php
                                                        $branch_array=explode(',',$staffs->AttDivision);
                                                    @endphp
                                                    @foreach ($branch_array as $row)
                                                        <option value="{{$row}}"><?php echo $row; ?></option>
                                                    @endforeach
                                                    @foreach ($division as $item)
                                                        <option value="{{$item->division}}">{{$item->division}} ({{$item->Standard->std_name}}) </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    {{-- End Class Teacher --}}
                                            <div class="col-md-6 mt-2 mb-3">
                                                <label for="">Shift</label>
                                                <select name="Shift" id="" class="form-control">
                                                    <option value="">Select</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mt-2 mb-2">
                                                <label for="">Senior Notify</label>
                                                <select name="Senior" id="" class="form-control">
                                                    <option value="{{$staffs->Senior}}">{{$staffs->Senior}}</option>
                                                    <option value="">Select</option>
                                                    @foreach ($staff as $item)
                                                        <option value="{{$item->id}}">{{$item->Surname.' '.$item->FirstName.' '.$item->FatherHusbandName}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3 mt-2 mb-2">
                                                <label for="">Attendance Punch Type</label><br>
                                                @if ($staffs->AttendenceType=='Entry-Exit')
                                                    <input type="radio" name="AttendenceType" id="" value="Entry-Exit" checked> Entry-Exit 
                                                    <input type="radio" name="AttendenceType" id="" value="Single Punch"> Single Punch     
                                                @else
                                                    <input type="radio" name="AttendenceType" id="" value="Entry-Exit"> Entry-Exit 
                                                    <input type="radio" name="AttendenceType" id="" value="Single Punch" checked> Single Punch 
                                                @endif
                                               
                                            </div>
                                            <div class="col-md-3 mt-2 mb-2">
                                                <label for="">Gender <span class="text-danger">*</span> </label><br>
                                                @if ($staffs->Gender=='Male')
                                                    <input type="radio" name="Gender" id="" value="Male" checked> Male
                                                    <input type="radio" name="Gender" id="" value="Female"> Female
                                                @else
                                                    <input type="radio" name="Gender" id="" value="Male"> Male
                                                    <input type="radio" name="Gender" id="" value="Female" checked> Female
                                                @endif
                                            </div>
                                            <div class="col-md-3 mt-2 mb-2">
                                                <label for="">Birth Date<span class="text-danger">*</span></label><br>
                                                <input type="date" name="Birthdate" value="{{$staffs->Birthdate}}" id="" class="form-control" value="">
                                            </div>
                                            <div class="col-md-3 mt-2 mb-2">
                                                <label for="">Blood Group</label><br>
                                                <select name="BloodGroup" class="form-control" id="">
                                                    <option value="">{{$staffs->BloodGroup}}</option>
                                                    <option value="">Select</option>
                                                    <option value="">A+</option>
                                                    <option value="">A-</option>
                                                    <option value="">AB+</option>
                                                    <option value="">AB-</option>
                                                    <option value="">B+</option>
                                                    <option value="">B-</option>
                                                    <option value="">O+</option>
                                                    <option value="">O-</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 mt-2 mb-2">
                                                <label for="">Mother Tongue</label><br>
                                                <select name="MotherTongue" class="form-control" id="">
                                                    <option value="">{{$staffs->MotherTongue}}</option>
                                                    <option value="">Select</option>
                                                    <option value="">Gujarati</option>
                                                    <option value="">Hindi</option>
                                                    <option value="">English</option>
                                                    <option value="">Marathi</option>
                                                    <option value="">Tamil</option>
                                                    <option value="">Kannad</option>
                                                    <option value="">Urdu</option>
                                                    <option value="">Odi</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 mt-2 mb-2">
                                                <label for="">Person Type</label><br>
                                                @if ($staffs->PersonType=='School')
                                                    <input type="radio" name="PersonType" id="" value="School" checked> School
                                                    <input type="radio" name="PersonType" id="" value="Hostel"> Hostel
                                                    <input type="radio" name="PersonType" id="" value="Both"> Both
                                                @elseif($staffs->PersonType=='Hostel')
                                                    <input type="radio" name="PersonType" id="" value="School"> School
                                                    <input type="radio" name="PersonType" id="" value="Hostel" checked> Hostel
                                                    <input type="radio" name="PersonType" id="" value="Both"> Both
                                                @else
                                                    <input type="radio" name="PersonType" id="" value="School"> School
                                                    <input type="radio" name="PersonType" id="" value="Hostel" > Hostel
                                                    <input type="radio" name="PersonType" id="" value="Both" checked> Both
                                                @endif
                                               
                                            </div>
                                            <div class="col-md-3 mt-2 mb-2">
                                                <label for="">Marital Status <span class="text-danger">*</span></label><br>
                                                @if ($staffs->MaritalStatus=='Unmarried')
                                                    <input type="radio" name="MaritalStatus" id="" value="Unmarried" checked> Unmarried
                                                    <input type="radio" name="MaritalStatus" id="" value="Married"> Married
                                                @else
                                                    <input type="radio" name="MaritalStatus" id="" value="Unmarried" > Unmarried
                                                    <input type="radio" name="MaritalStatus" id="" value="Married" checked> Married
                                                @endif
                                               
                                            </div>
                                            <div class="col-md-12 mt-2 mb-2">
                                                <label for="">Remark</label><br>
                                                <input type="test" name="Remark" id="" value="{{$staffs->Remark}}" class="form-control"> 
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Contact --}}
                                    <div class="tab-pane show" id="contact-b1">
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label for="">Mobile No.1 <span class="text-danger">*</span></label>
                                                <input type="text" name="Mobileno1" value="{{$staffs->Mobileno1}}" class="form-control" id="">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="">Mobile No.2</label>
                                                <input type="text" name="Mobileno2" value="{{$staffs->Mobileno2}}" class="form-control" id="">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="">WhatsApp <span class="text-danger">*</span></label>
                                                <input type="text" name="WhatsApp" value="{{$staffs->WhatsApp}}" class="form-control" id="">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="">Addharcard Number <span class="text-danger">*</span></label>
                                                <input type="text" name="AddharNumber" value="{{$staffs->AddharNumber}}" class="form-control" id="">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="">Pancard Number <span class="text-danger"></span></label>
                                                <input type="text" name="Pancard" value="{{$staffs->Pancard}}"  class="form-control" id="">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="">Address <span class="text-danger"></span></label>
                                                <input type="text" name="Address" value="{{$staffs->Address}}" class="form-control" id="">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="">City/District <span class="text-danger"></span></label>
                                                <input type="text" name="District" value="{{$staffs->District}}"  class="form-control" id="">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="">State<span class="text-danger"></span></label>
                                                <input type="text" name="State" value="{{$staffs->State}}"  class="form-control" id="">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="">Country<span class="text-danger"></span></label>
                                                <input type="text" name="Country" value="{{$staffs->Country}}" class="form-control" id="">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="">Pincode<span class="text-danger"></span></label>
                                                <input type="text" name="Pincode" value="{{$staffs->Pincode}}" class="form-control" id="">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="">Native Village<span class="text-danger"></span></label>
                                                <input type="text" name="NativeVillage" value="{{$staffs->NativeVillage}}" class="form-control" id="">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="">Native Taluka<span class="text-danger"></span></label>
                                                <input type="text" name="NativeTaluka" value="{{$staffs->NativeTaluka}}" class="form-control" id="">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="">Native District<span class="text-danger"></span></label>
                                                <input type="text" name="NativeDistrict" value="{{$staffs->NativeDistrict}}"  class="form-control" id="">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="">E-mail<span class="text-danger"></span></label>
                                                <input type="email" name="Email" value="{{$staffs->Email}}" class="form-control" id="">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="">Joining Date<span class="text-danger"></span></label>
                                                <input type="date" name="JoiningDate"  value="{{$staffs->JoiningDate}}" class="form-control" id="">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="">Job Leaving Date<span class="text-danger"></span></label>
                                                <input type="date" name="JobLeavingDate" value="{{$staffs->JobLeavingDate}}" class="form-control" id="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="qualification-b1">
                                        
                                        <h4 class="text-center"><i class="fas fa-info-circle fa-3x text-danger"></i><br><br>You Can Add Qualification Details While Editing Staff Detail.</h4>
                                    </div>
                                    <div class="tab-pane" id="bankdetails-b1">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="">Payment Type</label><br>
                                                @if ($staffs->PaymentType=='Cash')
                                                    <input type="radio" name="PaymentType" id="" value="Cash" checked> Cash
                                                    <input type="radio" name="PaymentType" class="ml-3" id="" value="Bank"> Bank
                                                @else
                                                    <input type="radio" name="PaymentType" id="" value="Cash"> Cash
                                                    <input type="radio" name="PaymentType" class="ml-3" id="" value="Bank" checked> Bank
                                                @endif
                                               
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="">Employee No</label>
                                                <input type="text" name="EmployeeNo"  value="{{$staffs->EmployeeNo}}" class="form-control" id="">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="">Bank Name</label>
                                                <input type="text" name="BankName" value="{{$staffs->BankName}}" class="form-control" id="">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="">Account No.</label>
                                                <input type="text" name="AccountNo" value="{{$staffs->AccountNo}}" class="form-control" id="">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="">Bank Branch</label>
                                                <input type="text" name="BankBranch" value="{{$staffs->BankBranch}}" class="form-control" id="">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="">IFSC Code</label>
                                                <input type="text" name="IFSCCode" value="{{$staffs->IFSCCode}}" class="form-control" id="">
                                            </div>
                                            <div class="col-md-4 mb-3 mt-3">
                                                <input type="checkbox" name="ApplyPF" class="" id="" {{$staffs->ApplyPF=='1'?'checked':''}}> Apply PF
                                                <input type="checkbox" name="ApplyTDS" class="ml-2" id="" {{$staffs->ApplyTDS=='1'?'checked':''}}> Apply TDS
                                                <input type="checkbox" name="ApplyTax" class="ml-2" id="" {{$staffs->ApplyTax=='1'?'checked':''}}> Apply Tax
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="">PF Number</label>
                                                <input type="text" name="PFNumber" value="{{$staffs->PFNumber}}" class="form-control" id="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="login-b1">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="">Username <span class="text-danger">*</span></label>
                                                <input type="text" name="Username" value="{{$staffs->Username}}" class="form-control" id="">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">Password<span class="text-danger">*</span></label>
                                                <input type="password" name="Password" class="form-control" id="">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">Confirm Password<span class="text-danger">*</span></label>
                                                <input type="password" name="ConfirmPassword" class="form-control" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="reset" class="btn btn-danger float-right">Reset</button>
                                <button type="submit" class="btn btn-success float-right mr-2">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            
            </div>
        </div>
    </div>
@endsection


@section('scripts')

<script>
    
    $(document).ready(function () {
        $('.allowedbranch').select2({
            placeholder: "Select a Branch",
            allowClear: true,
            tags: true,
            tokenSeparators: [',', ' ']
        });

       
       $("form[name='add_employee'").validate({
            rules:{
                Designation:{
                    required:true
                },
                Surname:{
                    required:true
                },
                FirstName:{
                    required:true
                },
                FatherHusbandName:{
                    required:true
                },
                Gender:{
                    required:true
                },
                Birthdate:{
                    required:true
                },
                MaritalStatus:{
                    required:true
                },
                Mobileno1:{
                    required:true,
                    digits:true
                },
                WhatsApp:{
                    required:true,
                    digits:true
                },
                Email:{
                    required:true,
                    email:true
                }   
                
            },
            messege:{
                Surname:"<h5 class='text-danger'>Please Enter Surname</h5>"
            }
            
        });
    });
  
   
   
</script>

@endsection
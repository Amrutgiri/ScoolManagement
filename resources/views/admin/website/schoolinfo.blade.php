@extends('admin.layouts.master')


@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">School Information</li>
                    </ol>
                </div>
                <h4 class="page-title">School Information</h4>
            </div>
        </div>
    </div>     
    <!-- end page title -->
    <div class="row mt-3 mb-3 justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
            <h4 class="alert alert-warning">{{session('status')}}</h4>
            @endif
            <div class="card ribbon-box border border-dark shadow">
                <div class="card-header bg-dark">
                    <div class="ribbon ribbon-warning float-left shadow">
                       <h4> School Information</h4>
                    </div>
                    
                </div>
                <div class="card-body">
                    <form action="{{url('admin/Addschoolinfo')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">Institute Name</label>
                                <input type="text" @if($schools) value="{{$schools->name}}" @endif name="name" placeholder="Enter Full School Name" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Trust Name</label>
                                <input type="text" value="{{$schools->trust_name}}" name="trust_name" placeholder="Enter Trust Name" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Address</label>
                                <input type="text" value="{{$schools->address}}" name="address" placeholder="Enter Address" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Contact No. 1</label>
                                <input type="text" value="{{$schools->contact1}}" name="contact1" placeholder="Contact No.1" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Contact No. 2</label>
                                <input type="text" value="{{$schools->contact2}}" name="contact2" placeholder="Contact No.2" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Email Address</label>
                                <input type="email" value="{{$schools->email}}" name="email" placeholder="Enter Email Address" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Facebook Profile Link</label>
                                <input type="text" value="{{$schools->facebook}}" name="facebook" placeholder="Facebook Profile Link" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Instagram Profile Links</label>
                                <input type="text" value="{{$schools->instagram}}" name="instagram" placeholder="Instagram Profile Links" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">WhatsApp Link</label>
                                <input type="text" value="{{$schools->whatsapp}}" name="whatsapp" placeholder="Whatsapp Link" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Twitter Profile Link</label>
                                <input type="text" value="{{$schools->twitter}}" name="twitter" placeholder="Twitter Profile Link" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">School Logo</label>
                                <input type="file" value="No Logo" name="school_logo" class="form-control">
                                <img src="{{url('uploads/school/'.$schools->school_logo)}}" height="100px" width="100px" class="mt-3" alt="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="switchery-demo">
                                    <label for="">Status</label><br>
                                    <input type="checkbox" name="status"{{$schools->status=='1'? 'checked':''}} class="checkbox-primary checkbox-circle"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-success">Save</button>
                                <button type="button" class="btn btn-danger">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
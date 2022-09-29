@extends('admin.layouts.master')


@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('admin/manageschool')}}">Manage School</a></li>
                        <li class="breadcrumb-item active">Edit Standard</li>
                    </ol>
                </div>
                
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
                       <h4> Edit Standard</h4>
                    </div>
                    <h5 class="text-warning mt-3 float-right">{{$standard->Branch->branch_name}}</h5>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/update_standard/'.$standard->id)}}"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <input type="hidden" value="{{$data}}" name="ids" id="">
                            <div class="col-md-12 mb-3">
                                
                                <label for="">Standard Name <span class="text-danger">*</span> </label>
                                <input type="text" name="std_name" value="{{$standard->std_name}}" class="form-control" placeholder="Enter Branch Name">
                            </div>
                            <div class="col-md-12 mb-3">
                                <input type="checkbox" name="sem" {{$standard->sem=='1' ?'checked':''}} > Has Semester
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Passing Percentage<span class="text-danger">*</span></label>
                                <input type="text" name="pass_percentage" value="{{$standard->pass_percentage}}" class="form-control" placeholder="Enter Passing Percentage">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Grade Templete<span class="text-danger">*</span></label>
                                <select name="grade" id="" class="form-control">
                                        <option value="{{$standard->grade}}">{{$standard->grade}}</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Age Limit</label>
                                <input type="text" name="age_limit" value="{{$standard->age_limit}}" class="form-control" placeholder="Enter Standard Age Limit">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Notes</label>
                                <input type="text" name="notes" value="{{$standard->notes}}" class="form-control" placeholder="Index Number">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Maximum Limit<span class="text-danger">*</span></label>
                                <input type="text" name="max_limit" class="form-control" value="{{$standard->max_limit}}" placeholder="0 for Unlimited Students">
                            </div>
                            <div class="col-md-12 mb-3">
                                Status <span class="text-danger">*</span> : <input type="checkbox" name="status" {{$standard->status=='1'? 'checked':''}} >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-success">Update</button>
                                <button type="button" class="btn btn-danger">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
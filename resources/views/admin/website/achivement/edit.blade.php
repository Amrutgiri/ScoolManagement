@extends('admin.layouts.master')


@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Achivement</li>
                    </ol>
                </div>
                
            </div>
        </div>
    </div>     
    <!-- end page title -->
    <div class="row mt-3 mb-3 justify-content-center">
        <div class="col-md-9">
            @if (session('status'))
            <h4 class="alert alert-warning">{{session('status')}}</h4>
            @endif
            <div class="card ribbon-box border border-dark shadow">
                <div class="card-header bg-dark">
                    <div class="ribbon ribbon-warning float-left shadow">
                       <h4> Edit Achivement</h4>
                    </div>
                    <a href="{{url('admin/achivements')}}" class="btn btn-warning waves-effect waves-light text-dark float-right"><i class=" mdi mdi-arrow-left-circle-outline fa-2x"></i></a>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/Update_achivement/'.$achivement->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                       @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">Heading</label>
                                <input type="text" name="heading" value="{{$achivement->heading}}" placeholder="Enter Heading" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Description</label>
                                <textarea name="description" id="summernote-editor" placeholder="Enter Description" class="form-control">
                                    {{$achivement->description}}
                                </textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Select Image</label>
                                <input type="file" name="image" id="" class="form-control">
                                <img src="{{asset('uploads/achivement/'.$achivement->image)}}" class="mt-2 mb-3" height="120px" width=150px alt="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Status</label> <br>
                                <input type="checkbox" name="status" id="" style="width: 20px;height:20px;" {{$achivement->status=='1'?'checked':''}}>
                            </div>
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
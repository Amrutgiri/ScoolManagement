@extends('admin.layouts.master')


@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{url('admin/feedback')}}">Feedback</a></li>
                        <li class="breadcrumb-item active"><a href="">Edit Feedback</a></li>
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
                       <h4> Edit Feedback</h4>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{url('admin/updatefeedback/'.$feedback->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="">Student Name</label>
                                                <input type="text" name="stud_name" value="{{$feedback->stud_name}}" class="form-control">
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="">Student Passout or Current Year</label>
                                                <input type="text" name="stud_edu_year" value="{{$feedback->stud_edu_year}}" class="form-control">
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="">Select Student Image</label>
                                                <input type="file" name="stud_image" id="" class="form-control">
                                                <img src="{{asset('uploads/feedback/'.$feedback->stud_image)}}"  height="50px" width="50px" alt="">
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="">Student Feedback</label>
                                                <textarea name="stud_feedback"  id="summernote-editor" cols="30" rows="10">{{$feedback->stud_feedback}}</textarea>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="">Status</label>
                                                <input type="checkbox" {{$feedback->status=='1'?'checked':''}} name="status" id="">
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <button type="submit"  class="btn btn-success float-right ">Update</button>
                                                <button type="reset" class="btn btn-danger float-right mr-2">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div>
                    <!-- end row-->
                </div>
            </div>
        </div>
    </div>

  
@endsection
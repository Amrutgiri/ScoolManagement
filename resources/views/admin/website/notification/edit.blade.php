@extends('admin.layouts.master')

@section('content')

 <!-- start page title -->
 <div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{url('admin/notification')}}">Notication</a></li>
                    <li class="breadcrumb-item "><a href="{{url('admin/editnotification')}}">Edit Notication</a></li>

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
                   <h4> Edit Notification</h4>
                </div>
                
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{url('admin/updatenotification/'.$notifications->id)}}" method="PUT" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="">Notification Heading</label>
                                            <input type="text" name="heading" value="{{$notifications->heading}}" id="" class="form-control">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">Description</label>
                                            <textarea name="description" id="summernote-editor" cols="30" rows="10">
                                                {!!$notifications->description!!}
                                            </textarea>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">Select File (If require)</label>
                                            <input type="file" name="docs"  id="" class="form-control">
                                            Included File : <a href="">{{$notifications->docs}}</a>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Notification Display From</label>
                                            <input type="date" name="start_date" value="{{$notifications->start_date}}" id="" class="form-control">
                                            
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Notification Display To</label>
                                            <input type="date" name="end_date" value="{{$notifications->end_date}}"  id="" class="form-control">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">Status</label>
                                            <input type="checkbox" name="status" id="" {{$notifications->status=='1'?'checked':''}}>
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
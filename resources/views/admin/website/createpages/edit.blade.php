@extends('admin.layouts.master')


@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{url('admin/createpages')}}">Create Pages</a></li>
                        <li class="breadcrumb-item active">Edit Page</li>
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
                       <h4>Edit - Page</h4>
                    </div>
                    
                </div>
                <div class="card-body">
                    <form action="{{url('admin/update_pages/'.$aboutus->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">Page Name</label>
                                <input type="text" name="heading" value="{{$aboutus->heading}}" id="" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Description</label>
                                <textarea name="description" id="summernote-editor" cols="30" rows="10">{{$aboutus->description}}</textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Select Page Image</label>
                                <input type="file" name="image" class="form-control" id="">
                                <img src="{{asset('uploads/aboutus/'.$aboutus->image)}}" height="100px" width="100px" alt="">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Page Status (if checked then page will be displayed)</label><br>
                                <input type="checkbox" name="status" {{$aboutus->status=='1'?'checked':''}} style="height: 20px;width:20px;" id="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-success float-right">Update</button>
                                <button type="reset" class="btn btn-danger float-right mr-2">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
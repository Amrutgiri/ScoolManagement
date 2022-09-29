@extends('admin.layouts.master')


@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Carousel</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Carousel</h4>
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
                       <h4>Edit Carousel</h4>
                    </div>
                    
                </div>
                <div class="card-body">
                    
                        <form action="{{url('admin/updatecarousel/'.$editcarousels->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Select Image</label>
                                    <input type="file" class="form-control mb-3" id="field-1" name="image">
                                    <img src="{{asset('uploads/carousel/'.$editcarousels->image)}}" height="100px" width="250px" alt="">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Description</label>
                                    <textarea name="description" id="" cols="30" rows="10" class="form-control">
                                        {{$editcarousels->description}}
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="field-2" class="control-label mr-3">Status</label>
                                    <input type="checkbox" name="status" id="" {{$editcarousels->status=='1'?'checked':''}}>
                                </div>
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
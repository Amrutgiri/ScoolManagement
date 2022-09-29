@extends('admin.layouts.master')


@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">WelCome Section</li>
                    </ol>
                </div>
                <h4 class="page-title">WelCome Section</h4>
            </div>
        </div>
    </div>     
    <!-- end page title -->
    <div class="row mt-3 mb-3 justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
            <h4 class="alert alert-success">{{session('status')}}</h4>
            @endif
            <div class="card ribbon-box border border-dark shadow">
                <div class="card-header bg-dark">
                    <div class="ribbon ribbon-warning float-left shadow">
                        <h4> WelCome Section</h4>
                    </div>
                    <button type="button" class="btn btn-warning waves-effect waves-light text-dark float-right" data-toggle="modal" data-target="#staticBackdrop"><i class="far fa-plus-square fa-2x"></i></button>
                </div>
                <div class="card-body">
                  
                    <form action="{{url('admin/sections/'.$sections->id)}}" method="POST" id="section_form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Select Institute Image</label>
                            <input type="file" name="image" class="image form-control">
                            <img src="{{asset('uploads/welcome/'.$sections->image)}}" class="mb-3 mt-3" height="200px" width="200px" alt="">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Heading</label>
                            <input type="text" name="heading" value="{{$sections->heading}}" class="heading form-control">
                        </div>
                       
                        <div class="form-group mb-3">
                            <label for="">Description About us</label>
                            <textarea name="description" id="summernote-editor" cols="30" rows="10" class="description form-control">
                                {!! $sections->description !!}
                            </textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" name="status" id="" class="status" {{$sections->status=='1'?'checked':''}}>
                        </div>
                        <div class="form-group mb-3">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')


@endsection
@extends('admin.layouts.master')


@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="#">Add Letter Pad</a></li>
                        
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
                        <h4>Add- Letter Pad</h4>
                    </div>
                    {{-- data-toggle="modal" data-target="#con-close-modal" --}}
                    
                </div>
                <div class="card-body">
                    <form action="{{url('admin/store_letterpad')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Header <span class="text-danger">*</span> </label>
                            <input type="text" name="header_name" class="form-control" value="" placeholder="Enter Letter Pad Header or Title">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Page Border</label><br>
                            <input type="checkbox" name="border" id=""> Border
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Add Backgroud Image</label>
                            <input type="file" name="bgimage" id="" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Add Watermark</label>
                            <input type="file" name="bgwatermark" id="" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Report</label>
                            <textarea name="report" id="summernote-editor" cols="30" rows="10" class="form-control"></textarea>
                            <br><br>

                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-success float-right mr-2">Save</button>
                            <button type="reset" class="btn btn-danger float-right mr-2">Cancel</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

    
@endsection
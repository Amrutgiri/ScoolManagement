@extends('admin.layouts.master')


@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{url('admin/manageschool')}}">Manage School</a></li>
                        <li class="breadcrumb-item active">Edit Division</li>
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
                       <h4> Edit Division</h4>
                    </div>
                    
                </div>
                <div class="card-body">
                    <form action="{{url('admin/update_division/'.$division->id)}}"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <input type="text" name="ids" value="{{$data}}">
                            <div class="col-md-12 mb-3">
                                <label for="">Division</label>
                                <input type="text" name="division" value="{{$division->division}}" class="form-control" id="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Maximum Limit</label>
                                <input type="text" name="max_limit" value="{{$division->max_limit}}" class="form-control" id="">
                            </div>
                            <div class="col-md-12 mb-3">
                                Status :
                                <input type="checkbox" {{$division->status=='1' ? 'checked':''}} name="status" id="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-success float-right ">Save</button>
                                <button type="button" class="btn btn-danger float-right mr-2">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
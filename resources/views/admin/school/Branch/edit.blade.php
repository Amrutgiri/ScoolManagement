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
                        <li class="breadcrumb-item active">Edit Branch</li>
                    </ol>
                </div>
                
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
                       <h4>Edit Branch</h4>
                    </div>
                    
                </div>
                <div class="card-body">
                    <form action="{{url('admin/update_branch/'.$branch->id)}}" method="" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">Branch Name</label>
                                <input type="text" name="branch_name" value="{{$branch->branch_name}}" id="branch_name" class="form-control" placeholder="Enter Branch Name">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Board</label>
                                <select name="board" id="" class="form-control">
                                    <option value="{{$branch->board}}">{{$branch->board}}</option>
                                    @foreach ($board as $item)
                                        <option value="{{$item->board_name}}">{{$item->board_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Medium</label>
                                <select name="medium" id="" class="form-control">
                                        <option value="{{$branch->medium}}">{{$branch->medium}}</option>
                                    @foreach ($medium as $row)
                                        <option value="{{$row->medium}}">{{$row->medium}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Branch Type</label>
                                <select name="branch_type" id="" class="form-control">
                                        <option value="{{$branch->branch_type}}">{{$branch->branch_type}}</option>
                                    @foreach ($branchtype as $value)
                                        <option value="{{$value->branchtype}}">{{$value->branchtype}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Index Number</label>
                                <input type="text" name="indexno" value="{{$branch->indexno}}" class="form-control" placeholder="Index Number">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Principal Signature</label>
                                <input type="file" name="principal_sign" class="form-control" placeholder="">
                                @if ($branch->principal!='')
                                    <img src="{{asset('uploads/principal/'.$branch->principal_signature)}}" width="200px" height="150px" alt="">
                                @else
                                    <img src="{{asset('admin/images/no_image.png')}}" width="200px" height="150px" alt="">
                                @endif)
                            </div>
                            <div class="col-md-12 mb-3 ">
                                <button type="submit" class="btn btn-success waves-effect waves-light float-right ">Update</button>
                                <button type="button" class="btn btn-danger waves-effect float-right mr-2" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
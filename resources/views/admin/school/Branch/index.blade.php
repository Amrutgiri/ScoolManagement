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
                        <li class="breadcrumb-item active">Branch</li>
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
                       <h4>Branch</h4>
                    </div>
                    <a href="#" class="btn btn-success py-1 px-2 btn-sm float-right" data-toggle="modal" data-target="#con-close-modal" ><i class="far fa-plus-square fa-2x me-3"></i></a>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Branch Name</th>
                                <th>Board</th>
                                <th>Medium</th>
                                <th>Index No.</th>
                                <th>Student M + F = T</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($branch as $value)
                           <tr>
                                <td>{{$value->branch_name}}</td>
                                <td>{{$value->board}}</td>
                                <td>{{$value->medium}}</td>
                                <td>{{$value->indexno}}</td>
                                <td>0 + 0 = 0</td>
                                <td>
                                    <a href="{{url('admin/edit_branch/'.$value->id)}}" class="btn btn-primary py-1 px-2 btn-sm ml-1"><i class="far fa-edit "></i></a>
                                    <a href="{{url('admin/delete_branch/'.$value->id)}}" class="btn btn-danger py-1 px-2 btn-sm ml-1"><i class="fe-trash "></i></a>
                                    <a href="{{url('admin/standard/'.$value->id)}}" class="btn btn-success py-1 px-2 btn-sm ml-1"><i class="far fa-eye me-3"></i> Standard</a>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


{{-- Add Branch --}}
<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Branch</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-4">
                <form action="{{url('admin/add_branch')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="">Branch Name</label>
                            <input type="text" name="branch_name" id="branch_name" class="form-control" placeholder="Enter Branch Name">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Board</label>
                            <select name="board" id="" class="form-control">
                                <option value="">Select</option>
                                @foreach ($board as $item)
                                    <option value="{{$item->board_name}}">{{$item->board_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Medium</label>
                            <select name="medium" id="" class="form-control">
                                    <option value="">Select</option>
                                @foreach ($medium as $row)
                                    <option value="{{$row->medium}}">{{$row->medium}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Branch Type</label>
                            <select name="branch_type" id="" class="form-control">
                                    <option value="">Select</option>
                                @foreach ($branchtype as $value)
                                    <option value="{{$value->branchtype}}">{{$value->branchtype}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Index Number</label>
                            <input type="text" name="indexno" class="form-control" placeholder="Index Number">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Principal Signature</label>
                            <input type="file" name="principal_sign" class="form-control" placeholder="">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
            </div>
        </div>
        
    </div>
</form>
</div><!-- /.modal -->
@endsection
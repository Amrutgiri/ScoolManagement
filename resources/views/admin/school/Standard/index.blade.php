@extends('admin.layouts.master')


@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('admin/mananebranch')}}">Branch</a></li>
                        <li class="breadcrumb-item active">Standard</li>
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
                       <h4>Standard</h4>
                    </div>
                    <a href="#" class="btn btn-success py-1 px-2 btn-sm float-right" data-toggle="modal" data-target="#con-close-modal"><i class="far fa-plus-square fa-2x me-3"></i></a>
                    
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Standard</th>
                                <th>Branch</th>
                               
                                <th> M + F = Total</th>
                                
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($standard as $item)
                                <tr>
                                    <td>{{$item->std_name}}</td>
                                    <td>{{$item->Branch->branch_name}}</td>
                                    
                                    <td> 0 + 0 = 0</td>
                                    <td>
                                        <a href="{{url('admin/edit_standard/'.$item->id)}}" class="btn btn-primary py-1 px-2 btn-sm ml-1"><i class="far fa-edit "></i></a>
                                        <a href="{{url('admin/delete_standard/'.$item->id)}}" class="btn btn-danger py-1 px-2 btn-sm ml-1"><i class="fe-trash "></i></a>
                                        <a href="{{url('admin/division/'.$item->id)}}" class="btn btn-success py-1 px-2 btn-sm"><i class="far fa-eye me-3"></i> Division</a>
                                    </td>
                                </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Standard- {{$branch->branch_name}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4">
                    <form action="{{url('admin/add_standard')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <input type="hidden" value="{{$data}}" name="ids" id="">
                                <label for="">Standard Name <span class="text-danger">*</span> </label>
                                <input type="text" name="std_name" class="form-control" placeholder="Enter Branch Name">
                            </div>
                            <div class="col-md-12 mb-3">
                                <input type="checkbox" name="sem" > Has Semester
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Passing Percentage<span class="text-danger">*</span></label>
                                <input type="text" name="pass_percentage" class="form-control" placeholder="Enter Passing Percentage">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Grade Templete<span class="text-danger">*</span></label>
                                <select name="grade" id="" class="form-control">
                                        <option value="">Select</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Age Limit</label>
                                <input type="text" name="age_limit" class="form-control" placeholder="Enter Standard Age Limit">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Notes</label>
                                <input type="text" name="notes" class="form-control" placeholder="Index Number">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Maximum Limit<span class="text-danger">*</span></label>
                                <input type="text" name="max_limit" class="form-control" vlaue="0" placeholder="0 for Unlimited Students">
                            </div>
                            <div class="col-md-12 mb-3">
                                Status <span class="text-danger">*</span> : <input type="checkbox" name="status" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-success">Save</button>
                                <button type="button" class="btn btn-danger">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    
                </div>
            </div>
        </div>
    </div><!-- /.modal -->
@endsection
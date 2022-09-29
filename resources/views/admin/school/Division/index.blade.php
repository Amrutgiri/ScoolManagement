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
                        <li class="breadcrumb-item active">Division</li>
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
                       <h4>Division</h4>
                    </div>
                    <a href="#" class="btn btn-success py-1 px-2 btn-sm float-right" data-toggle="modal" data-target="#con-close-modal"><i class="far fa-plus-square fa-2x me-3"></i></a>
                    
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Division</th>
                                <th>Standard</th>
                                
                                <th> M + F = Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($division as $row)
                            <tr>
                                <td>{{$row->division}}</td>
                                <td>{{$row->Standard->std_name}}</td>
                                
                                <td>0 + 0 = 0</td>
                                <td>
                                    <a href="{{url('admin/edit_division/'.$row->id)}}" class="btn btn-primary py-1 px-2 btn-sm ml-1"><i class="far fa-edit "></i></a>
                                    <a href="" class="btn btn-danger py-1 px-2 btn-sm ml-1"><i class="fe-trash "></i></a>
                                    
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
                    <h4 class="modal-title">Add Division-</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4">
                    <form action="{{url('admin/add_division')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input type="text" name="ids" value="{{$data}}">
                            <div class="col-md-12 mb-3">
                                <label for="">Division</label>
                                <input type="text" name="division" class="form-control" id="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Maximum Limit</label>
                                <input type="text" name="max_limit" class="form-control" id="">
                            </div>
                            <div class="col-md-12 mb-3">
                                Status :
                                <input type="checkbox" name="status" id="">
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
                <div class="modal-footer">
                    
                </div>
            </div>
        </div>
    </div><!-- /.modal -->
@endsection
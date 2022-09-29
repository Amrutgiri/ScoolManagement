@extends('admin.layouts.master')


@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">School Inwards</li>
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
                       <h4> School Inwards</h4>
                    </div>
                        <a href="#" class="btn btn-success py-1 px-2 float-right" data-toggle="modal" data-target="#con-close-modal"><i class="far fa-plus-square fa-2x me-3"></i></a>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Recieved From</th>
                                <th>Recieved Date</th>
                                <th>Document</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inwards as $row)
                                <tr>
                                    <td>{{$row->Title}}</td>
                                    <td>{{$row->RecieveFrom}}</td>
                                    <td>{{date('d-m-Y',strtotime($row->Date))}}</td>
                                    <td>
                                        <a href="{{asset('uploads/inward/'.$row->Document)}}">
                                            {{$row->Document}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{url('admin/edit_inward/'.$row->id)}}" class="btn btn-primary py-1 px-2 btn-sm ml-1"><i class="far fa-edit "></i></a>
                                        <a href="{{url('admin/delete_inward/'.$row->id)}}" class="btn btn-danger py-1 px-2 btn-sm ml-1"><i class="fe-trash "></i></a>
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
                    <h4 class="modal-title">Add Inwards Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-12">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        </div>
                    </div>
                    <form action="{{url('admin/add_inwards')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">Date <span class="text-danger">*</span></label>
                                <input type="date" name="Date" class="form-control" id="">
                            </div>
                            <div class="col-md-12 mb-1">
                                <label for="">Recieve From <span class="text-danger">*</span></label>
                                <input type="text" name="RecieveFrom" class="form-control" id="">
                            </div>
                            <div class="col-md-12 mb-1">
                                <label for="">Title<span class="text-danger">*</span></label>
                                <input type="text" name="Title" class="form-control" id="">
                            </div>
                            <div class="col-md-12 mb-1">
                                <label for="">Upload Document</label>
                                <input type="file" name="Document" class="form-control" id="">
                            </div>
                            <div class="col-md-12 mb-1">
                                <label for="">Description</label>
                                <textarea name="Description" id="summernote-editor" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect float-right" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success waves-effect waves-light float-right mr-2">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div><!-- /.modal -->
@endsection
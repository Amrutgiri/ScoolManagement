@extends('admin.layouts.master')


@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Achivement</li>
                    </ol>
                </div>
                <h4 class="page-title">Achivement</h4>
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
                       <h4>Achievement</h4>
                    </div>
                    <a href="{{url('admin/add_achivement')}}" class="btn btn-warning waves-effect waves-light text-dark float-right"><i class="far fa-plus-square fa-2x"></i></a>
                </div>
                <div class="card-body">
                    <table id="myTables" class="table table-border">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($achivement as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->heading}}</td>
                                    
                                    <td>
                                        @if($item->status=='1')
                                            <p class="badge badge-success">Active</p>
                                        @else
                                            <p class="badge badge-danger">InActive</p>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('admin/edit_achivement/'.$item->id)}}" class=""><i class="fe-edit fa-2x me-3"></i></a>
                                        <a href="{{url('admin/delete_achivement/'.$item->id)}}" onclick="confirm('Are You Sure Delete this Record ?')" class=""><i class="fe-trash fa-2x me-3"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
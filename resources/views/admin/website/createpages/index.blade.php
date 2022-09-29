@extends('admin.layouts.master')


@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Create Pages</li>
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
                       <h4>Create Pages</h4>
                    </div>
                    <a href="{{url('admin/addpages')}}" class="btn btn-warning text-dark float-right">Create New Page</a>
                </div>
                <div class="card-body">
                    <table id="myTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Heading</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($aboutus as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->heading}}</td>
                                    <td>
                                        @if ($row->status=='1')
                                            <p class="badge badge-success">Active</p>
                                        @else
                                            <p class="badge badge-danger">InActive</p>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('admin/edit_pages/'.$row->id)}}" class=""><i class="fe-edit fa-2x me-3"></i></a>
                                        <a href="{{url('admin/delete_pages/'.$row->id)}}" class=""><i class="fe-trash fa-2x me-3"></i></a>
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
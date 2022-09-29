@extends('admin.layouts.master')


@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Staff Manage</li>
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
                       <h4>Staff Manage</h4>
                    </div>
                    <a href="{{url('admin/add_staff')}}" class="btn btn-success py-1 px-2 btn-sm float-right"><i class="far fa-plus-square fa-2x me-3"></i></a>
                </div>
                <div class="card-body">
                    <table id="key-datatable" class="table dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Branch</th>
                                <th>Username</th>
                                <th>Designation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staff as $item)
                                <tr>
                                    <td>
                                        <img src="{{asset('admin/images/no_image.png')}}" height="50px" width="50px" alt="">
                                    </td>
                                    <td>
                                        <h4>{{$item->Surname.' '.$item->FirstName.' '.$item->FatherHusbandName}}</h4>
                                        <h5>Mo :- {{$item->Mobileno1}} WhatsApp :- {{$item->WhatsApp}}</h5>
                                    </td>
                                    <td>
                                        <h5>{{$item->Branch}}</h5>
                                    </td>
                                    <td>
                                        <h5>{{$item->Username}}</h5>
                                    </td>
                                    <td>
                                        <h5>{{$item->Designation}}</h5>
                                    </td>
                                    <td>
                                        <a href="{{url('admin/edit_staff/'.$item->id)}}" class="btn btn-primary py-1 px-2 btn-sm ml-1"><i class="far fa-edit "></i></a>
                                        <a href="" class="btn btn-warning py-1 px-2 btn-sm ml-1"><i class="fe-slash "></i></a>
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
@endsection
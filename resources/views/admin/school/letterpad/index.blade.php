@extends('admin.layouts.master')


@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="#">Letter Pad</a></li>
                        
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
                       <h4>Letter Pad</h4>
                    </div>
                    {{-- data-toggle="modal" data-target="#con-close-modal" --}}
                    <a href="{{url('admin/add_letterpad')}}" class="btn btn-success py-1 px-2 btn-sm float-right"><i class="far fa-plus-square fa-2x me-3"></i></a>
                    
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Header</th>
                               
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($letterpad as $row)
                               <tr>
                                    <td>{{$row->header_name}}</td>
                                    <td>
                                        <a href="{{url('admin/edit_letterpad/'.$row->id)}}" class="btn btn-primary py-1 px-2 btn-sm ml-1"><i class="far fa-edit "></i></a>
                                        <a href="{{url('admin/delete_letterpad/'.$row->id)}}" class="btn btn-danger py-1 px-2 btn-sm ml-1"><i class="fe-trash "></i></a>
                                        <a href="{{url('admin/generatePDF/'.$row->id)}}" class="btn btn-info py-1 px-2 btn-sm ml-1"><i class="fe-eye "></i></a>
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
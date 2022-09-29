@extends('admin.layouts.master')

@section('content')

<div class="container-fluid mt-2">
    
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                <h5 class="alert alert-success">{{session('status')}}</h5>
            @endif
            <div class="card ribbon-box border border-dark shadow">
                <div class="card-header bg-dark">
                    <div class="ribbon ribbon-warning float-left shadow">
                        <h4>Manage School</h4>
                     </div>
                     
                </div>
                <div class="card-body">
                        <div id="accordion" class="mb-3">
                            <div class="card mb-1">
                                <div class="card-header" id="headingOne">
                                    <h5 class="m-0">
                                        <a class="text-dark" data-toggle="collapse" href="#collapseOne" aria-expanded="true">
                                            <i class="mdi mdi-help-circle mr-1 text-primary"></i> 
                                            School Info
                                        </a>
                                    </h5>
                                </div>
                    
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>School Name</th>
                                                    <th>Trust Name</th>
                                                    <th>STAFF M + F = T</th>
                                                    <th>Student M + F = T</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <tr>
                                                        <td>{{$school->id}}</td>
                                                        <td>{{$school->name}}</td>
                                                        <td>{{$school->trust_name}}</td>
                                                        <td>0 + 0 = 0</td>
                                                        <td>0 + 0 = 0</td>
                                                        <td>
                                                            @if($school->status=='1')
                                                                <p class="badge badge-success">Active</p>
                                                            @else
                                                                <p class="badge badge-Danger">Inactive</p>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{url('admin/school_info')}}" class="btn btn-primary py-1 px-2 btn-sm ml-1"><i class="far fa-edit "></i></a>
                                                            <a href="" class="btn btn-warning py-1 px-2 btn-sm ml-1"><i class="fe-slash "></i></a>
                                                            <a href="{{url('admin/mananebranch')}}" class="btn btn-success py-1 px-2 btn-sm ml-1"><i class="fas fa-eye"></i> Branch</a>
                                                        </td>
                                                    </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                           
                           
                   
                    
                </div>
            </div>
        </div>
    </div>
</div>




@endsection


@section('scripts')



@endsection
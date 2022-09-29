@extends('admin.layouts.master')


@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Carousel</li>
                    </ol>
                </div>
                <h4 class="page-title">Carousel</h4>
            </div>
        </div>
    </div>     
    
    {{-- Add Model Code--}}
    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Carousel</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4">
                    <form action="{{url('admin/addcarousel')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Select Image</label>
                                <input type="file" class="form-control" id="field-1" name="image">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Description</label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="field-2" class="control-label mr-3">Status</label>
                                <input type="checkbox" name="status" id="">
                            </div>
                        </div>
                    </div>
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                </div>
            </div>
        </form>
        </div>
    </div><!-- /.modal -->

    
    <!-- end page title -->
    <div class="row mt-3 mb-3 justify-content-center">
        <div class="col-md-10">
            @if (session('status'))
            <h4 class="alert alert-success">{{session('status')}}</h4>
            @endif
            <div class="card ribbon-box border border-dark shadow">
                <div class="card-header bg-dark">
                    <div class="ribbon ribbon-warning float-left shadow">
                       <h4>Carousel</h4>
                    </div>
                    <button type="button" class="btn btn-warning waves-effect waves-light text-dark float-right" data-toggle="modal" data-target="#con-close-modal"><i class="far fa-plus-square fa-2x"></i></button>
                    
                </div>
                <div class="card-body">
                    <div class="responsive">
                        <table id="mainTable" class="table talbe-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carousel as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td><img src="{{asset('uploads/carousel/'.$item->image)}}" height="100px" width="250px" alt=""></td>
                                    <td>{{$item->description}}</td>
                                    <td>
                                        @if ($item->status=='1')
                                            <a href="" class="badge badge-success">Active</a>
                                        @else
                                            <a href="" class="badge badge-danger">InActive</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('admin/editCarousel/'.$item->id)}}"><i class="fe-edit fa-2x me-3"></i></a>
                                        <a href="{{url('admin/deleteCarousel/'.$item->id)}}" confirm="Are you want to Delete This Carousel ?"><i class="fe-trash fa-2x"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
@endsection


@section('scripts')
<script>
   
</script>
@endsection
@extends('admin.layouts.master')


@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Gallery Albums</li>
                    </ol>
                </div>
                <h4 class="page-title">Gallery Albums</h4>
            </div>
        </div>
    </div>     
    <!-- end page title -->
    <div class="row  mb-3 justify-content-center">
        <div class="col-md-12">
            @if (session('status'))
            <h4 class="alert alert-warning">{{session('status')}}</h4>
            @endif
            <div class="card ribbon-box border border-dark shadow">
                <div class="card-header bg-dark">
                    <div class="ribbon ribbon-warning float-left shadow">
                       <h4> Gallery Albums</h4>
                    </div>
                    <button type="button" class="btn btn-warning float-right text-dark" data-toggle="modal" data-target="#exampleModal">Create Album</button>
                </div>
               
                <div class="card-body">
                    <div class="row">
                    @foreach ($album as $item)
                        
                            <div class="col-md-3">
                                <div class="card border border-warning">
                                    <div class="card-body">
                                        <a href="{{url('admin/gallery/upload_view/'.$item->id)}}"><img src="{{asset('admin/images/no_image.png')}}" height="180px" width="100%" alt=""></a>
                                    </div>
                                    <div class="card-footer">
                                        <h4 class=" text-center">{{$item->title}}</h4>
                                        <h6 class="text-center">{{$item->description}}</h6>
                                        <h6 class="text-center">{{$item->event_date}}</h6>
                                    </div>
                                </div>
                            </div>
                        
                    @endforeach
                         </div>
                </div>
            </div>
        </div>
    </div>

     {{-- modal data --}}
     <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create Album</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{url('admin/create_albume')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Album Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <input type="text" name="description" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Event Date</label>
                        <input type="date" name="event_date" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Status</label><br>
                        <input type="checkbox" name="status" style="height: 20px; width:20px">
                    </div>
                </div>
            </div>
        
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
        </div>
        </div>
  </div>
@endsection
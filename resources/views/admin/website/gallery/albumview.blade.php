@extends('admin.layouts.master')


@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{url('admin/gallery')}}">Gallery Albums</a></li>
                        <li class="breadcrumb-item active">Upload Photos</li>
                    </ol>
                </div>
                <h4 class="page-title">Upload Photos</h4>
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
                       <h4>Upload Photos</h4>
                    </div>
                    <button type="button" class="btn btn-warning float-right text-dark" data-toggle="modal" data-target="#exampleModal">Upload Photos</button>
                </div>
               
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>{{$gview->title}}</h5>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($aview as $item)
                            <div class="col-md-3">
                                <img src="{{asset('uploads/gallery/'.$item->image)}}" class="mt-2 mb-3" style="height:230px; width:100%;" alt="">
                                
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
            <h5 class="modal-title" id="exampleModalLabel">Upload Photos</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{url('admin/store_multiple')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Upload Photos</label>
                        <input type="file" name="images[]" multiple class="form-control">
                        <input type="hidden" name="iid" value="{{$gview->id}}">
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

@section('scripts')

<script>
   
    $('#feature_image').click(function (e) { 
        e.preventDefault();
        alert("ok");
    });

   
</script>

@endsection
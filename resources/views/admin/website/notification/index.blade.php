@extends('admin.layouts.master')


@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('admin/notification')}}">Notication</a></li>
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
                       <h4> All Notification</h4>
                    </div>
                    <button type="button" class="btn btn-warning waves-effect waves-light text-dark float-right" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="far fa-plus-square fa-2x"></i></button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Heading</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($notifications as $row)
                                                <tr>
                                                    <td>{{$row->id}}</td>
                                                    <td>{{$row->heading}}</td>
                                                    <td>From : <?php echo date('d-m-Y', strtotime($row->start_date))?> To : <?php echo date('d-m-Y', strtotime($row->end_date))?></td>
                                                    <td>
                                                        @if ($row->status=='1')
                                                            <p class="badge badge-success">Active</p>
                                                        @else
                                                            <p class="badge badge-danger">InActive</p>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{url('admin/editnotif/'.$row->id)}}"><i class="fe-edit fa-2x me-3"></i></a>
                                                        {{-- <a href="{{url('admin/deletenotification/'.$row->id)}}"><i class="fe-trash fa-2x me-3"></i></a> --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    
                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div>
                    <!-- end row-->
                </div>
            </div>
        </div>
    </div>

  <!--  Modal content for the above example -->
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Add Notification</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="{{url('admin/addnotification')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="">Notification Heading</label>
                            <input type="text" name="heading" id="" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Description</label>
                            <textarea name="description" id="summernote-editor" cols="30" rows="10"></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Select File (If require)</label>
                            <input type="file" name="docs"  id="" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Notification Display From</label>
                            <input type="date" name="start_date"  id="" class="form-control">
                            
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Notification Display To</label>
                            <input type="date" name="end_date"  id="" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" name="status" id="">
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit"  class="btn btn-success float-right ">Save</button>
                            <button type="reset" class="btn btn-danger float-right mr-2">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection

@section('scripts')
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

@endsection
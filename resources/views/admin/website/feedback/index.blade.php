@extends('admin.layouts.master')


@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('admin/feedback')}}">Feedback</a></li>
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
                       <h4> What our Students Speaks ?</h4>
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
                                                <th>Student Name</th>
                                                <th>Photoraph</th>
                                                <th>Feedback</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($feedback as $row)
                                                <tr>
                                                    <td>{{$row->id}}</td>
                                                    <td>{{$row->stud_name}}</td>
                                                    <td>
                                                        <img src="{{asset('uploads/feedback/'.$row->stud_image)}}" height="50px" width="50px" alt="">
                                                    </td>
                                                    <td>{{$row->stud_feedback}}</td>
                                                    <td>
                                                        @if ($row->status=='1')
                                                            <h6 class="badge badge-success">Active</h6>
                                                        @else
                                                            <h6 class="badge badge-danger">InActive</h6>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{url('admin/editfeedback/'.$row->id)}}" class=""><i class="fe-edit fa-2x me-3"></i></a>
                                                        <a href="{{url('admin/deletefeedback/'.$row->id)}}" class=""><i class="fe-trash fa-2x me-3"></i></a>
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
                <h4 class="modal-title" id="myLargeModalLabel">Add Students Feedback</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="{{url('admin/addfeedback')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="">Student Name</label>
                            <input type="text" name="stud_name" id="" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Student Passout or Current Year</label>
                            <input type="text" name="stud_edu_year" id="" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Select Student Image</label>
                            <input type="file" name="stud_image" id="" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Student Feedback</label>
                            <textarea name="stud_feedback" id="summernote-editor" cols="30" rows="10"></textarea>
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
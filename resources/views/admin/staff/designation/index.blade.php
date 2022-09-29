@extends('admin.layouts.master')


@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Designation</li>
                    </ol>
                </div>
               
            </div>
        </div>
    </div>     
    <!-- end page title -->
    <div class="row mt-3 mb-3 justify-content-center">
        <div class="col-md-11">
            @if (session('status'))
            <h4 class="alert alert-warning">{{session('status')}}</h4>
            @endif
            <div id="success_message">

            </div>
            <div class="card ribbon-box border border-dark shadow">
                <div class="card-header bg-dark">
                    <div class="ribbon ribbon-warning float-left shadow">
                       <h4>Designation</h4>
                    </div>
                        <a href="#" class="btn btn-success py-1 px-2 btn-sm float-right" data-toggle="modal" data-target="#con-close-modal"><i class="far fa-plus-square me-3 fa-2x"></i></a>
                </div>
                <div class="card-body">
                    <table id="DesigTable" class='table table-striped'>
                        <thead>
                            <tr>
                                <th>Designation</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($designation as $item)
                                <tr>
                                    <td>{{$item->Designation}}</td>
                                    <td>
                                        @if ($item->Status=='1')
                                            <p class="badge badge-success">Active</p>
                                        @else
                                            <p class="badge badge-danger">InActive</p>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" value="{{$item->id}}" class="btn btn-primary py-1 px-2 btn-sm ml-1 edit_designation" data-toggle="modal" data-target="#EditModal"><i class="far fa-edit "></i></button>
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
{{-- Edit Modal --}}
<div id="EditModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Designation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-4">
                <input type="text" value="" name="" id="edit_id">
                <ul id="updateform_errList"></ul>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="">Designation Name</label>
                            <input type="text" name="Designation" class="form-control" id="EditDesignation">
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-success float-right update_designation">Update</button>
                        </div>
                    </div>
               
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div><!-- /.modal -->
    {{-- Add Modal --}}
    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Designation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4">
                    <form action="{{url('admin/add_designation')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">Designation Name</label>
                                <input type="text" name="Designation" class="form-control" id="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-success float-right">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    
                </div>
            </div>
        </div>
    </div><!-- /.modal -->
@endsection

@section('scripts')

<script>
    $(document).on('click','.edit_designation', function (e) {
        e.preventDefault();
        var did=$(this).val();
        console.log(did);
        $('#EditModal').modal('show');

        $.ajax({
            type: "GET",
            url: "edit_designation/"+did,
            dataType:'JSON',
            success: function (response) {
                console.log(response);
                if (response.status==404) {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.message);
                    }
                    else
                    {
                        $('#EditDesignation').val(response.designation.Designation);
                        $('#edit_id').val(did);
                    }
            }
        });
    });
    $(document).on('click','.update_designation', function (e) {
        e.preventDefault();

        // $(this).text('Updating...');
        var did=$('#edit_id').val();

        var data={
            'Designation':$('#EditDesignation').val(),
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "PUT",
            url: "update_designation/"+did,
            data: data,
            dataType: "JSON",
            success: function (response) {
                console.log(response);
                if(response.status==400)
                {
                    $('#updateform_errList').html("");
                    $('#updateform_errList').addClass('alert alert-danger');
                    $('.update_designation').text("Update");
                }
                else if(response.status==404)
                {
                    $('#updateform_errList').html("");
                    $('#success_message').addClass('alert alert-danger');
                    $('#success_message').text(response.message);
                    $('.update_designation').text("Update");
                }
                else
                {
                    $('#updateform_errList').html("");
                    $('#success_message').html("");
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#EditModal').modal('hide');
                    $('.update_designation').text("Update");
                    $("#DesigTable").load(location.href + " #DesigTable");
                }
            }
        });
    });
</script>

@endsection

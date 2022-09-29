@extends('admin.layouts.master')


@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Inward</li>
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
                       <h4>Edit Inward</h4>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        </div>
                    </div>
                    <form action="{{url('admin/update_inwards/'.$inwards->id)}}"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">Date <span class="text-danger">*</span></label>
                                <input type="date" name="Date" value="{{$inwards->Date}}" class="form-control" id="">
                            </div>
                            <div class="col-md-12 mb-1">
                                <label for="">Recieve From <span class="text-danger">*</span></label>
                                <input type="text" name="RecieveFrom" value="{{$inwards->RecieveFrom}}" class="form-control" id="">
                            </div>
                            <div class="col-md-12 mb-1">
                                <label for="">Title<span class="text-danger">*</span></label>
                                <input type="text" name="Title" value="{{$inwards->Title}}" class="form-control" id="">
                            </div>
                            <div class="col-md-12 mb-1">
                                <label for="">Upload Document</label>
                                <input type="file" name="Document" class="form-control" id="">
                                <a href="{{asset('uploads/inward/'.$inwards->Document)}}">{{$inwards->Document}}</a>
                            </div>
                            <div class="col-md-12 mb-1">
                                <label for="">Description</label>
                                <textarea name="Description" id="summernote-editor" cols="30" rows="10">
                                    {{$inwards->Description}}
                                </textarea>
                            </div>
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect float-right" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success waves-effect waves-light float-right mr-2">Save</button>
                </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
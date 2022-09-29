@extends('admin.layouts.master')


@section('content')

<div class="container mt-3 mb-3">
    <form action="{{url('admin/add_school')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-md-12">
            <h5>School Config</h5>
        </div>
        <div class="col-md-3">
            <label for="">Term Start Date</label>
            <input type="date" name="TermDate" value="{{$schoolconfig->TermDate}}" class="form-control" id="">
        </div>
        <div class="col-md-3">
            <label for="">Age Compare Date</label>
            <input type="date" name="AgeCompareDate" value="{{$schoolconfig->AgeCompareDate}}" class="form-control" id="">
        </div>

        <div class="col-md-12 mt-4">
            <h5>SMS Config</h5>
        </div>
        <div class="col-md-3">
            <label for="">Sender Name</label>
            <input type="text" name="SenderName" value="{{$schoolconfig->SenderName}}" class="form-control" id="">
        </div>
        <div class="col-md-3">
            <label for="">Username</label>
            <input type="text" name="Username" value="{{$schoolconfig->Username}}" class="form-control" id="">
        </div>
        <div class="col-md-3">
            <label for="">Password</label>
            <input type="password" name="Password" class="form-control" id="">
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-info mt-3" >Check SMS Balance</button>
        </div>

        <div class="col-md-12 mt-4">
            <h5>Mail Config</h5>
        </div>
        <div class="col-md-6">
            <label for="">E-mail</label> 
            <span>
                <input type="email" name="Email" value="{{$schoolconfig->Email}}" class="form-control" id=""/>
                <i class="fas fa-info-circle"></i> This Mail Setting is use to send email to inquire, Confirm Student etc.
            </span>
        </div>

        <div class="col-md-12 mt-4">
            <h5>Homepage Config</h5>
        </div>
        <div class="col-md-3 py-2 px-2">
            <input type="checkbox" name="ShowBirthday" {{$schoolconfig->ShowBirthday=='1' ? 'checked':''}} id="">&nbsp;&nbsp;Show Birthday on Homepage
        </div>
        <div class="col-md-3 py-2 px-2">
            <input type="checkbox" name="ShowEvent" {{$schoolconfig->ShowEvent=='1' ? 'checked':''}} id="">&nbsp;&nbsp;Show Events on Homepage
        </div>
        <div class="col-md-3 py-2 px-2">
            <input type="checkbox" name="ShowExam" {{$schoolconfig->ShowExam=='1' ? 'checked':''}} id="">&nbsp;&nbsp;Show Exam on Homepage
        </div>
        <div class="col-md-3 py-2 px-2">
            <input type="checkbox" name="ShowAttend" {{$schoolconfig->ShowAttend=='1' ? 'checked':''}} id="">&nbsp;&nbsp;Show Attendence on Homepage
        </div>


        <div class="col-md-12 mt-4">
            <h5>Holiday & Event Config</h5>
        </div>
        <div class="col-md-3 py-2 px-2 input-group">
            <input type="text" name="EventNotify" value="{{$schoolconfig->EventNotify}}" id="" class="form-control">
            <div class="input-group-append">
                <button type="button" class="btn btn-secondary waves-effect waves-light">Day</button>
            </div>
            Holiday & Event Notify before
        </div>
        <div class="col-md-12 mt-2 mb-3">
            <label for="">Report Header Default</label>
            <textarea name="ReportHeader" id="summernote-editor" cols="30" rows="10">
                {{$schoolconfig->ReportHeader}}
            </textarea>
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-success float-right">Save</button>
        </div>
    </div>
    </form>
</div>

@endsection

@section('scripts')

<script>
    $(document).ready(function () {
        
        @if (session('success'))
            toastr.success('{{ session('success') }}');
        @else
            toastr.failed('{{ session('success') }}');
        @endif
    });
</script>

@endsection
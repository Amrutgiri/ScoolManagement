<div class="container-fluid bg-warning">
    <div class="row">
        <div class="col-md-12">
            <h6 class="text-center text-dark">Managed By : {{$school->trust_name}}</h6>
        </div>
    </div>
</div>
<div class="container-fluid stud_main2 sticky-top">
    <div class="row">
        <div class="col-md-12">
            <img src="{{asset('uploads/school/'.$school->school_logo)}}" class="frontendlogo" alt="" height="100px">
        </div>
        <div class="col-md-12 ">
            <h5 class="text-white float-end"> 
                <a href="{{url('/')}}" class="text-decoration-none text-white me-4">Home</a>
                @foreach ($allpages as $row)
                    <a href="{{url('oneview/'.$row->id)}}" class="text-decoration-none text-white me-4">{{$row->heading}}</a>
                @endforeach
               
                <a href="{{ route('login') }}" class="btn btn-warning btn-rounded me-5">Login</a>
            </h5>
        </div>
    </div>
</div>
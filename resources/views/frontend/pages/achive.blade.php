@extends('frontend.home')


@section('content')

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{$achive->heading}}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <img src="{{url('uploads/achivement/'.$achive->image)}}" height="350px" width="250px">
                        </div>
                        <div class="col-md-7">
                            {!! $achive->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

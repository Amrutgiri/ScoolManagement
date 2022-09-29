@extends('frontend.home')


@section('content')

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            
                <div class="card card-body shadow text-center">
                    <h4>{{$oneview->heading}}</h4>
                </div>
            
            <div class="card card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="" alt="">
                    </div>
                    <div class="col-md-8">
                        {!!$oneview->description!!}
                    </div>
                </div>
            </div>
          
        </div>
    </div>
</div>

@endsection



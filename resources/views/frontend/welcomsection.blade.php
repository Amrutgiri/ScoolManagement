<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{asset('uploads/welcome/'.$welcome->image)}}" class="welcome_left" alt="">
        </div>
        <div class="col-md-6">
           <h3 class="text-primary text-center">{{$welcome->heading}}</h3>
           <hr>
           <p>
               {!! $welcome->description !!}
            </p>
            
        </div>
    </div>
</div>
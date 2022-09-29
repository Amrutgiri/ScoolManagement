<div class="container-fluid">
    <div class="container">
        <div class="row page_section">
            <div class="col-md-12 ">
                <h1 class="text-center text-white">Our Achievements</h1>  
            </div>
        </div>
        <div class="row mt-3">
            
                @foreach ($achive as $row)
                <div class="col-md-3">
                    <div class="card shadow border border-primary" style="height: 450px;width:300px">
                        <div class="card-body">
                            <a href="#">
                                <img src="{{asset('uploads/achivement/'.$row->image)}}" height="200px" width="100%" alt="">
                                
                            </a>
                        </div>
                        <div class="card-footer">
                            <h4 class="text-center text-primary">{{$row->heading}}</h4>
                            <p class="text-end">
                                {{$row->created_at}}
                            </p>
                            <a href="{{url('achive/'.$row->id)}}"><h6 class="float-end text-dark">View More >></h6></a>
                        </div>
                    </div>
                </div>
                @endforeach
            
        </div>
    </div>
</div>
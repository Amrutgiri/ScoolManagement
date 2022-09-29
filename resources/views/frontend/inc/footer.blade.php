<div class="container-fluid stud_main1 mt-2">
    <div class="container">
        <div class="row">
            <div class="col-md-1 text-center">
                <i class="fa fa-envelope fa-3x text-primary" aria-hidden="true"></i>
            </div>
            <div class="col-md-3">
                <h4 class="text-warning">Mail US</h4>
                <h5 class="text-white">{{$school->email}}</h5>
            </div>
            <div class="col-md-1 text-center">
                <i class="fa fa-phone fa-3x text-primary" aria-hidden="true"></i>
            </div>
            <div class="col-md-3">
                <h4 class="text-warning">Call US</h4>
                <h5 class="text-white">+91 {{$school->contact2}}/{{$school->contact1}}</h5>
            </div>
            <div class="col-md-1 text-center">
                <i class="fa fa-map-marker fa-3x text-primary" aria-hidden="true"></i>
            </div>
            <div class="col-md-3">
                <h4 class="text-warning">Find US</h4>
                <h5 class="text-white">{{$school->address}}</h5>
            </div>
            <hr style="border-bottom:2px solid white;">
            <div class="col-md-3 text-center">
                <img src="{{asset('uploads/school/'.$school->school_logo)}}" width="160px" height="180px" alt="">
            </div>
            <div class="col-md-3 py-3 px-2">
                <h4 class="text-warning">Useful Links</h4>
                <ul>
                    <li class="text-white">News Events</li>
                    <li class="text-white">Achievement</li>
                    <li class="text-white">Documents</li>
                    <li class="text-white">About Us</li>
                </ul>
            </div>
            <div class="col-md-3 mt-4 py-3 px-2">
                <h4 class="text-warning"></h4>
                <ul>
                    <li class="text-white">Gallery</li>
                    <li class="text-white">Dignitories</li>
                    <li class="text-white">Contact Us</li>
                    
                </ul>
            </div>
            <div class="col-md-3 py-3 px-2">
                <h4 class="text-warning">Follow Us</h4>
                <i class="fa fa-facebook fa-2x text-white px-3" aria-hidden="true"></i>
                <i class="fa fa-twitter fa-2x text-primary px-3" aria-hidden="true"></i>
                <i class="fa fa-youtube-play fa-2x text-danger px-3" aria-hidden="true"></i>
                <i class="fa fa-whatsapp fa-2x text-success px-3" aria-hidden="true"></i>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid stud_main2">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h5 class="text-white text-center">Copyright © 2022 All Rights Reserved by {{$school->name}} | Managed by {{$school->trust_name}}</h5>
        </div>
    </div>
</div>
</div>

<div class="container-fluid sticky-bottom">
    
        <div class="row bg-success text-white">
            <div class="col-md-12">
                <marquee behavior="" scrolldelay="150" direction="">
                    @foreach ($noti as $row)
                       || <a href="" class="text-warning text-decoration-none">{{$row->heading}}</a>
                    @endforeach
                </marquee>
            </div>
        </div>
    
</div>
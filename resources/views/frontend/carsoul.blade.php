
<div id="school" class="carousel slide" data-bs-ride="carousel">

    <!-- Indicators/dots -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#school" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#school" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#school" data-bs-slide-to="2"></button>
    </div>
    
    <!-- The slideshow/carousel -->
    <div class="carousel-inner">
      
        @foreach ($carousel as $row)
        <div class="carousel-item active">
          <img src="{{asset('uploads/carousel/'.$row->image)}}" alt="Los Angeles" class="d-block" style="width:100%;height:500px;">
        </div>
        @endforeach
        
      
    </div>
    
    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#school" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#school" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
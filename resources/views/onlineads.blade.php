@extends('layouts.main')
@section('content')
<div class="gallery">
  <ul>
     <li><a href="{{asset('assets/images/img1.jpg')}}"><img src="{{asset('assets/images/img1.jpg')}}" alt="" style="width: calc( 100% - 20px )" /></a></li>
     <div class="clear"></div>
  </ul>
</div>
<div class="content">
  <div class="content-text">
     <h2>Today's Promotion</h2>
     <div class="content-details">
        <p >Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>   
        <a href="" class="btn btn-primary custom-link">Promoted</a>
     </div>
  </div>
  <div class="content-text">
     <h2>Yesterday's Traffic</h2>
     <div class="content-details">
        <span class="traffic-count">12,232</span>   
        <br>
        <span style="font-size: 26px;">Thanks !!! </span>
     </div>
  </div>
  <div class="content-text">
     <h2>About Us</h2>
     <div class="content-details">
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>   
        
     </div>
  </div>
  <div class="content-text">
     <h2>Contact Us</h2>
     <div class="content-details" id="social_icons">
        <div class="btn__container">
          <a href="https://www.instagram.com/narendramodi/" class="btn">
            <i class="fab fa-instagram"></i>
            <span>instagram</span>
          </a>
            <a href="https://twitter.com/narendramodi" class="btn-f">
            <i class="fab fa-twitter"></i>
            <span>Twitter</span>
          </a>
        </div>
     </div>
     </div>
  </div>
</div>
@endsection
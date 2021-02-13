@extends('layouts.front')
@section('content')
<style type="text/css">
    .navbar-light .navbar-brand{
        color: #872166;
        font-weight: 800;
        font-size: 30px;
        padding: 0;
    }
    div#collapsibleNavbar{
        margin-top: 0;
    }
    header .header-wrapper{
        box-shadow: 0 5px 10px 0 rgba(79,36,85,.15)
    }
    .navbar-light .navbar-nav .nav-link{
        color: #872166;
        font-weight: 600;
    }
    #custom_box{
    background: white;
    color: black !important;
    padding: 10px;
    font-size: 22px;
    font-weight: 700;
    border-radius: 5px;
    margin: 0px 5px 10px;
   }

  .error {
    color: red;
  }
  .razorpay-payment-button {
    display: none;
  }

</style>
<style type="text/css">
  .owl-theme .owl-nav{
    display: none;
  }
  .custom-line{
    color: white;
    margin-bottom: 30px;
  }
  .w3l-contact-main .form-group .form-control{
    background-color: white;
  }
  .form-group-radio input{
    -webkit-appearance: radio;
    display: inline-block;
    width: 30px !important;
  }
  .form-group-radio label{
    display: inline-block !important;
    vertical-align: middle;
  }
  ul.breadcrumbs-custom-path.generate-id {
    text-align: center;
}
.w3l-contact-main .content-grids-cont.tt {
    grid-template-columns: 1fr 1fr 1fr;    
}
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
<section class="w3l-inner-banner-main">
  <div class="about-inner inner2">
    <div class="wrapper seen-w3">
      <div class="custom-line">
        <span id="custom_box" class="avail-post">
          @php 
            echo ($total_product < $post)?$post-$total_product:"0";
          @endphp 
        </span>/<span id="custom_box">{{$post}}</span> 
        <p style="margin-top: 25px; color: white">Posts Available in this Hour</p> 
      </div>      
      
      <ul class="breadcrumbs-custom-path">
        <li id="custom_box" style="margin-top: 13px; cursor: pointer;" class="pick-one">Pick</li>
      </ul>

      <ul class="breadcrumbs-custom-path">
        <!-- <li id="custom_box" style="margin-top: 13px; cursor: pointer;" class="pick-one">Pick</li> -->
        <li id="demo"></li>
      </ul>     
    </div>
  </div>
</section>

<div class="w3l-contact-main" style="display: none" id="form-div">
    <div class="contact sec-padding">
        <div class="wrapper">
           <ul class="breadcrumbs-custom-path generate-id" style="display: none">
            <ul class="active custom-box product-id" id="custom_box">Post ID: </ul>        
          </ul>
            <div class="contact-form mx-auto pt-sm-4">
                <form method="post" action="{!!route('payment')!!}" id="register"  enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="product_id" value="" id="product_id">
                    <div class="d-grid content-grids-cont">
                        <div class="form-group">
                            <label for="w3lName">Name</label>
                            <input id="name" type="text" class="form-control" name="name" required=""  placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="w3lSender">Email ID</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="">
                        </div>
                                                
                    </div>

                    <div class="form-group">
                        <label for="w3lSender">Mobile Number</label>
                        <input type="number" class="form-control" name="mobile" id="mobile" placeholder="eg :  +1 2345 6789" required="">
                      </div>
                    
                    <div class="form-group">
                        <label for="w3lSubject">Networks / Website</label>
                        <select class="form-control" id="network" name="network" required="">
                            <option value="">Your Promotional Link Belongs to</option>
                            @foreach($network as $net)
                                <option value="{{$net->id}}">{{$net->name}}</option>
                            @endforeach
                        </select>                        
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                          <label for="last_name" class="control-label">Country</label>
                          <select class="form-control" id="country" name="country" required="">
                            <option value="">Select Country</option>
                            @foreach($country as $cntry)
                                <option value="{{$cntry->id}}" data-tax="{{$cntry->tax}}" data-fee="{{$cntry->fee}}" data-currency="{{$cntry->currency}}">{{$cntry->name}}</option>
                            @endforeach
                          </select>                          
                          <p class="help-block"></p>
                        </div>
                    </div>
                  <div class="form-group">
                    <label for="language" class="control-label">Language</label>
                    <select class="form-control" id="language" name="language" required="">
                      <option value="">Select Language</option>
                      @foreach($language as $lang)
                          <option value="{{$lang->id}}">{{$lang->name}}</option>
                      @endforeach
                    </select>
                    
                    <p class="help-block"></p>
                  </div>
                  <div class="form-group">
                    <label for="promotional_link" class="control-label">Promotional Link</label>
                    <input id="promotional_link" type="text" class="form-control" name="promotional_link" required="" value="" placeholder="Promotional Link">
                    <p class="help-block"></p>
                  </div>
                  <div class="form-group">
                    <label for="image" class="control-label">Upload Image</label>
                    <input type="file"  class="form-control" id="image" required="" name="image">  
                    <p class="help-block"></p>
                  </div>

                  <div class="d-grid content-grids-cont tt">
                    <div class="form-group">
                      <label for="state" class="control-label">Fee</label>
                      <input id="fee" type="text" class="form-control" name="fee"  value="" placeholder="Fee" readonly="">
                    </div>
                    <div class="form-group">
                      <label for="state" class="control-label">Tax</label>
                      <input id="tax" type="text" class="form-control" name="tax"  value="" placeholder="Tax" readonly="">
                    </div>
                    <div class="form-group">
                      <label for="state" class="control-label">Total</label>
                      <input id="total" type="text" class="form-control" name="total"  value="" placeholder="Total" readonly="">
                    <p class="help-block"></p>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="pop_signup_password" class="control-label">Post/Content Display to</label>
                    <div class="form-group-radio">
                      <input type="radio" id="0" name="post_type" value="0" class="form-control" required="">
                      <label for="0">All</label>
                    </div>
                    <div class="form-group-radio">
                      <input type="radio" id="1" name="post_type" value="1" class="" required=""> 
                      <label for="1">Above 18</label>
                    </div>                     
                    <p class="help-block"></p>
                  </div>



                  <div class="form-group">
                    <label for="pincode" class="control-label">{{$company_name}}</label>
                    <input id="company_name" type="text" class="form-control" name="company_name" placeholder="Type Above Text Here">                    
                    <p class="help-block"></p>
                  </div>
                  <div class="form-group form-group-radio">
                    <label for="pincode" class="control-label"></label>
                    <input id="term" type="checkbox" class="form-control" name="term" required="">
                    <label for="term">I agree to <a href="{{url('term-condition')}}">Terms and Conditions</a></label>
                    <p class="help-block"></p>
                  </div>                  
                    
                    <div class="form-group" style="text-align: center;" id="head">
                      <button type="button" class="btn button-eff button-eff-2" id="pay-btn">Pay</button>                    
                    </div>

                    <!-- <script src="https://checkout.razorpay.com/v1/checkout.js"
                            data-key="{{ env('ROZOR_KEY') }}"
                            data-amount="1000"
                            data-buttontext="Pay"
                            data-name="Tacepook"                          
                            data-currency="USD"                          
                            data-description="Order Value"
                            data-image="https://i.pinimg.com/originals/33/b8/69/33b869f90619e81763dbf1fccc896d8d.jpg"
                            data-prefill.name="name"
                            data-prefill.email="email"
                            data-theme.color="#ff7529">
                    </script> -->
                </form>              
                                        
            </div>            
        </div>
    </div>
</div>

<div class="w3l-products-4">
    <div id="products4-block" class="text-center" style="padding: 0;padding-bottom: 40px;">
        <div class="wrapper">            
            <input id="tab1" type="radio" name="tabs" checked="">
            <section id="content1" class="tab-content text-left">
              <h3 class=title-main>Promoted</h3>
                <div class="d-grid grid-col-3" id="search-add-post">
                    <div class="product">
                        <a href="#product"><img src="https://demo.w3layouts.com/demosWTR/Starter30-11-2019/classify-starter-demo_Free/1561860545/web/assets/images/c1.jpg" class="img-responsive" alt=""></a>
                        <div class="info-bg">
                            <h5><a href="#product">Empty Pages Private Limited</a></h5>
                        </div>
                    </div>
                    <div class="product">
                        <a href="#product"><img src="https://demo.w3layouts.com/demosWTR/Starter30-11-2019/classify-starter-demo_Free/1561860545/web/assets/images/c1.jpg" class="img-responsive" alt=""></a>
                        <div class="info-bg">
                            <h5><a href="#product">Secminhr Private Limited</a></h5>
                        </div>
                    </div>
                    <div class="product">
                        <a href="#product"><img src="https://demo.w3layouts.com/demosWTR/Starter30-11-2019/classify-starter-demo_Free/1561860545/web/assets/images/c1.jpg" class="img-responsive" alt=""></a>
                        <div class="info-bg">
                            <h5><a href="#product">AN IT Company - Software Services</a></h5> 
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<script type="text/javascript">
  function loadfile(filename,amount,currency) {
      var fileref=document.createElement('script')
      //fileref.setAttribute("type","text/javascript")
      fileref.setAttribute("src", filename)
      fileref.setAttribute("data-key", '{{ env("ROZOR_KEY") }}')
      fileref.setAttribute("data-amount", amount*100)
      fileref.setAttribute("data-buttontext", 'Pay')
      fileref.setAttribute("data-name", 'Tacepook')
      fileref.setAttribute("data-currency", currency)
      fileref.setAttribute("data-description", 'Pay')
      fileref.setAttribute("data-image", 'https://i.pinimg.com/originals/33/b8/69/33b869f90619e81763dbf1fccc896d8d.jpg')
      fileref.setAttribute("data-prefill.name", 'name')
      fileref.setAttribute("data-prefill.email", 'email')
      fileref.setAttribute("data-theme.color", '#ff7529')
      if (typeof fileref!="undefined")
      document.getElementById("register").appendChild(fileref)
}
</script>

@endsection

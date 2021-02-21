@extends('layouts.front')
@section('content')
<style type="text/css">
.w3l-products-4 section.tab-content {
    display: block;
}
.w3l-content-11-main .content-design-11 {    
    background: #f8f9fa00;
}
.img-responsive{
    width: 100%;
    
}
.custom-design-cards .product{
    padding: 19px;
    background-color: white;
    box-shadow: 0 10px 30px 0 rgba(17, 17, 17, 0.09);

}
.custom-design-cards .info-bg{
    box-shadow: none;
    padding: 25px 0px;
}

.custom-design-cards .button-type-1{
    display: inline-block !important;
    background-color: #f55b70;
    color: white;
    padding: 10px 20px;
    margin-left: 10px;
    font-weight: 700;
}
.custom-design-cards .button-type-2{
    display: inline-block !important;
    border: 1px solid #f55b70;
    padding: 8px;
    margin-left: 10px;
}
.custom-design-cards .product{
    position: relative;
}
#search-add-post .settings-dropdown{
    position: absolute;
    right: 7px;
    top: 18px;
    font-size: 22px;
}  

.settings-dropdown-wrapper{
    display: none;
    position: absolute;
    right: -32px;
    top: 42px;
    z-index: 9;
    list-style: none;
    background: white;
    box-shadow: 0 10px 30px 0 rgba(17, 17, 17, 0.09);

}
.settings-dropdown-wrapper > li {
    padding: 10px;
    border-bottom: 1px solid #e8e8e8;
    cursor: pointer;
}
.settings-dropdown-wrapper > li:last-child{
    border-bottom: none;
}
.w3l-banner-3-main .banner-3{
    background: none;
}
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 15%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.owl-nav{display: none;}

.owl-dots{
    position: absolute;
    bottom: 30px;
    width: 100%;
    text-align: center;
}
.owl-dots .owl-dot{
    width: 14px;
    height: 14px;
    border: 1px solid #e8e8e8 !important;
    margin-right: 10px;
    border-radius: 50%;
}
.owl-dots .owl-dot.active{
    background-color: white;
}

</style>
    <section class="w3l-banner-3-main owl-carousel">
        <div class="banner-3 item" style="background-image: url(https://cdn.pixabay.com/photo/2016/09/22/10/44/banner-1686943_960_720.jpg);animation: unset;background-size: cover;">
            <div class=wrapper>
                <div class=cover-top-center-9>
                    <div class=w3ls_cover_txt-9>
                        <h3 class=title-cover-9>Publish Your Content @ Lowest Price</h3>
                        <p class=para-cover-9>Now Enjoy Current Affairs around World in One Click.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-3 item" style="background-image: url(https://cdn.pixabay.com/photo/2016/09/22/10/44/banner-1686943_960_720.jpg);animation: unset;background-size: cover;">
            <div class=wrapper>
                <div class=cover-top-center-9>
                    <div class=w3ls_cover_txt-9>
                        <h3 class=title-cover-9>Publish Your Content @ Lowest Price</h3>
                        <p class=para-cover-9>Now Enjoy Current Affairs around World in One Click.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-3 item" style="background-image: url(https://cdn.pixabay.com/photo/2016/09/22/10/44/banner-1686943_960_720.jpg);animation: unset;background-size: cover;">
            <div class=wrapper>
                <div class=cover-top-center-9>
                    <div class=w3ls_cover_txt-9>
                        <h3 class=title-cover-9>Publish Your Content @ Lowest Price</h3>
                        <p class=para-cover-9>Now Enjoy Current Affairs around World in One Click.</p>
                    </div>
                </div>
            </div>
        </div>

    </section>   
    
    <section class=w3l-search-form-3-main>
        <div class=search-form-3>
            <div class=wrapper>
                <div class=section-width style="margin: 0 auto;">                    
                    <form id="search-post" method="post" class="search-3-gd">
                        <div class="d-flex grids-icon grids-icon-2">
                            <span class="fa fa-tags" aria-hidden=true></span>
                            <div class=input-group-btn>
                                <select class="btn btn-default" id="language" name="language" required="" >
                                    <option value="">Select Languages</option>
                                    @foreach($languages as $lang)
                                        <option value="{{$lang->id}}">{{$lang->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="button" class="btn button-eff" id="search-lang-post">
                            <span class="fa fa-search" aria-hidden="true"></span>
                            Search
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    <div class="w3l-products-4 custom-design-cards">
        <div id="products4-block" class="text-center">
            <div class="wrapper">
                <h3 class="title-main" id="prmt">Promoted</h3>
               
                <section id="content1" class="tab-content text-left">
                    <div class="d-grid grid-col-3" id="search-add-post">
                        <div class="product">
                            <a href="https://emptypages.world"><img src="https://demo.w3layouts.com/demosWTR/Starter30-11-2019/classify-starter-demo_Free/1561860545/web/assets/images/c1.jpg" class="img-responsive" alt=""></a>
                            <div class="info-bg">
                                <h5><a href="https://emptypages.world">Empty Pages Private Limited</a></h5>
                            </div>
                        </div>
                        <div class="product">
                            <a href="https://secminhr.com"><img src="https://demo.w3layouts.com/demosWTR/Starter30-11-2019/classify-starter-demo_Free/1561860545/web/assets/images/c1.jpg" class="img-responsive" alt=""></a>
                            <div class="info-bg">
                                <h5><a href="https://secminhr.com">Secminhr Private Limited</a></h5> 
                            </div>
                        </div>
                        <div class="product">
                            <a href="https://anitco.in"><img src="https://demo.w3layouts.com/demosWTR/Starter30-11-2019/classify-starter-demo_Free/1561860545/web/assets/images/c1.jpg" class="img-responsive" alt=""></a>
                            <div class="info-bg">
                                <p><a href="https://anitco.in"><b>AN IT CO</b>mpany - Software Services</a></p> 
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    
    <section class=w3l-content-11-main>
        <div class=content-design-11>
            <div class=wrapper>
                <h3 class=title-main>Why Choose Us?</h3>
                <div class="content-sec-11 column content-text">
                    <div class=columns>
                        <div class=icon-eff>
                            <span class="fa fa-book" aria-hidden=true></span>
                        </div>
                        <div class=right-side>
                            <h4>Full Documented</h4>
                            <p> Fusce faucibus ante vitae justo efficitur elementum. Donec ipsum faucibus.</p>
                        </div>
                    </div>
                    <div class=columns>
                        <div class=icon-eff>
                            <span class="fa fa-newspaper-o" aria-hidden=true></span>
                        </div>
                        <div class=right-side>
                            <h4>Awesome Layout</h4>
                            <p> Fusce faucibus ante vitae justo efficitur elementum. Donec sed faucibus.</p>
                        </div>
                    </div>
                    <div class=columns>
                        <div class=icon-eff>
                            <span class="fa fa-paper-plane" aria-hidden=true></span>
                        </div>
                        <div class=right-side>
                            <h4>Clean & Modern Design</h4>
                            <p> Suspendisse condimentum eget ligula a posuere. Duis ipsum et gravida.</p>
                        </div>
                    </div>
                    <div class=columns>
                        <div class=icon-eff>
                            <span class="fa fa-thumbs-up" aria-hidden=true></span>
                        </div>
                        <div class=right-side>
                            <h4>Super Support</h4>
                            <p> Suspendisse condimentum eget ligula a posuere. Duis ipsum etarcu dffdut.
                            </p>
                        </div>
                    </div>
                    <div class=columns>
                        <div class=icon-eff>
                            <span class="fa fa-magic" aria-hidden=true></span>
                        </div>
                        <div class=right-side>
                            <h4>Great Features</h4>
                            <p> Suspendisse condimentum eget ligula a posuere. Duis ipsum et rcu fdsut.</p>
                        </div>
                    </div>
                    <div class=columns>
                        <div class=icon-eff>
                            <span class="fa fa-handshake-o" aria-hidden=true></span>
                        </div>
                        <div class=right-side>
                            <h4>User Friendly</h4>
                            <p> Fusce faucibus ante vitae justo efficitur elementum. Donec sed faucibus.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    

    <!-- Modal -->
    <!-- <div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div> -->

    <div id="shareModal" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
        <span class="close">&times;</span>
        <p>
            <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                <a class="a2a_button_facebook" href="https://web.skype.com/"></a>
                <a class="a2a_button_twitter"></a>
                <a class="a2a_button_pinterest"></a>
                <!-- <a class="a2a_dd" href="https://www.addtoany.com/share"></a> -->
            </div>
            <script async src="https://static.addtoany.com/menu/page.js"></script>
        </p>
      </div>
    </div>
       
@endsection



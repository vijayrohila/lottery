@extends('layouts.front')
@section('content')
<style type="text/css">
.w3l-products-4 section.tab-content {
    display: block;
}
.w3l-content-11-main .content-design-11 {    
    background: #f8f9fa00;
}
</style>
    <section class=w3l-banner-3-main>
        <div class=banner-3>
            <div class=wrapper>
                <div class=cover-top-center-9>
                    <div class=w3ls_cover_txt-9>
                        <h3 class=title-cover-9>Buy, Sell, Rent & Exchange in one Click</h3>
                        <p class=para-cover-9>Once aute irure dolor in reprehenderit in voluptate velit
                            esse cillum dolore eu fugiat nulla pariatur consectetur adipiscing elit.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>   
    
    <section class=w3l-search-form-3-main>
        <div class=search-form-3>
            <div class=wrapper>
                <div class=section-width style="margin: 0 auto;width: 680px">                    
                    <form id="search-post" method="post" class="search-3-gd">
                        <div class="d-flex grids-icon grids-icon-2">
                            <span class="fa fa-tags" aria-hidden=true></span>
                            <div class=input-group-btn>
                                <select class="btn btn-default" id="language" name="language" required="" >
                                    <option selected>Select Languages</option>
                                    @foreach($languages as $lang)
                                        <option value="{{$lang->id}}">{{$lang->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn button-eff"><span class="fa fa-search" aria-hidden="true"></span>Search</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
   <!--  <form id="search-post" method="post">
        <div class="row text-center p-5 m-0" style="background-color: #e8e8e8">
          <div class="col-md-2"></div>       
            <div class="col-md-4">
              <select class="form-control " id="language" name="language" required="" >
                <option value="">Select Language</option>
                @foreach($languages as $lang)
                    <option value="{{$lang->id}}">{{$lang->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-4">
              <button type="submit" class="form-control custom-button">Submit</button>
            </div>      
        </div>
       </form> -->
       <!-- <div class="row text-center p-5 m-0" id="search-add-post">
          @foreach($products as $product)
             <div class="col-md-4">
                <div class="product-wrapper">
                   <div class="product-image-wrapper">
                      <img src="{{url('/admin/public/product/1598189039download.jpg')}}">
                   </div>
                   <div class="product-content-wrapper">
                      <div class="product-title">{{$product->name}}</div>
                      <div class="product-price">${{$product->cost}}/-</div>
                      <div class="product-id">{{$product->product_id}}</div>
                      <div class="product-actions">     
                          <a href="#" class="btn btn-primary">Link</a>
                          <ion-icon name="add"></ion-icon>
                      </div>
                   </div>
                </div>
             </div>
          @endforeach
       </div> -->
    
    <div class=w3l-products-4>
        <div id=products4-block class=text-center>
            <div class=wrapper>
                <!-- <input id=tab1 type=radio name=tabs checked>
                <label class=tabtle for=tab1>Latest Ads</label>

                <input id=tab2 type=radio name=tabs>
                <label class=tabtle for=tab2>Featured Ads</label>

                <input id=tab3 type=radio name=tabs>
                <label class=tabtle for=tab3>Ending Soon</label> -->

                <section id=content1 class="tab-content text-left">
                    <div class="d-grid grid-col-3">
                        @foreach($products as $product)
                        <div class=product>
                            <a href=#product><img src="{{ env('ADMIN_URL').'/product/1598189039download.jpg'}}" class=img-responsive alt=""></a>
                            <div class=info-bg>
                                <h5><a href=#product>{{$product->name}}</a></h5>
                                <p>{{$product->product_id}}</p>
                                <ul class=d-flex>
                                    <li><span class="fa fa-usd"></span> {{$product->cost}}</li>
                                    <li class=margin-effe><a href=#fav title="Add this to Favorite"><span class="fa fa-heart-o"></span></a></li>
                                    <li><a href=#sahre title=Share><span class="fa fa-share"></span></a></li>
                                </ul>
                            </div>
                        </div>   
                        @endforeach                     
                    </div>
                </section>

                <!-- <section id=content2 class="tab-content text-left">
                    <div class="d-grid grid-col-3">
                        <div class=product>
                            <a href=#product><img src=assets/images/c4.jpg class=img-responsive alt=""></a>
                            <div class=info-bg>
                                <h5><a href=#product>Sed ut perspiciatis unde omnis iste natus</a></h5>
                                <p>Nulla ex nunc</p>
                                <ul class=d-flex>
                                    <li><span class="fa fa-usd"></span> 1200</li>
                                    <li class=margin-effe><a href=#fav title="Add this to Favorite"><span class="fa fa-heart-o"></span></a></li>
                                    <li><a href=#sahre title=Share><span class="fa fa-share"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class=product>
                            <a href=#product><img src=assets/images/c6.jpg class=img-responsive alt=""></a>
                            <div class=info-bg>
                                <h5><a href=#product>Eaque ipsa quae ab illo inventore veritatis</a></h5>
                                <p>Nulla ex nunc</p>
                                <ul class=d-flex>
                                    <li><span class="fa fa-usd"></span> 299</li>
                                    <li class=margin-effe><a href=#fav title="Add this to Favorite"><span class="fa fa-heart-o"></span></a></li>
                                    <li><a href=#sahre title=Share><span class="fa fa-share"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class=product>
                            <a href=#product><img src=assets/images/pr4.jpg class=img-responsive alt=""></a>
                            <div class=info-bg>
                                <h5><a href=#product>Quasi architecto beatae vitae dicta sunt</a></h5>
                                <p>Nulla ex nunc</p>
                                <ul class=d-flex>
                                    <li><span class="fa fa-usd"></span> 499</li>
                                    <li class=margin-effe><a href=#fav title="Add this to Favorite"><span class="fa fa-heart-o"></span></a></li>
                                    <li><a href=#sahre title=Share><span class="fa fa-share"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class=product>
                            <a href=#product><img src=assets/images/ps4.jpg class=img-responsive alt=""></a>
                            <div class=info-bg>
                                <h5><a href=#product>Nemo enim ipsam quia voluptas sit et expedita</a></h5>
                                <p>Nulla ex nunc</p>
                                <ul class=d-flex>
                                    <li><span class="fa fa-usd"></span> 800</li>
                                    <li class=margin-effe><a href=#fav title="Add this to Favorite"><span class="fa fa-heart-o"></span></a></li>
                                    <li><a href=#sahre title=Share><span class="fa fa-share"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class=product>
                            <a href=#product><img src=assets/images/c3.jpg class=img-responsive alt=""></a>
                            <div class=info-bg>
                                <h5><a href=#product>Quasi architecto beatae vitae dicta sunt</a></h5>
                                <p>Nulla ex nunc</p>
                                <ul class=d-flex>
                                    <li><span class="fa fa-usd"></span> 499</li>
                                    <li class=margin-effe><a href=#fav title="Add this to Favorite"><span class="fa fa-heart-o"></span></a></li>
                                    <li><a href=#sahre title=Share><span class="fa fa-share"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>

                <section id=content3 class="tab-content text-left">
                    <div class="d-grid grid-col-3">
                        <div class=product>
                            <a href=#product><img src=assets/images/ps6.jpg class=img-responsive alt=""></a>
                            <div class=info-bg>
                                <h5><a href=#product>Sed ut perspiciatis unde omnis iste natus</a></h5>
                                <p>Nulla ex nunc</p>
                                <ul class=d-flex>
                                    <li><span class="fa fa-usd"></span> 1200</li>
                                    <li class=margin-effe><a href=#fav title="Add this to Favorite"><span class="fa fa-heart-o"></span></a></li>
                                    <li><a href=#sahre title=Share><span class="fa fa-share"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class=product>
                            <a href=#product><img src=assets/images/pr6.jpg class=img-responsive alt=""></a>
                            <div class=info-bg>
                                <h5><a href=#product>Eaque ipsa quae ab illo inventore veritatis</a></h5>
                                <p>Nulla ex nunc</p>
                                <ul class=d-flex>
                                    <li><span class="fa fa-usd"></span> 299</li>
                                    <li class=margin-effe><a href=#fav title="Add this to Favorite"><span class="fa fa-heart-o"></span></a></li>
                                    <li><a href=#sahre title=Share><span class="fa fa-share"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class=product>
                            <a href=#product><img src=assets/images/pj4.jpg class=img-responsive alt=""></a>
                            <div class=info-bg>
                                <h5><a href=#product>Quasi architecto beatae vitae dicta sunt</a></h5>
                                <p>Nulla ex nunc</p>
                                <ul class=d-flex>
                                    <li><span class="fa fa-usd"></span> 499</li>
                                    <li class=margin-effe><a href=#fav title="Add this to Favorite"><span class="fa fa-heart-o"></span></a></li>
                                    <li><a href=#sahre title=Share><span class="fa fa-share"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class=product>
                            <a href=#product><img src=assets/images/c5.jpg class=img-responsive alt=""></a>
                            <div class=info-bg>
                                <h5><a href=#product>Ut enim ad minima veniam, quis nostrum</a></h5>
                                <p>Nulla ex nunc</p>
                                <ul class=d-flex>
                                    <li><span class="fa fa-usd"></span> 1300</li>
                                    <li class=margin-effe><a href=#fav title="Add this to Favorite"><span class="fa fa-heart-o"></span></a></li>
                                    <li><a href=#sahre title=Share><span class="fa fa-share"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section> -->

            </div>
        </div>
    </div>
    
    <!-- <section class=w3l-grids-9-main>
        <div class=grid-top-9>
            <div class=wrapper>
                <h3 class=title-main>Popular Locations</h3>
                <div class="d-grid grid-col-3 grid-element-9 margin-bottom">
                    <div class="left-grid-ele-9 grid-bg3">
                        <div class=sub-wid-grid-9>
                            <h4 class=text-grid-9><a href=#product>London</a></h4>
                            <p class=sub-para>Sed ut perspi</p>
                        </div>
                    </div>
                    <div class="left-grid-ele-9 grid-bg4">
                        <div class=sub-wid-grid-9>
                            <h4 class=text-grid-9><a href=#product>Japan</a></h4>
                            <p class=sub-para>Sed ut perspi</p>
                        </div>
                    </div>
                    <div class="left-grid-ele-9 grid-bg5">
                        <div class=sub-wid-grid-9>
                            <h4 class=text-grid-9><a href=#product>France</a></h4>
                            <p class=sub-para>Sed ut perspi</p>
                        </div>
                    </div>
                </div>
                <div class="d-grid grid-col-2 grid-element-9">
                    <div class="left-grid-ele-9 grid-bg1">
                        <div class=sub-wid-grid-9>
                            <h4 class=text-grid-9><a href=#product>New Jersy</a></h4>
                            <p class=sub-para>Sed ut perspi</p>
                        </div>
                    </div>
                    <div class="left-grid-ele-9 grid-bg2">
                        <div class=sub-wid-grid-9>
                            <h4 class=text-grid-9><a href=#product>Paris</a></h4>
                            <p class=sub-para>Sed ut perspi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    
    
    <!-- <section class=w3l-specifications-9>
        <div class=main-w3>
            <div class=overlay>
                <div class=wrapper>
                    <div class="d-flex main-cont-wthree-fea text-center">
                        <div class=grids-speci>
                            <div class=stats-icon>
                                <span class="fa fa-bullhorn" aria-hidden=true></span>
                            </div>
                            <div>
                                <h3 class=title-spe>5000+</h3>
                                <p>Published Ads</p>
                            </div>
                        </div>
                        <div class=grids-speci>
                            <div class=stats-icon>
                                <span class="fa fa-users" aria-hidden=true></span>
                            </div>
                            <div>
                                <h3 class=title-spe>3266+</h3>
                                <p>Register User</p>
                            </div>
                        </div>
                        <div class=grids-speci>
                            <div class=stats-icon>
                                <span class="fa fa-thumbs-o-up" aria-hidden=true></span>
                            </div>
                            <div>
                                <h3 class=title-spe>2240+</h3>
                                <p>Verified Users</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section> -->
    
    <!-- <section class=w3l-pricing-7-main id=bottom>
        <div class=pricing-7-sec>
            <div class=wrapper>
                <h3 class=title-main>Pricing Packages</h3>
                <div class=pricing-sec-7>
                    <div class="pricing-gd-left pric-7-1">
                        <div class=w3l-pricing-7>
                            <div class=w3l-pricing-7-top>
                                <h6 class=one-light>Basic Plan</h6>
                                <h4><label>$</label>19<span>/month</span></h4>
                            </div>
                            <div class=w3l-pricing-7-bottom>
                                <div class=w3l-pricing-7-bottom-bottom>
                                    <ul class=links>
                                        <li>
                                            <div class=tick-mark><span class="fa fa-check" aria-hidden=true></span>
                                            </div>
                                            <p class=tick-info>3 Regular Ads</p>

                                        </li>
                                        <li>
                                            <div class=tick-mark><span class="fa fa-check" aria-hidden=true></span>
                                            </div>
                                            <p class=tick-info>1 Top Ad</p>

                                        </li>
                                        <li>
                                            <div class=tick-mark><span class="fa fa-check" aria-hidden=true></span>
                                            </div>
                                            <p class=tick-info>1 Featured Ad</p>

                                        </li>
                                        <li>
                                            <div class=tick-mark><span class="fa fa-check" aria-hidden=true></span>
                                            </div>
                                            <p class=tick-info>Basic Support</p>

                                        </li>

                                    </ul>
                                </div>
                                <div class=buy-button>
                                    <a class="popup btn button-eff" href=#login>Purchase Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pricing-gd-left pric-7 active">
                        <div class=w3l-pricing-7>
                            <div class=w3l-pricing-7-top>
                                <h5>Popular</h5>
                                <h6>Silver Plan</h6>
                                <h4><label>$</label>39<span>/month</span></h4>
                            </div>
                            <div class=w3l-pricing-7-bottom>
                                <div class=w3l-pricing-7-bottom-bottom>
                                    <ul class=links>
                                        <li>
                                            <div class=tick-mark><span class="fa fa-check" aria-hidden=true></span>
                                            </div>
                                            <p class=tick-info>5 Regular Ads</p>

                                        </li>
                                        <li>
                                            <div class=tick-mark><span class="fa fa-check" aria-hidden=true></span>
                                            </div>
                                            <p class=tick-info>3 Top Ads</p>

                                        </li>
                                        <li>
                                            <div class=tick-mark><span class="fa fa-check" aria-hidden=true></span>
                                            </div>
                                            <p class=tick-info>2 Featured Ads</p>

                                        </li>
                                        <li>
                                            <div class=tick-mark><span class="fa fa-check" aria-hidden=true></span>
                                            </div>
                                            <p class=tick-info>Basic Support</p>

                                        </li>
                                    </ul>
                                </div>
                                <div class=buy-button>
                                    <a class="popup btn button-eff" href=#login>Purchase Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pricing-gd-left pric-7-2">
                        <div class=w3l-pricing-7>
                            <div class=w3l-pricing-7-top>
                                <h6 class=one-light>Gold Plan</h6>
                                <h4><label>$</label>59<span>/month</span></h4>
                            </div>
                            <div class=w3l-pricing-7-bottom>
                                <div class=w3l-pricing-7-bottom-bottom>
                                    <ul class=links>
                                        <li>
                                            <div class=tick-mark><span class="fa fa-check" aria-hidden=true></span>
                                            </div>
                                            <p class=tick-info>Unlimited Regular Ads</p>

                                        </li>
                                        <li>
                                            <div class=tick-mark><span class="fa fa-check" aria-hidden=true></span>
                                            </div>
                                            <p class=tick-info>10 Top Ads</p>

                                        </li>
                                        <li>
                                            <div class=tick-mark><span class="fa fa-check" aria-hidden=true></span>
                                            </div>
                                            <p class=tick-info>5 Featured Ads</p>

                                        </li>
                                        <li>
                                            <div class=tick-mark><span class="fa fa-check" aria-hidden=true></span>
                                            </div>
                                            <p class=tick-info>Priority Support</p>

                                        </li>
                                    </ul>
                                </div>
                                <div class=buy-button>
                                    <a class="popup btn button-eff" href=#login>Purchase Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    
    
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
    
    <!-- <div class=w3l-new-block-6>
        
        <section id=grids5-block>
            <div class=wrapper>
                <h3 class=title-main>Our latest news</h3>
                <div class=d-grid>
                    <div class=grids5-info>
                        <a href=#single><img src=assets/images/b1.jpg alt=""></a>
                        <h4><a href=#single>News Post title</a></h4>
                        <ul class=admin-list>
                            <li><a href=#single><span class="fa fa-user" aria-hidden=true></span>by
                                    Admin</a></li>
                            <li><a href=#single><span class="fa fa-comments-o" aria-hidden=true></span>9
                                    Comments</a></li>
                        </ul>
                        <p>It is a long established fact that a reader will be distracted by the readable content of
                            a page when looking at its layout</p>
                    </div>
                    <div class=grids5-info>
                        <a href=#single><img src=assets/images/b2.jpg alt=""></a>
                        <h4><a href=#single>News Post title</a></h4>
                        <ul class=admin-list>
                            <li><a href=#single><span class="fa fa-user" aria-hidden=true></span>by
                                    Admin</a></li>
                            <li><a href=#single><span class="fa fa-comments-o" aria-hidden=true></span>5
                                    Comments</a></li>
                        </ul>
                        <p>It is a long established fact that a reader will be distracted by the readable content of
                            a page when looking at its layout</p>
                    </div>
                    <div class=grids5-info>
                        <a href=#single><img src=assets/images/b4.jpg alt=""></a>
                        <h4><a href=#single>News Post title</a></h4>
                        <ul class=admin-list>
                            <li><a href=#single><span class="fa fa-user" aria-hidden=true></span>by
                                    Admin</a></li>
                            <li><a href=#single><span class="fa fa-comments-o" aria-hidden=true></span>12
                                    Comments</a></li>
                        </ul>
                        <p>It is a long established fact that a reader will be distracted by the readable content of
                            a page when looking at its layout</p>
                    </div>
                    <div class=grids5-info>
                        <a href=#single><img src=assets/images/b3.jpg alt=""></a>
                        <h4><a href=#single>News Post title</a></h4>
                        <ul class=admin-list>
                            <li><a href=#single><span class="fa fa-user" aria-hidden=true></span>by
                                    Admin</a></li>
                            <li><a href=#single><span class="fa fa-comments-o" aria-hidden=true></span>23
                                    Comments</a></li>
                        </ul>
                        <p>It is a long established fact that a reader will be distracted by the readable content of
                            a page when looking at its layout</p>
                    </div>
                </div>
            </div>
        </section>
    </div> -->
       
@endsection




















@section('content')
<style type="text/css">      
      .owl-theme .owl-nav [class*=owl-]{
        display: none;
      }
      .owl-theme .owl-dots, .owl-theme .owl-nav{
        position: absolute;
      bottom: 0;
      width: 100%;
      }
      .product-wrapper{
   box-shadow: 0 0 12px rgba(0,0,0,.2);
   margin-bottom: 30px;
   }
   .product-wrapper .product-image-wrapper > img{
   width: 100%;
   }
   .product-wrapper .product-title{
   font-size: 26px;
   font-weight: 600;
   color: #333333;
   line-height: 2.5;
   }
   .product-wrapper .product-price{
   font-size: 20px;
   margin-bottom: 10px;
   }
   .product-wrapper .product-actions{
   padding: 15px;
   position: relative;
   }
   .product-wrapper .product-actions > a{
   min-width: 160px;
   font-size: 18px;
   font-weight: 600;
   padding: 12px;
   background-color: #319688;
   border-color: #319688;                
   }
   .product-wrapper .product-actions ion-icon{
   position: absolute;
   right: 15px;
   top: 24px;
   font-size: 30px;
   }
</style>
<!-- <div id="login-link">
   <div id="login-content" class="overlay-login-signup">
      <span class="navbar-light" style="padding: 20px 40px;display: inline-block;"><span class="navbar-brand">{{env('APP_NAME')}}</span></span>
      <a class="closebtn" id="close-login-form">×</a>
      <div class="overlay-content-login">
         <div class="container">
            <div class="row">
               <div class="col-md-4"></div>
               <div class="col-md-4 loginform">
                  <h5 class="loginstyle signup-style">Login to {{env('APP_NAME')}} Portal</h5>
                  <form id="pop-login-form" action="" method="post">
                     <input type="hidden" name="_token">
                     <input type="hidden" id="pop_signin_came_from" name="came_from" value="">
                     <fieldset class="form-group loginstyle">
                        <div class="form-group">
                           <label class="control-label" for="pop-login-username" aria-required="true" name="Email">Email</label>
                           <input type="text" id="pop-login-username" class="form-control" name="username" required>
                           <p class="help-block"></p>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="pop-login-password" required>Password</label>
                           <input type="password" id="pop-login-password" class="form-control" name="password"  type="password" aria-required="true" aria-describedby="userPassword-error" aria-invalid="true">
                           <p class="help-block"></p>
                        </div>
                     </fieldset>
                     <div class="checkbox loginstyle">
                        <div class="form-group">
                           <div class="checkbox">
                              <label for="pop-login-rememberme">
                              <input type="checkbox" id="pop-login-rememberme" name="rememberMe">
                              Remember Me
                              </label>
                           </div>
                        </div>
                     </div>
                     <p id="pop-form-msg" class="help-block"></p>
                     <button type="submit" class="btn btn-primary log-button theme-green" id="pop-login-button">Login</button>
                     <span class="btn btn-primary log-button" id="pop-login-button-loading" style="display:none;">Authenticating..</span>
                  </form>
               </div>
               <div class="col-md-4 login-p2">
                  <h5 class="loginstyle">Don't have an account?</h5>
                  <button class="btn theme-green signup-link">Sign Up</button>
                  <br><br>
                  <h5 class="loginstyle">Forgot your Password?</h5>
                  <a class="btn btn-grey" href="#">Reset</a>
                  <br><br><br>
               </div>
            </div>
         </div>
      </div>
   </div>
</div> -->
<section style="display: none;">
   <style type="text/css">
      .custom-steps{
      box-shadow: 0 5px 10px 0 rgba(79,36,85,.15);
      margin: 30px auto;
      transform: skew(-20deg,0deg);
      color: #c7b9c9;
      font-size: 20px;
      font-weight: 600;
      max-width: 800px;
      }
      .custom-steps > div{
      display: inline-block;
      padding: 15px 50px;
      }
      .custom-steps .step-item > div{
      transform: skew(20deg,0deg);
      position: relative;
      }
      .custom-steps .step-item > div:after{
      content: '/';
      position: absolute;
      right: -57px;
      top: 16px;
      }
      .custom-steps .step-item:last-child > div:after{
      content: '';
      }
      .custom-steps .step-item.active{
      background:#872266;
      color: white;
      }
      #language{
        border: 2px solid #319688;
        padding: 10px;
        height: auto;
        color: #319688;
        font-weight: 700;
      }
      .custom-button{
            line-height: 35px;
    background: #319588;
    color: white;
    font-weight: 700;
      }
   </style>
   <div class="custom-steps">
      <div class="step-item active">
         <div>Pay<br> Online</div>
      </div>
      <div class="step-item">
         <div>Send<br> Money</div>
      </div>
      <div class="step-item">
         <div>Recieve<br> Money</div>
      </div>
      <div class="step-item">
         <div>Loyalty<br> Program</div>
      </div>
   </div>
</section>
<section>
   <!-- Set up your HTML -->
   <style type="text/css">
   </style>
   <div class="owl-carousel owl-theme image-slider my-custom-slider">
      <div style="background: url(https://cdn.pixabay.com/photo/2015/07/27/20/27/mockup-863469_960_720.jpg);">
         <div class="banner_wrap">
            <div class="container-fluid">
               <div class="banner_inner">
                  <div class="left">
                     <p>Make it. Move it. Send it. Spend it.</p>
                     <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h2>
                     <button>
                     <a href="#">Get Started</a>
                     </button>
                  </div>
                  
               </div>
            </div>
         </div>
      </div>
      <div style="background: url(https://cdn.pixabay.com/photo/2015/07/27/20/27/mockup-863469_960_720.jpg);">
         <div class="banner_wrap">
            <div class="container-fluid">
               <div class="banner_inner">
                  <div class="left">
                     <p>Make it. Move it. Send it. Spend it.</p>
                     <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h2>
                     <button>
                     <a href="#">Get Started</a>
                     </button>
                  </div>
                  
               </div>
            </div>
         </div>
      </div>
      <div style="background: url(https://cdn.pixabay.com/photo/2015/07/27/20/27/mockup-863469_960_720.jpg);">
         <div class="banner_wrap">
            <div class="container-fluid">
               <div class="banner_inner">
                  <div class="left">
                     <p>Make it. Move it. Send it. Spend it.</p>
                     <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h2>
                     <button>
                     <a href="#">Get Started</a>
                     </button>
                  </div>
                  
               </div>
            </div>
         </div>
      </div>     
   </div>
</section>
<!-- <section  class="about-us-section">
   <div class="team_wrap">
      <div class="container">
         <div class="our-story">
            <h5 class="green-color">About Us</h5>
            <p class="mt-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
            <span class="mt-4 d-block">That's when OneRupee was created</span>
         </div>
      </div>
   </div>
</section> -->
<!-- <section>
   <form id="search-post" method="post">
    <div class="row text-center p-5 m-0" style="background-color: #e8e8e8">
      <div class="col-md-2"></div>       
        <div class="col-md-4">
          <select class="form-control " id="language" name="language" required="" >
            <option value="">Select Language</option>
            @foreach($languages as $lang)
                <option value="{{$lang->id}}">{{$lang->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-4">
          <button type="submit" class="form-control custom-button">Submit</button>
        </div>      
    </div>
   </form>
   <div class="row text-center p-5 m-0" id="search-add-post">
      @foreach($products as $product)
         <div class="col-md-4">
            <div class="product-wrapper">
               <div class="product-image-wrapper">
                  <img src="{{url('/admin/public/product/1598189039download.jpg')}}">
               </div>
               <div class="product-content-wrapper">
                  <div class="product-title">{{$product->name}}</div>
                  <div class="product-price">${{$product->cost}}/-</div>
                  <div class="product-id">{{$product->product_id}}</div>
                  <div class="product-actions">     
                      <a href="#" class="btn btn-primary">Link</a>
                      <ion-icon name="add"></ion-icon>
                  </div>
               </div>
            </div>
         </div>
      @endforeach
   </div>
</section> -->
<!-- <section>
   <div class="container">
      <div class="row">
         <div class="col-sm-12">
            <div class="laptop-wrapper">
               <iframe width="560" height="315" src="https://www.youtube.com/embed/TGbUpEJ1z-k" frameborder="0" allowfullscreen></iframe>
            </div>
         </div>
      </div>
   </div>
</section> -->
@endsection
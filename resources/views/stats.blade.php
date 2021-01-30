@extends('layouts.front')
@section('content')
<style type="text/css">
   
   div#collapsibleNavbar{
   margin-top: 0;
   }
   header .header-wrapper{
   box-shadow: 0 5px 10px 0 rgba(79,36,85,.15)
   }
   .navbar-light .navbar-nav .nav-link{
   color: #009688;
   font-weight: 600;
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
   background-color: #009688;
   border-color: #009688;                
   }
   .product-wrapper .product-actions ion-icon{
   position: absolute;
   right: 15px;
   top: 24px;
   font-size: 30px;
   }
   #custom_box{
    background: white;
    color: black !important;
    padding: 15px;
    font-size: 22px;
    font-weight: 700;
    border-radius: 5px;
    margin-left: 30px;
   }
   #traffic-list_processing{
    display: none !important;
   }
   .w3l-category-main .grid-sec{
    grid-template-columns: 1fr 1fr 1fr 1fr;
   }
   @media (max-width: 991px){
      .w3l-category-main .grid-sec{
        grid-template-columns: 1fr 1fr;
       }
       .d-grid.grid-sec > a:first-child{
      display:none;
     }
   }
   .w3l-search-form-3-main .search-form-3{
    box-shadow: none;
   }
   .table {
  width: 100%;
  border: 1px solid #EEEEEE;
}

.table-header {
  display: flex;
  width: 100%;
  background: #f85c70;
  padding: 18px 0;
  color: white
}

.table-row {
  display: flex;
  width: 100%;
  padding: 18px 0;
}
.table-row:nth-of-type(odd) {
  background: #EEEEEE;
}

.table-data, .header__item {
  flex: 1 1 20%;
  text-align: center;
}
div.dataTables_wrapper div.dataTables_filter input,
div.dataTables_wrapper div.dataTables_length select{
        background: white;
    padding: 10px;
    border: 1px solid #e8e8e8;
}
#traffic-list_wrapper{
    margin-bottom:60px; 
}

#traffic-list_wrapper .row .col-md-6{
    float: left;
    width: 50%;padding: 10px;
}
.img-responsive{
    width: 100%;
}
</style>
<style type="text/css">
   .table td, .table th{vertical-align: middle;}
</style>
<section class="w3l-inner-banner-main">
  <div class="about-inner inner2">
    <div class="wrapper seen-w3">
      <ul class="breadcrumbs-custom-path">
        <li><a style="font-size: 20px;">Live Traffic</a></li>
        <li></li>
        <li class="active custom-box" id="custom_box">123641</li>
      </ul>
    </div>
  </div>
</section>

<section class=w3l-category-main>
  <div class=categories-sec>
      <div class=wrapper>
          <h3 class=title-main>Published</h3>
          <div class="right-models text-center">
              <div class="d-grid grid-sec">
                  <a href=""></a>
                  <a href=#product>
                      <div class=card>
                          <div class=card-body>
                              <span class="fa fa-bed"></span>
                              <h5 class="card-title mt-4">Furniture </h5>
                              <p class=para-design>6 Ads Posted</p>
                          </div>
                      </div>
                  </a>
                  <a href=#product>
                      <div class=card>
                          <div class=card-body>
                              <span class="fa fa-briefcase"></span>
                              <h5 class="card-title mt-4">Jobs</h5>
                              <p class=para-design>5 Ads Posted</p>
                          </div>
                      </div>

                  </a>                  
              </div>              
          </div>
      </div>
  </div>
</section>
<section>
  <div class="wrapper">
    <div class="row m-0 p-4">
        <div class="col-md-12">
           <table id="traffic-list" class="display responsive nowrap table">
              <thead>
                 <tr  class="table-header">
                    <th class="table-data">Previous day</th>
                    <th class="table-data">Visitor</th>                  
                 </tr>
              </thead>
              <tbody>
                <tr class="table-row">
                    <td class="table-data">test</td>
                    <td class="table-data">test</td>
                </tr>       
              </tbody>
           </table>
        </div>
     </div>
     {{-- <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">Search You POST ID</div>
     </div>
     <form id="search-post-id" method="post" class="w3l-search-form-3-main">
        <div class="row">
           <div class="col-md-2"></div>
           <div class="col-md-4">
              <input type="text" name="search" placeholder="Type your POST ID" class="form-control custom-search" required="" >
           </div>
           <div class="col-md-4">
              <button type="submit" class="form-control">Search</button>
           </div>
        </div>
     </form> --}}
  </div>
        
</section>

<section class="w3l-search-form-3-main">
    <div class="search-form-3">
        <div class="wrapper">
            <div class="section-width">
                <form action="#" class="search-3-gd" method="post">
                    <div class="d-flex grids-icon">
                        <span class="fa fa-text-height" aria-hidden="true"></span>
                        <input type="search" name="text" placeholder="Type your POST ID" required="">
                    </div>
                    
                    <button type="submit" class="btn button-eff"><span class="fa fa-search" aria-hidden="true"></span>Search</button>
                </form>
            </div>
        </div>
    </div>
</section>
{{-- <section>
   <div class="row text-center p-5 m-0" id="search-add-post">      
      <div class="col-md-4">
         <div class="product-wrapper">
            <div class="product-image-wrapper">
               <img src="{{url('/admin/public/product/1598189039download.jpg')}}">
            </div>
            <div class="product-content-wrapper">
               <div class="product-title">Name</div>
               <div class="product-price">$122</div>
               <div class="product-id">1254</div>
               <div class="product-actions">     
                   <a href="#" class="btn btn-primary">Link</a>
                   <ion-icon name="add"></ion-icon>
               </div>
            </div>
         </div>
      </div>      
   </div>
</section> --}}

<div class="w3l-products-4">
    <div id="products4-block" class="text-center" style="padding: 0;padding-bottom: 40px;">
        <div class="wrapper">
            <input id="tab1" type="radio" name="tabs" checked="">
            <label class="tabtle" for="tab1" style="display: none">Latest Ads</label>

            <section id="content1" class="tab-content text-left">
                <div class="d-grid grid-col-3">
                    <div class="product">
                        <a href="#product"><img src="https://demo.w3layouts.com/demosWTR/Starter30-11-2019/classify-starter-demo_Free/1561860545/web/assets/images/c1.jpg" class="img-responsive" alt=""></a>
                        <div class="info-bg">
                            <h5><a href="#product">Sed ut perspiciatis unde omnis iste natus</a></h5>
                            <p>Nulla ex nunc</p>
                            <ul class="d-flex">
                                <li><span class="fa fa-usd"></span> 1200</li>
                                <li class="margin-effe"><a href="#fav" title="Add this to Favorite"><span class="fa fa-heart-o"></span></a></li>
                                <li><a href="#sahre" title="Share"><span class="fa fa-share"></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product">
                        <a href="#product"><img src="https://demo.w3layouts.com/demosWTR/Starter30-11-2019/classify-starter-demo_Free/1561860545/web/assets/images/c1.jpg" class="img-responsive" alt=""></a>
                        <div class="info-bg">
                            <h5><a href="#product">Eaque ipsa quae ab illo inventore veritatis</a></h5>
                            <p>Nulla ex nunc</p>
                            <ul class="d-flex">
                                <li><span class="fa fa-usd"></span> 299</li>
                                <li class="margin-effe"><a href="#fav" title="Add this to Favorite"><span class="fa fa-heart-o"></span></a></li>
                                <li><a href="#sahre" title="Share"><span class="fa fa-share"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
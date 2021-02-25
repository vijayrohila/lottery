<!DOCTYPE html>
<html lang=en>
   <meta http-equiv=content-type content="text/html;charset=UTF-8">
   <head>
      <meta charset=UTF-8>
      <meta name=viewport content="width=device-width,initial-scale=1">
      <meta http-equiv=X-UA-Compatible content="ie=edge">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>{{env('APP_NAME')}}</title>
      <link rel=stylesheet href="{{asset('/assets/css/style-starter.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
      <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">      
     <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css"> 
     <link rel="stylesheet" type="text/css" href="https://demo.w3layouts.com/assests/fonts/fontawesome-webfont.woff?v=4.7.0">
     <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
     <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>

   </head>
   <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-JM370STK2X"></script>
    {{-- <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-JM370STK2X');      
    </script> --}}
    
   <div id="loading" style="display: none;">
         <img id="loading-image" src="https://i.gifer.com/ZZ5H.gif" alt="Loading..." />
      </div>
   <script>
      var base_url = "{{ url('/')}}";
   </script>
   <body class=no-scroll>
      
      <div id="codefund"></div>
      <meta name="robots" content="noindex">
      <body>

      <style>
             {
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
            }
            #w3lDemoBar.w3l-demo-bar {
            top: 0;
            right: 0;
            bottom: 0;
            z-index: 9999;
            padding: 40px 5px;
            padding-top:70px;
            margin-bottom: 70px;
            background: #0D1326;
            border-top-left-radius: 9px;
            border-bottom-left-radius: 9px;
            }
            #w3lDemoBar.w3l-demo-bar a {
            display: block;
            color: #e6ebff;
            text-decoration: none;
            line-height: 24px;
            opacity: .6;
            margin-bottom: 20px;
            text-align: center;
            }
            #w3lDemoBar.w3l-demo-bar span.w3l-icon {
            display: block;
            }
            #w3lDemoBar.w3l-demo-bar a:hover {
            opacity: 1;
            }
            #w3lDemoBar.w3l-demo-bar .w3l-icon svg {
            color: #e6ebff;
            }
            #w3lDemoBar.w3l-demo-bar .responsive-icons {
            margin-top: 30px;
            border-top: 1px solid #41414d;
            padding-top: 40px;
            }
            #w3lDemoBar.w3l-demo-bar .demo-btns {
            border-top: 1px solid #41414d;
            padding-top: 30px;
            }
            #w3lDemoBar.w3l-demo-bar .responsive-icons a span.fa {
            font-size: 26px;
            }
            #w3lDemoBar.w3l-demo-bar .no-margin-bottom{
            margin-bottom:0;
            }
            .toggle-right-sidebar span {
            background: #0D1326;
            width: 50px;
            height: 50px;
            line-height: 50px;
            text-align: center;
            color: #e6ebff;
            border-radius: 50px;
            font-size: 26px;
            cursor: pointer;
            opacity: .5;
            }
            .pull-right {
            float: right;
            position: fixed;
            right: 0px;
            top: 70px;
            width: 90px;
            z-index: 99999;
            text-align: center;
            }
            /* ============================================================
            RIGHT SIDEBAR SECTION
            ============================================================ */
            #right-sidebar {
            width: 90px;
            position: fixed;
            height: 100%;
            z-index: 1000;
            right: 0px;
            top: 0;
            margin-top: 60px;
            -webkit-transition: all .5s ease-in-out;
            -moz-transition: all .5s ease-in-out;
            -o-transition: all .5s ease-in-out;
            transition: all .5s ease-in-out;
            overflow-y: auto;
            }
            /* ============================================================
            RIGHT SIDEBAR TOGGLE SECTION
            ============================================================ */
            .hide-right-bar-notifications {
            margin-right: -300px !important;
            -webkit-transition: all .3s ease-in-out;
            -moz-transition: all .3s ease-in-out;
            -o-transition: all .3s ease-in-out;
            transition: all .3s ease-in-out;
            }
            @media (max-width: 992px) {
            #w3lDemoBar.w3l-demo-bar a.desktop-mode{
            display: none;
            }
            }
            @media (max-width: 767px) {
            #w3lDemoBar.w3l-demo-bar a.tablet-mode{
            display: none;
            }
            }
            @media (max-width: 568px) {
            #w3lDemoBar.w3l-demo-bar a.mobile-mode{
            display: none;
            }
            #w3lDemoBar.w3l-demo-bar .responsive-icons {
            margin-top: 0px;
            border-top: none;
            padding-top: 0px;
            }
            #right-sidebar,.pull-right {
            width: 90px;
            }
            #w3lDemoBar.w3l-demo-bar .no-margin-bottom-mobile{
            margin-bottom: 0;
            }
            }
            .column2 {
                width: 214px;
            }
            div#traffic-list_filter {
                display: none;
            }
            #age_check_modal > .modal-content{
               background-image: url({{asset('/images/bg101.jpg')}});
               padding: 0;
               border: none;
            }
            #age_check_modal > .modal-content > div{
               background: #212b30bf;
               padding: 20px;
               text-align: center;
               padding-bottom: 70px;
            }

            #age_check_modal > .modal-content h1{
               color: white;
               margin: 40px auto;
    text-align: center;
            }

            #age_check_modal > .modal-content .close{
               width: 32px;
               text-align: center;
            }
            #age-minus{
               margin-left: 18px;
            }
         </style>
         
         <div class=w3l-headers-9>
            <header>
               <div class=wrapper>
                  <div class=header>
                     <div class=right-img-9>
                        <h1>
                           <a href="{{url('/')}}" class=logo>
                           <span class="fa fa-bullhorn" aria-hidden=true></span>
                           {{env('APP_NAME')}}
                           </a>
                        </h1>
                     </div>
                     <div class=bottom-menu-content>
                        <input type=checkbox id="nav">
                        <label for=nav class=menu-bar></label>
                        <nav>
                           <div class=wrapper>
                              <ul class=menu>
                                 <li><a href="{{url('publish')}}" class=link-nav>Publish</a></li>
                                 <li><a href="{{url('statistics')}}" class=link-nav>Statistics</a></li>
                              </ul>
                           </div>
                        </nav>
                     </div>
                  </div>
               </div>
            </header>          
            
         </div>
         @yield('content')
         <footer class=w3l-footer-22>
            <section class=fotter-sub>
               <div class=footer>
                  <div class=wrapper>
                     <div class="text-txt">
                        <div class="right-side">
                           <h4>Publish Your Content @ Lowest Price</h4>
                           <!-- <p class=para-sep>The Best Classified Ads Theme in the World <a href=#download>Download
                              Now</a> -->
                           </p>
                           <div class=sub-columns>
                              <div class=sub-one-left>
                                 <h6>About </h6>
                                 <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                    doloremque
                                    laudantium, totam rem aperiam, eaque ipsa quae ab.
                                 </p>
                                 <div class=columns-2>                                    
                                    <ul class=social>
                                       <li><a href=#youtube><span class="fa fa-youtube" aria-hidden=true></span></a>
                                       </li>
                                       <li><a href=#instagram><span class="fa fa-instagram" aria-hidden=true></span></a>
                                       </li>
                                       <li><a href=#twitter><span class="fa fa-twitter" aria-hidden=true></span></a>
                                       </li>
                                       <li><a href=#linkedin><span class="fa fa-linkedin" aria-hidden=true></span></a>
                                       </li>                                       
                                       <li><a href=#pinterest><span class="fa fa-pinterest" aria-hidden=true></span></a>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                              <div class=sub-two-right>
                                 <h6>Quick links</h6>
                                 <ul>
                                    <li>
                                       <a href="{{url('about-us')}}"><span class="fa fa-angle-double-right mr-2"></span>
                                          About Us
                                       </a>
                                    </li>
                                    <li>
                                       <a href="{{url('term-condition')}}">
                                       <span class="fa fa-angle-double-right mr-2"></span>Terms and Conditions
                                       </a>
                                    </li>
                                    <li>
                                       <a href="{{url('privacy-policy')}}"><span class="fa fa-angle-double-right mr-2"></span>Privacy Policy</a>
                                    </li>                                    
                                    <li>
                                       <a href="{{url('faq')}}">
                                          <span class="fa fa-angle-double-right mr-2"></span>
                                          FAQ
                                       </a>
                                    </li>
                                 </ul>
                              </div>
                              <!-- <div class=sub-two-right>
                                 <h6>Help & Support</h6>
                                 <ul>
                                    <li><a href=index.html><span class="fa fa-angle-double-right mr-2"></span>Live
                                       Chart</a>
                                    </li>
                                    <li><a href=#faq><span class="fa fa-angle-double-right mr-2"></span>Faq</a>
                                    </li>
                                    <li><a href=#support><span class="fa fa-angle-double-right mr-2"></span>Support</a></li>
                                    <li><a href=#terms><span class="fa fa-angle-double-right mr-2"></span>Terms
                                       of Services</a>
                                    </li>
                                 </ul>
                              </div> -->
                              <div class=sub-one-left>
                                 <h6>Contact </h6>
                                 <div class=column2>
                                    <div class=href1><span class="fa fa-envelope-o" aria-hidden=true></span><a href=mailto:contact@tacepook.com>contact@tacepook.com</a>
                                    </div>
                                    <div class=href2><span class="fa fa-phone" aria-hidden=true></span><a href=tel:+91-9876543210>+91 9876543210</a>
                                    </div>
                                    <div>
                                       <p class=contact-para><span class="fa fa-map-marker" aria-hidden=true></span>Hyderabad, India.</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class=below-section>
                  <div class=wrapper>
                     <div class=copyright-footer>
                        <div class="columns text-left">
                           <p>&copy; {{date('Y')}} tacepook.com | All Rights Reserved | Developed by <a href="http://www.anitco.in" target="_blank">ANITCO</a>
                           </p>
                        </div>
                        <ul class=text-right>
                           <li><a href=#payment><img src="https://demo.w3layouts.com/demosWTR/Starter30-11-2019/classify-starter-demo_Free/1561860545/web/assets/images/payment1.jpg" alt="" class="img-responsive"></a>
                           </li>
                           <li><a href=#payment><img src="https://demo.w3layouts.com/demosWTR/Starter30-11-2019/classify-starter-demo_Free/1561860545/web/assets/images/payment2.jpg" alt="" class="img-responsive"></a>
                           </li>
                          <li> <a href="#payment"><img src="https://demo.w3layouts.com/demosWTR/Starter30-11-2019/classify-starter-demo_Free/1561860545/web/assets/images/payment3.jpg" alt="" class="img-responsive"></a></li>
                           
                           <li><a href=#payment><img src="https://demo.w3layouts.com/demosWTR/Starter30-11-2019/classify-starter-demo_Free/1561860545/web/assets/images/payment4.jpg" alt="" class="img-responsive"></a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <button onclick=topFunction() id=movetop title="Go to top">
               <span class="fa fa-arrow-up" aria-hidden=true></span>
               </button>
               <script>
                  // When the user scrolls down 20px from the top of the document, show the button
                  window.onscroll = function () {
                      scrollFunction()
                  };
                  
                  function scrollFunction() {
                      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                          document.getElementById("movetop").style.display = "block";
                      } else {
                          document.getElementById("movetop").style.display = "none";
                      }
                  }
                  
                  // When the user clicks on the button, scroll to the top of the document
                  function topFunction() {
                      document.body.scrollTop = 0;
                      document.documentElement.scrollTop = 0;
                  }
               </script>
            </section>
         </footer>
   </body>
    <!-- <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('js/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('js/custom.js') }}" defer></script> -->

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('js/toastr.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>

    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
<script type="text/javascript">
    $('.owl-carousel').owlCarousel({
        loop:true,
        items:1,
        margin:10,
        nav:true,
        autoplay:true,
        autoplayTimeout:2000,
        autoplayHoverPause:true
        /*responsive:{
            0:{
                items:1
            }
        }*/
    })
</script>
    <script>
      $('#nav').change(function () {
          if ($('#nav').is(":checked")) {
              $('body').css('overflow', 'hidden');
          } else {
              $('body').css('overflow', 'auto');
          }
      });

      $('body').on('click','.settings-dropdown',function(e){
         e.preventDefault();
         $(this).next('.settings-dropdown-wrapper').toggle();
      });

      $('body').on('click','.close',function(e){
         $('#age_check_modal').hide();
      });      
    </script>
   
   </body>
</html>
@if(session()->has('message'))
<script>
$(document).ready(function () {
    setTimeout(function () {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 4000,
        }
        ;
                toastr.success('{{ session()->get('message') }}', 'Success');
    }, 300);
});
</script>
@endif
@if(session()->has('error_message'))
<script>
    $(document).ready(function () {
        setTimeout(function () {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 4000
            }
            ;
                    toastr.error('{{ session()->get('error_message') }}', 'Error');
        }, 300);
    });


</script>

@endif
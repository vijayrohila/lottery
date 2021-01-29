<!DOCTYPE html>
<html lang=en>
<meta http-equiv=content-type content="text/html;charset=UTF-8">
<head>
    <meta charset=UTF-8>
    <meta name=viewport content="width=device-width,initial-scale=1">
    <meta http-equiv=X-UA-Compatible content="ie=edge">
    <title>Tacepook</title>
    <link rel=stylesheet href={{asset('/assets/css/style-starter.css')}}>
</head>

<body class=no-scroll>

<div id=codefund></div>



<meta name=robots content=noindex>
<body>
  
  <link rel=stylesheet href=https://demo.w3layouts.com/assests/css/font-awesome.min.css>

<style>
* {
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
</style>
<div class="pull-right toggle-right-sidebar">
<span class="fa title-open-right-sidebar tooltipstered fa-angle-double-right"></span>
</div>




    
    <div class=w3l-headers-9>
        <header>
            <div class=wrapper>
                <div class=header>
                    <div class=right-img-9>
                        <h1>
                            <a href=index.html class=logo><span class="fa fa-bullhorn" aria-hidden=true></span>Tacepook</a>
                            
                        </h1>
                    </div>
                    <div class=bottom-menu-content>
                        <input type=checkbox id="nav">
                        <label for=nav class=menu-bar></label>
                        <nav>
                            <div class=wrapper>
                                <ul class=menu>
                                    <li><a href=index.html class=link-nav>Stats</a></li>
                                    <li><a href=about.html class=link-nav>Upload</a></li>
                                    {{-- <li><a href=services.html class=link-nav>How it Works?</a></li>
                                    <li><a href=contact.html class=link-nav>Contact</a></li>
                                    <li class=nav-right-sty>
                                        <a href=#post-ad class="btn button-eff button-eff-2"><span class="fa fa-paper-plane-o" aria-hidden=true></span>Post your Ad</a>
                                    </li> --}}
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        
        <script src={{asset('assets/js/jquery-3.3.1.min.js')}}></script>
        <script>
            $('#nav').change(function () {
                if ($('#nav').is(":checked")) {
                    $('body').css('overflow', 'hidden');
                } else {
                    $('body').css('overflow', 'auto');
                }
            });
        </script>
    </div>
    
    @yield('content')
    
    <footer class=w3l-footer-22>
        <section class=fotter-sub>
            <div class=footer>
                <div class=wrapper>
                    <div class=text-txt>
                        <div class=right-side>
                            <h4>Create Your Classified Website Today!</h4>
                            <p class=para-sep>The Best Classified Ads Theme in the World <a href=#download>Download
                                    Now</a></p>
                            <div class=sub-columns>
                                <div class=sub-one-left>
                                    <h6>About </h6>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                        doloremque
                                        laudantium, totam rem aperiam, eaque ipsa quae ab.</p>
                                    <div class=columns-2>
                                        <ul class=social>
                                            <li><a href=#facebook><span class="fa fa-facebook" aria-hidden=true></span></a>
                                            </li>
                                            <li><a href=#linkedin><span class="fa fa-linkedin" aria-hidden=true></span></a>
                                            </li>
                                            <li><a href=#twitter><span class="fa fa-twitter" aria-hidden=true></span></a>
                                            </li>
                                            <li><a href=#google><span class="fa fa-google-plus" aria-hidden=true></span></a>
                                            </li>
                                            <li><a href=#github><span class="fa fa-github" aria-hidden=true></span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class=sub-two-right>
                                    <h6>Quick links</h6>
                                    <ul>
                                        <li><a href=index.html><span class="fa fa-angle-double-right mr-2"></span>Home</a>
                                        </li>
                                        <li><a href=about.html><span class="fa fa-angle-double-right mr-2"></span>About</a>
                                        </li>
                                        <li><a href=services.html><span class="fa fa-angle-double-right mr-2"></span>Services</a></li>
                                        <li><a href=contact.html><span class="fa fa-angle-double-right mr-2"></span>Contact</a></li>
                                    </ul>
                                </div>
                                <div class=sub-two-right>
                                    <h6>Help & Support</h6>
                                    <ul>
                                        <li><a href=index.html><span class="fa fa-angle-double-right mr-2"></span>Live
                                                Chart</a></li>
                                        <li><a href=#faq><span class="fa fa-angle-double-right mr-2"></span>Faq</a>
                                        </li>
                                        <li><a href=#support><span class="fa fa-angle-double-right mr-2"></span>Support</a></li>
                                        <li><a href=#terms><span class="fa fa-angle-double-right mr-2"></span>Terms
                                                of Services</a></li>
                                    </ul>
                                </div>
                                <div class=sub-one-left>
                                    <h6>Contact </h6>
                                    <div class=column2>
                                        <div class=href1><span class="fa fa-envelope-o" aria-hidden=true></span><a href=mailto:info@example.com>info@example.com</a>
                                        </div>
                                        <div class=href2><span class="fa fa-phone" aria-hidden=true></span><a href=tel:+44-000-888-999>+44-000-888-999</a>
                                        </div>
                                        <div>
                                            <p class=contact-para><span class="fa fa-map-marker" aria-hidden=true></span>London, 235 Terry, 10001</p>
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
                            <p>@2019 Classify. All rights reserved. Design by <a href="https://w3layouts.com/" target=_blank> W3Layouts</a>
                            </p>
                        </div>
                        <ul class=text-right>
                            <li><a href=#payment><img src=assets/images/payment1.jpg alt="" class=img-responsive></a>
                            </li>
                            <li><a href=#payment><img src=assets/images/payment2.jpg alt="" class=img-responsive></a>
                            </li>
                            <li><a href=#payment><img src=assets/images/payment3.jpg alt="" class=img-responsive></a>
                            </li>
                            <li><a href=#payment><img src=assets/images/payment4.jpg alt="" class=img-responsive></a>
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


<script src="{{ asset('js/jquery.validate.min.js')}}"></script>
<script src="{{ asset('js/custom.js') }}" defer></script>
</body></html>
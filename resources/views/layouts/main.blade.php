<!DOCTYPE HTML>
<html>
   <head>
      <title>Online Ads</title>
      <link href='//fonts.googleapis.com/css?family=Anaheim' rel='stylesheet' type='text/css'>
      <meta name="keywords" content="Foto Gallery iphone web template, Android web template, Smartphone web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
      <link rel="stylesheet" href="{{asset('assets/css/reset.css')}}" type="text/css" media="all" />
      <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" type="text/css" media="all" />
      <script type="text/javascript" src="{{asset('assets/js/jquery.js')}}"></script>
      <script type="text/javascript" src="{{asset('assets/js/jquery.lightbox.js')}}"></script>
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/lightbox.css')}}" media="screen" />
      <script type="text/javascript">
         $(function() {
             $('.gallery a').lightBox();
         });
      </script>
   </head>
   <body>
      <div class="wrap">
         <div class="header">
            <div class="logo">
               Online Ads
               <br>
               <span>Lucky Person</span>
            </div>
         </div>
         @yield('content')
         
         <div class="footer">
            <div class="wrap">
               <div class="copy">
                  &copy; Online Ads.
               </div>
               <div class="clear"></div>
            </div>
         </div>
      </div>
   </body>
   <script src="https://kit.fontawesome.com/b38bf7fee8.js" crossorigin="anonymous"></script>
</html>
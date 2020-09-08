@extends('layouts.app')
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
</style>
<style type="text/css">
   .custom-heading{
   padding-top: 50px;
   font-size: 26px;
   color: #872166;
   position: relative;
   }
   .custom-heading:after{
   content: '';
   position: absolute;
   border: 1px solid #872166;
   width: 100px;
   bottom: 15px;
   margin-left: 20px;
   }
   .custom-heading:before{
   content: '';
   position: absolute;
   border: 1px solid #872166;
   width: 100px;
   bottom: 15px;
   margin-left: -120px;
   }
   body{
   color: #872166;
   }
</style>
<section class="about-us-section1">
   <h3 class="custom-heading">Privacy Policy</h3>
   <p class="p-5">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam venenatis felis ut metus tempor, sit amet sodales leo dignissim. Vivamus convallis euismod libero a egestas. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec sed urna eu sapien porttitor tempor. Quisque ullamcorper efficitur eros sit amet laoreet. Duis viverra lorem massa, quis luctus massa congue nec. Pellentesque eget nunc et ipsum mattis commodo id et quam. Praesent condimentum molestie lacinia. Quisque sem metus, condimentum ac cursus at, commodo sit amet lorem. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc id rutrum nisi. Aenean eu justo nec sapien luctus lacinia sit amet vitae erat.
      <br><br>
      Nunc lobortis porttitor iaculis. In hac habitasse platea dictumst. Sed mauris leo, suscipit ut tristique at, euismod in massa. Sed sem leo, pretium ac justo at, feugiat bibendum ligula. Phasellus bibendum dolor neque, ut mattis neque pretium ut. Ut libero erat, faucibus a felis ac, sodales bibendum turpis. Aenean et leo imperdiet, pellentesque diam ut, gravida dolor. Sed semper accumsan leo in congue. Ut fermentum gravida odio eu tincidunt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec finibus fringilla lorem vel pellentesque. Nulla et magna sollicitudin nulla rhoncus ultrices.
      <br><br>
      Morbi vehicula tempus faucibus. Nulla metus ex, tincidunt quis ante sit amet, faucibus pulvinar magna. Praesent magna ipsum, lacinia vel libero non, ornare ultrices purus. Morbi fermentum vehicula justo non efficitur. Donec suscipit purus justo, id tincidunt elit semper ac. Maecenas suscipit magna leo, id convallis lorem euismod vel. Curabitur malesuada sed dui sed pretium. Morbi tristique, augue nec gravida cursus, magna nisi lacinia lectus, sit amet placerat mi erat id velit. Sed imperdiet lectus feugiat consequat gravida. Curabitur mi lacus, euismod sed nunc facilisis, scelerisque sodales magna. Vestibulum dignissim ex sed velit semper, a auctor mi accumsan. Morbi non massa sed mi sollicitudin consequat at quis eros. Ut egestas hendrerit massa id ultrices.
      <br><br>
      Curabitur luctus diam sit amet scelerisque ornare. Quisque dignissim tristique varius. Sed semper augue quis nulla cursus dictum. Sed et rutrum elit. Maecenas urna lacus, suscipit in nibh dictum, vestibulum accumsan purus. Maecenas varius pellentesque tincidunt. Phasellus imperdiet lacinia urna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at purus vulputate, ullamcorper nisi a, tincidunt enim. Morbi eleifend elit sit amet metus ullamcorper, vitae viverra quam accumsan. In malesuada ex vel tortor bibendum, fermentum tincidunt purus congue. In interdum leo eleifend volutpat aliquet.
   </p>
</section>
@endsection
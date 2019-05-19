
@extends('layouts.apptry')

<script type="text/javascript" src="js/mdb.min.js"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/nav.js')}}"></script>

@section('content')
<!-- SideNav slide-out button -->
<a href="#" data-activates="slide-out" class="btn btn-primary p-3 button-collapse"><i
    class="fas fa-bars"></i></a>

<!-- Sidebar navigation -->
<div id="slide-out" class="side-nav fixed">
  <ul class="custom-scrollbar">
    <!-- Logo -->
   
    <!--/. Logo -->
    <!--Social-->
    <li>
      <ul class="social">
        <li><a href="#" class="icons-sm fb-ic"><i class="fab fa-facebook-f"> </i></a></li>
        <li><a href="#" class="icons-sm pin-ic"><i class="fab fa-pinterest"> </i></a></li>
        <li><a href="#" class="icons-sm gplus-ic"><i class="fab fa-google-plus-g"> </i></a></li>
        <li><a href="#" class="icons-sm tw-ic"><i class="fab fa-twitter"> </i></a></li>
      </ul>
    </li>
    <!--/Social-->
    <!--Search Form-->
   
    <!--/.Search Form-->
    <!-- Side navigation links -->
    <li>
      <ul class="collapsible collapsible-accordion">
        <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-user-circle"></i> Profile
           </a>
         
        </li>
        <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-book-open"></i>
           Lodge Complaint</a>
         
        </li>
        <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-clock"></i>History</a>
         
        </li>
        <li><a class="collapsible-header waves-effect arrow-r"><i class="far fa-star"></i> Rate Us</a>
          
        </li>
      </ul>
    </li>
    <!--/. Side navigation links -->
  </ul>
  <div class="sidenav-bg rgba-blue-strong"></div>
</div>
<!--/. Sidebar navigation -->

@endsection
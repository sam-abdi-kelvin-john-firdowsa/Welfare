@extends('layouts.apptry')

<link rel="stylesheet" type="text/css" href={{url('css/sidenav.css')}}>
<link rel="stylesheet" type="text/css" href={{url('css/appointment.css')}}>
<link rel="stylesheet" type="text/css" href={{url('css/profilepicSelector.css')}}>
<link rel="stylesheet" type="text/css" href={{url('css/imageSelect/imgareaselect-default.css')}}>
<script type="text/javascript" src="{{URL::asset('js/profilepicSelector.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/imageSelect/jquery.imgareaselect.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/imageSelect/jquery.imgareaselect.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/imageSelect/jquery.imgareaselect.pack.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/imageSelect/jquery.min.js')}}"></script>
@section('content')
<div class="myContainer">

    <div id="sidemenu" class="nav-sidenav">
                            
                        
        <a href="#" class="btn-close" id="showMenu" onclick="closesidemenu()">&times;</a> 
        <a href="/home">Home</a>  
        <a href="/student/profile">Your Profile</a>
        <a href="/student/{id}/complaint">Complain</a>                         
        <a href="/student/{id}/my_hist">History</a>                             
        <a href="/student/book_appointment">Book Appointment</a> 
    
    
    </div>
        <div id="togglesidebar" class="togglesidebar" onclick="opensidemenu()">
            <span id="q"></span>
            <span id="q"></span>
            <span id="q"></span>
        </div>



<div class="main appointment-booking" id="main" onclick="closesidemenu()">

    <div class="hed" id="hed">
        <h5><strong>Edit Profile</strong> </h5>
        <br>
        
        <hr>
    </div>

       
          
        <div class="row">
          <!-- left column -->
          <div class="col-md-3">
            <div class="text-center">
              <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
              <h6>Upload a different photo...</h6>
              
              <input type="file" class="form-control">
            </div>
          </div>
          
          <!-- edit form column -->
          <div class="col-md-9 personal-info">
           
            <h3>Personal info</h3>
            
            <form class="form-horizontal" role="form" action="/profile" enctype="multipart/form-data" method="PUT">
                  {{csrf_field()}}
              <div class="form-group">
                <label class="col-lg-3 control-label">Name:</label>
                <div class="col-lg-8">
                <input class="form-control" type="text" name="name" value="{{$user->name}}">
                </div>
              </div>
             
              <div class="form-group">
                <label class="col-lg-3 control-label">Email:</label>
                <div class="col-lg-8">
                <input class="form-control" type="text" name="email" value="{{$user->email}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Reg Number:</label>
                <div class="col-lg-8">
                <input class="form-control" type="text" name="RegNo" placeholder="{{$student->RegNo}}">
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-md-3 control-label">Phone Number:</label>
                <div class="col-md-8">
                <input class="form-control" type="text" name="phoneNo" placeholder="{{$student->phoneNo}}">
                </div>
              </div>
            <!--  
              <div class="form-group">
                <label class="col-md-3 control-label">Password:</label>
                <div class="col-md-8">
                  <input class="form-control" type="password" value="11111122333">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Confirm password:</label>
                <div class="col-md-8">
                  <input class="form-control" type="password" value="11111122333">
                </div>
              </div>
            -->



              <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-8">
                  <div class="row">
                    <div class="col"> <button type="submit" class="btn btn-primary" > Update Profile <button> </div>
                      
                          <span></span>
                          <div class="col"> <input type="reset" class="btn btn-danger" value="Cancel"> </div>
                          
                  </div>
                  
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>
    </div>
    <hr>

    <script>
                       
        $(document).ready(function(){
            $("#pop").click(function(){
                $(".popUp, .popUp-content").addClass("actives");
            });
            $("#closePopUp").click(function(){
                $(".popUp, .popUp-content").removeClass("actives");
            });

            $("#togglesidebar").click(function(){
                $(this).hide();
            });

            $("#showMenu").click(function(){
                $("#togglesidebar").show();
            });

            $("#main").click(function(){
                $("#togglesidebar").show();
            });
       
        });



   </script>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="{{URL::asset('js/nav.js')}}"></script>
@endsection
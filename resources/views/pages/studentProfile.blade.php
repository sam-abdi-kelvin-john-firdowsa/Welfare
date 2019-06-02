@extends('layouts.apptry')
<link rel="stylesheet" type="text/css" href={{url('css/appointment.css')}}>
<link rel="stylesheet" type="text/css" href={{url('css/sidenav.css')}}>
<link rel="stylesheet" type="text/css" href={{url('css/profilePicSelector.css')}}>
<link rel="stylesheet" type="text/css" href={{url('css/studentProfile.css')}}>



@section('content')
    <div class="containers">
            <div id="togglesidebar" class="togglesidebar" onclick="opensidemenu()">
                    <span id="q"></span>
                    <span id="q"></span>
                    <span id="q"></span>
                </div>
        <div class="row content-display">

                <div id="sidemenu" class="nav-sidenav">
   

                        <a href="#" class="btn-close" onclick="closesidemenu()">&times;</a> 
                        <a href="/home">Home</a>   
                        <a href="/student/profile">Your Profile</a>
                        <a href="/student/{id}/complaint">Complain</a>                         
                        <a href="/student/{id}/my_hist">History</a>                             
                        <a href="/student/book_appointment">Book Appointment</a>
                    
                    
                    </div>
                       
                    <!--Sidebar col-md-5-->
            <!-- <div class="col-sm-5" id="picture-display">
                <img src="images/index.png" alt="">
                <br><br>
                <input type="file" name="profile">
            </div> -->

            <div class="main" id="main">
                <div class="profile">

               
                <div class="row">
                        <div class="col-md-3 col-sm-3">

                            <img src="/storage/profilePictures/{{$studentUser['studentT']->profilePic}}" alt=" ERROR! Loading Avatar" id="profilePic" width="200" height="200">

                            </div>
                        <div class="col-sm-7" id="profile-display">
                        <p>Full Name: {{ $studentUser['userT']->name }}</p>
                        <p>Registration Number: {{ $studentUser['studentT']->RegNo }}</p>                       
                        <p>Email: {{ $studentUser['userT']->email }}</p>
                        <p>Phone: {{$studentUser['studentT']->phoneNo}}</p>
                            
                        </div>
                        <br> <br>
                        
                        
                </div>
                <div class="row">
                        <div class="col-md-8 text-center" >
                                <div class="btn btnprimary">
                                        <a class="btn btn-primary" href="/student/profile_updt">edit profile</a>
                                     </div>
                        </div>
                    </div>
           </div><!--end profile -->    
        </div>
    </div>
        
    </div>

    <script type="text/javascript" src="{{URL::asset('js/nav.js')}}"></script>
@endsection   
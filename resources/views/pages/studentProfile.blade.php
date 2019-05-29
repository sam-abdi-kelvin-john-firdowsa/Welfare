@extends('layouts.apptry')
<link rel="stylesheet" type="text/css" href={{url('css/appointment.css')}}>
<link rel="stylesheet" type="text/css" href={{url('css/sidenav.css')}}>


<style>
    
        .main-content{
            height: 100vh;
        }
        .content-display{
            min-height: 100vh;
        }
        .sidenav{
            position:fixed;
            height: 100%;
    
        }
        .sidenav ul li{
            color: rgba(230, 230, 230, 0.9);
            list-style: none !important;
            padding:15px 10px;
            border-bottom: 1px solid rgba(100, 100, 100, 0.3);
    
        }
        .sidenav ul li a{
            color: rgba(200, 200, 230, 0.9);
            text-decoration: none;
    
        }
        .sidenav ul li:hover{
            background-color: grey;
        }
        .footer-container{
            bottom:0;
        }

        .containers{
            margin-left: 0;
            

        }
    
      
    </style>

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
            <div class="col-sm-7" id="profile-display">
            <p>Registration Number: {{ $studentUser['studentT']->RegNo }}</p>
            <p>Full Name: {{ $studentUser['userT']->name }}</p>
            <p>Email: {{ $studentUser['userT']->email }}</p>
            <p>Phone: {{$studentUser['studentT']->phoneNo}}</p>
                
            </div>
            <div class="btn btnprimary">
               <a class="btn btn-primary" href="/student/profile_updt">edit profile</a>
            </div>
        </div>
    </div>
        
    </div>

    <script type="text/javascript" src="{{URL::asset('js/nav.js')}}"></script>
@endsection   
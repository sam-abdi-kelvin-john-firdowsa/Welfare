@extends('layouts.apptry')


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
    
      
    </style>

@section('content')
    <div class="container">
        <div class="row content-display">

                <div class="col-md-3 sidenav">
                        <h2 class="well text-center"> Some Links</h2>
                        <div Container>
                            <ul id="sidenav-links">
                                <li>
                                    <a href="/student/profile">Your Profile</a>
                                </li>
                                <li>
                                    <a href="/student/{id}/complaint">Complain</a>  
                                </li>  
                                <li>                        
                                    <a href="/student/{id}/my_hist">History</a>  
                                </li>
                                <li>                          
                                    <a href="/student/{id}/rate_service">Rate Us</a>
                                </li>
                            </ul>
                        </div>
                    </div> 
                    <!--Sidebar col-md-5-->
            <!-- <div class="col-sm-5" id="picture-display">
                <img src="images/index.png" alt="">
                <br><br>
                <input type="file" name="profile">
            </div> -->
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
@endsection   
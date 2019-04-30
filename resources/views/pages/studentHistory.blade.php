@extends('layouts.apphtml')

<link rel="stylesheet" type="text/css" href= "{{asset('css/dash.css')}}">
    
@section('content')

<div class="nav-container">
    <nav class="navbar navbar-expand-md navbar-inverse">
        <!-- Brand -->
        <div class="navbar-brand">
            <a class="navbar-brand" href="#"><img src="{{asset('images/icons/eu.png')}}" ALT="logo" id="logo" height="50" width="50"></a>
        </div>
        <p style="text-align:left" id="brand">Directorate of <br> University Welfare</p>

        <p style="text-align:center" id=""> <h3><strong>YOUR HISTORY</strong></h3></p>
        <!-- Collapse menu -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse navbar-right" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/studhlp">Help</a>
                </li>
            </ul>
        </div>
    </nav> 
</div>      

<div class="content-container container-fluid">
    <div class="row content-display">
    <div class="col-md-3 sidenav">
        <h2 class="well text-center"> Some Links</h2>
        <div Container>
            <ul id="sidenav-links">
                <li>
                    <a href="/student/{id}/profile">Your Profile</a>
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
    </div><!--Sidebar col-md-5-->
    
            <div class = "complaintList"> 
               <a  href ="/student/{id}/complaint/{cid}/show"> <button class='specificComplaint' href ="complaint/id?/{id}/show" id="btnsearch"> <strong>This case</strong> </button></a>
            </div>
    </div>
    </div>
    

    
@endsection
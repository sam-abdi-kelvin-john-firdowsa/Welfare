@extends('layouts.apptry')

<link rel="stylesheet" type="text/css" href= "{{asset('css/dash.css')}}">
    
@section('content')

      

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
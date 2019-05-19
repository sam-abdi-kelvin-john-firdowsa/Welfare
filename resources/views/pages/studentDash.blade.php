@extends('layouts.apphtml')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">

<link rel="stylesheet" type="text/css" href= "{{asset('css/dash.css')}}">
 

@section('content')   

    <div class="content-container container-fluid">
    <div class="row content-display">
    <div class="col-md-3 sidenav">
        <h2 class="well text-center"> Some Links</h2>
        <div Container>
            <ul id="sidenav-links">
                <li>
                    <a href="/student/profile">Your Profile</a>
                </li>
                <li>
                    <a href="/student/complaint">Complain</a>  
                </li>  
                <li>                        
                    <a href="/student/my_hist">History</a>  
                </li>
                <li>                          
                    <a href="/student/rate_service">Rate Us</a>
                </li>
            </ul>
        </div>
    </div><!--Sidebar col-md-5-->

    <div class="col-md-8">

        <div class="col-md-12 main-content">
            <!--  <h2>Open Tasks Shows up here</h2>  -->
            <h2>{{$students->FName, $students->SName}}</h2>
            <hr>        
        </div>

    </div>
@endsection

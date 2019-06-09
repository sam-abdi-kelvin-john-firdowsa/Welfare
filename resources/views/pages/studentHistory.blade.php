@extends('layouts.apptry')

<!--link rel="stylesheet" type="text/css" href= "{{asset('css/dash.css')}}"-->
<!--link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css"-->
    
@section('content')

    
@if(\Session::has('success'))

<div class="alert alert-success">

{{\Session::get('success')}}

</div>
@endif







<div class="myContainer">

        <div id="sidemenu" class="nav-sidenav">
   

                <a href="#" class="btn-close" onclick="closesidemenu()">&times;</a>  
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



<div class="main" id="main" onclick="closesidemenu()">

        <div class = "complaintList">
                <!-- list the complaints that a specific student has ever made -->
                @if(count($myComplaint)>0)
                      @foreach ($myComplaint as $complaint)
            <a href="/student/case/show/{{$complaint->id}}">
                              <div class="card card-body " max-width="100%">
                             <h5>{{$complaint->department}}</h5>
                          <small>Date: {{$complaint->created_at}}</small>
                          </div>
                         </a>
                          
                      @endforeach
  
                @else
                      <p>Your cases history appears here.</p>
  
                @endif
  
              </div>

</div>



</div>












      


    

    
@endsection
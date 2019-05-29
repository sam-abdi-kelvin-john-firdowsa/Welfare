@extends('layouts.apptry')

<link rel="stylesheet" type="text/css" href={{url('css/sidenav.css')}}>
<link rel="stylesheet" type="text/css" href={{url('css/handleappoint.css')}}>


@section('content')

<div class="myContainer" >

<div id="sidemenu" class="nav-sidenav">
   

        <a href="#" class="btn-close" onclick="closesidemenu()">&times;</a>    
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
            <div class="heading">
                <h5>FRONT OFFICE</h5>
                <br>
                <h6>ACTIVE APPOINTMENT REQUESTS:</h6>
                <hr>
            </div>

            <div class="iterate-app">

                <div class="myCards">
                @foreach ($appointments as $appo)

                <div class="show">
                    <a href="/appont18{{$appo->id}}79/57respond">
                            <div class="card">
                                    <div class="card-body">
                                       <p id="applicant"><strong id="lab">Applicant: </strong>{{$appo->regNo}}</p>
                                    <p id="dir"><strong id="lab">To see: Director </strong> {{$appo->officerToSee}}</p>
                                    <small id="time"> <strong id="lab">Time: </strong> {{$appo->timeIn}}</small>
                                    </div>
                                </div>
                    </a>
                    

                </div>
                    
                @endforeach
              </div>
            </div>

        </div>

    </div>


        <script type="text/javascript" src="{{URL::asset('js/nav.js')}}"></script>
@endsection
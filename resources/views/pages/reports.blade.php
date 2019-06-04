@extends('layouts.apptry')


<link rel="stylesheet" type="text/css" href={{url('css/sidenav.css')}}>
<link rel="stylesheet" type="text/css" href={{url('css/appointment.css')}}>

@section('content')

<div class="myContainer">


    <div id="sidemenu" class="nav-sidenav">
                            
                        
        <a href="#" class="btn-close" onclick="closesidemenu()">&times;</a>  
        <a href="/home">Home</a>   
        <a href="admin/profile">Profile</a>                         
        <a href="admin/my_hist">History</a>                              
        <a href="schedule">Inspection Schedule</a>
        <a href="/reports">reports</a>  
    
    
    </div>
        <div id="togglesidebar" class="togglesidebar" onclick="opensidemenu()">
            <span id="q"></span>
            <span id="q"></span>
            <span id="q"></span>
        </div>


    <div class="main" id="main" onclick="closesidemenu()">

    

        <div class="heading text-center" id="heading">
            <h5><strong>REPORTS</strong></h5>
            <style>
                main{
                   
                    padding-top: 2px !important;

                }
                
                .myContainer{
                    padding: 0;
                    margin: 0px !important;
                   
                    
                    position: absolute;
                    top: 80px;
                    width: 100%;
                }
                .main{
                   
                    margin-top: 0;
                    
                }
                .main .heading{
                    background-color: white;
                   
                    margin-top: 0px;
                    padding-top: 20px;
                }
            </style>
            <hr>
        </div>





<div class="iterate-app" id="iterate-app">

<div class="myCards">

@if(count($SchedReports)>0)
@foreach ($SchedReports as $repo)


<div class="show">
        <a href="case/handler/{{$repo->id}}">
            <div class="card">
                    <div class="card-body">
                            <small>REPORT ID: {{$repo->id}}</small>
                            <h5>Department: {{$repo->department}}</h5>
                    <small> Submitted by: Director {{$repo->submitted_by}}, on: {{$repo->submitted_at}}</small>
                    </div>
                </div>
    </a>
    

</div>
    
@endforeach
@else
<div class="card">
        <div class="card-body">
                <p> Submmitted reports appear here.</p>   
        </div>
    </div>

@endif

</div>
</div></div>


</div>   
</div>
<script type="text/javascript" src="{{URL::asset('js/nav.js')}}"></script>
@endsection
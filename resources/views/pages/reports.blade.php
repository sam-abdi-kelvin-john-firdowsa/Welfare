@extends('layouts.apptry')


<link rel="stylesheet" type="text/css" href={{url('css/sidenav.css')}}>
<link rel="stylesheet" type="text/css" href={{url('css/appointment.css')}}>

@section('content')

<div class="myContainer">


        @if(\Session::has('error'))

        <div class="alert alert-danger">
        
        {{\Session::get('error')}}
        
        </div>

        @elseif(\Session::has('success'))

        <div class="alert alert-success">
            {{\Session::get('success')}}
        </div>
        
        @endif




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

        <div class="card-wrapper card-float-grey">
        <div class="card">
                <div class="card-body">
                    <h4 class="text-center"><strong>DUE REPORTS</strong></h4>
                </div>
           </div><hr><br>
   <div class="iterate-app" id="iterate-app">
                @if(count($dueReports)>0)

                @foreach ($dueReports as $due)


                    <div class="show">
                            <a href="report/{{$due->id}}/add">
                                <div class="card">
                                        <div class="card-body">
                                                <small>REPORT ID: {{$due->id}}</small>
                                                <h5>Department: {{$due->department}}</h5>
                                        <small> FOR PERIOD {{$due->for_period}}</small>
                                        </div>
                                    </div>
                            </a>
                        

                    </div>
    
@endforeach

                @else
                <div class="card">
                    <div class="card-body">
                        <h6 class="text-center">DUE REPORTS</h6> <hr>
                            <p> All Due Reports Have Been Filed!</p>   
                    </div>
                </div>

                @endif
   </div>
   <br>
</div>

   <hr>

   <div class="card-wrapper card-float-grey">

   <div class="card">
        <div class="card-body">
            <h4 class="text-center"><strong>SUBMITTED REPORTS</strong></h4>
        </div>
   </div><hr><br>

<div class="iterate-app" id="iterate-app">

<div class="myCards">

@if(count($SchedReports)>0)
@foreach ($SchedReports as $repo)


<div class="show">
        <a href="report/{{$repo->id}}/view">
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
</div>
</div>
</div>
<br>

</div>   
<script type="text/javascript" src="{{URL::asset('js/nav.js')}}"></script>
@endsection
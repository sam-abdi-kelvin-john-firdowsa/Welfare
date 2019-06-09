@extends('layouts.apptry')

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

            <div class="iterate-app">

                @if(count($myComplaints)>0)

                @foreach ($myComplaints as $thisCase)
                <div class="card">
                <a href="/case/handler/{{$thisCase->id}}/show">
                            <div class="card-body">
                                    <h5>{{$thisCase->department}}</h5> <br>
                                    <small>Date: {{$thisCase->created_at}}</small>
                            </div>
                    </a>
                       
                    </div>
                @endforeach
                
                @elseif(count($myComplaints) == 0)
                <div class="card">
                        <div class="card-body">
                            <p>You have not handled any cases yet.</p>
                        </div>
                    </div>
                    @endif

            </div>

        </div>
    </div>
    
@endsection
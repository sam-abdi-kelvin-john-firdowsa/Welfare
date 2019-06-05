@extends('layouts.apptry')

@section('content')



<div class="myContainer">

        <div id="sidemenu" class="nav-sidenav">
                            
                        
                <a href="#" class="btn-close" id="showMenu" onclick="closesidemenu()">&times;</a> 
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
        <div class="hed" id="hed">
            <h4 class="text-center"><strong>REPORT</strong></h4>
            <br>
        <h5 class="text-center">{{$scheduleReport->department}} Department report for period {{$scheduleReport->for_period}}</h5>
        <br>
        <small class="text-right">Submitted By: Director {{$scheduleReport->submitted_by}}, on {{$scheduleReport->submitted_at}}</small>
        <hr>
        </div>

        <div>
            <div class="editor">
                <textarea name="" id="article-ckeditor" cols="30" rows="10" placeholder="report here..." readonly="true">
                                {{$scheduleReport->report}}
                </textarea>
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
            </div>
        </div>
    </div>
</div>

@endsection
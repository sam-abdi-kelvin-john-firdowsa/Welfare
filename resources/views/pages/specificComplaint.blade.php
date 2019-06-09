@extends('layouts.apphtml')

<link rel="stylesheet" type="text/css" href= "{{asset('css/chat.css')}}">
 

@section('content')
 

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
            <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">Chats</div>
            
                            <div class="panel-body">
                                <chat-messages :messages="messages"></chat-messages>
                            </div>
                            <div class="panel-footer">
                                <chat-form
                                    v-on:messagesent="addMessage"
                                    :user="{{ Auth::user() }}"
                                ></chat-form>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
   
</div>

@endsection

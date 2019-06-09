@extends('layouts.apptry')



 

@section('content')
 
<script src="js/app.js" charset="utf-8"></script>

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

            <div class="card comp" >
                    <!--  <h2>Open Tasks Shows up here</h2>  -->
                    <div class="card-body comp-body">
                            <small>Case status: {{$thisCase->status}}</small>
                            <br>
                            <small>Case submitted at:{{$thisCase->created_at}}</small> <br>
                            @if($thisCase->status == "Open")
                            <small>Served by: Director {{$director->name}}</small>
                            @endif
                            <br>
                            <hr>
                                    @if($thisCase->status == 'Closed')
                                    <small>Case closed on: {{$thisCase->closed_at}}</small>
                                    <p>Corrective Action: {{$thisCase->corrective_action}}</p>
                                    <hr>
                                    @endif
                            <div class="complaint-content" id="complaint-content">
                                <h6>Department: {{$thisCase->department}}</h6>
                                <p>{{$thisCase->details}}</p>
                            </div>
                            

                    

                    <script>
                            var thisComplaintInstance ={!! json_encode($thisCase->toArray())!!}
                            //var CompId = thisComplaintInstance[id];
                           //console.log(thisComplaintInstance);
                         //  var CompObj = JSON.parse(thisComplaintInstance);
                         var complaintChannel = thisComplaintInstance.id;
                          // console.log(complaintChannel);
                        </script>

                    <!--div class="chat">
                        <div id="app">
                               
                                <chat-log :messages='messages'></chat-log>
                        <chat-composer v-on:messagesent='addmessage' ></chat-composer>
                        </div>
                       
                       
                    </div-->

            </div>
                    <script src="{{ asset('js/app.js')}}" ></script>
                    <style>
                            .card{
                                min-height: 80%;
                                opacity: 1 !important;
                                background-color: aqua !important;
                            }
                            .comp{
                                background-color: aqua !important;
                            }
                           .card .card-body #complaint-content{
                                min-height: 5000px;
                                background-color: aqua;
                            }
                            .main{
                                position: static;
                                /*height: 700px !important;*/
                                min-height: 500px !important;
                                height: auto;
                                padding: 20px;
                                background-color: rgb(220, 220, 220);
                                
                            }
                        </style>
            
                   
                    </div>
    </div>

          

       




    <!--====================================FOOTER====================================-->  

    <div class="footer-container">
    <div class="dashboard-footer">
        
            <div class="row">
                <div class="col-lg-6 text-center">
                    
                    <div class="hline-w"></div>
                        <p>                               
                            <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a>

                            <a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a>

                            <a href="https://www.instagram.com" target="_blank"><i class="fa fa-instagram"></i></a>
                        </p>
                </div>
                <div class="col-lg-6">
                    <p>
                        Copyright &copy; 2019 Egerton University 
                    </p>
                </div>
            </div><!--/row -->
        
    </div> <!--/footer -->
    </div><!--/footer-container -->
    </div>    
    <!-- Bootstrap core JavaScript -->                  
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="js/bootstrap.min.js"></script>
    <script  src="js/custom.js"></script>







@endsection

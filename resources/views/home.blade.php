@extends('layouts.apptry')


<link rel="stylesheet" type="text/css" href={{url('css/sidenav.css')}}>
<link rel="stylesheet" type="text/css" href={{url('css/appointment.css')}}>

@section('content')
<div class="containers">

        @if(\Session::has('error'))

        <div class="alert alert-danger">
        
        {{\Session::get('error')}}
        
        </div>
        
        @endif

    
       


       
                <?php if(auth()->user()->isAdmin == 1){?>

                    <!-- <div class="panel-body">
                      
                      <a href="{{url('admin/dash')}}">Admin</a>
                      
                      </div> -->
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
            <!--  <h2>Open Tasks Shows up here</h2>  -->

            <div class="heading">
            <h2>ADMIN DASHBOARD</h2>
            <hr>
            </div>
            <!-- iterate new cases -->

                                   
            <div class="iterate-app">

                    <div class="myCards">

                    @if(count($complaints)>0)
                    @foreach ($complaints as $case)
                   
    
                    <div class="show">
                            <a href="case/handler/{{$case->id}}">
                                <div class="card">
                                        <div class="card-body">
                                                <small>REF ID: {{$case->id}}</small>
                                                <h5>Department: {{$case->department}}</h5>
                                                   <small>DATE: {{$case->created_at}}</small>
                                        </div>
                                    </div>
                        </a>
                        
    
                    </div>
                        
                    @endforeach
                    @else
                    <div class="card">
                            <div class="card-body">
                                    <p> filed cases appear here.</p>   
                            </div>
                        </div>
                   
                    @endif

                  </div>
                </div>
                    <!--
                                   @if(count($complaints)>0)
                                       @foreach ($complaints as $case)
                                   <div class="card card-body"> 
                                   <a href="case/handler/{{$case->id}}">
                                       <small>REF ID: {{$case->id}}</small>
                                   <h5>Department: {{$case->department}}</h5>
                                      <small>DATE: {{$case->created_at}}</small>
                                       </a>
                                    </div>
                                           
                                       @endforeach

                                   
                                   @else
                                   <p> filed cases appear here.</p>
                                   @endif -->

                                      <!-- end iteration of new tasks here --> 
                                
                            
                           
                           
                            
                            
                            
                            
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
                    </div>
                            
                            
                            <!-- Bootstrap core JavaScript -->                  
                            <!-- Placed at the end of the document so the pages load faster -->
                            
                            <script type="text/javascript" src="js/bootstrap.min.js"></script>
                            <script type="text/javascript" src="js/custom.js"></script>
                            
                      


                            
  
                      <?php } 

                                if(auth()->user()->isAdmin == 0){?>

<div class="myContainer" >






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
             <!--  <h2>Open Tasks Shows up here</h2>  -->
             <h2>STUDENT DASHBOARD</h2>
               <hr>
               
               <div class="col-sm-12" id="profile-display">
                    <p>Full Name: {{ $student[0]->Name }}</p>
                    <p>Registration Number: {{ $student[0]->RegNo }}</p>
                    <p>Email: {{ $student[0]->email }}</p>
                    <p>Phone: {{$student[0]->phoneNo}}</p>
                        
                    </div>

                    <div class="card">
                        <div class="card-body">
                        <h6>Active appointment requests</h6>
                        <hr>
                        
                            @if(count($appointments)==0)
                            <p>No Active Appointment Requests Available.</p>

                            @elseif(count($appointments)>0)

                            @foreach ($appointments as $appo)
                            <div class="card">
                                <div class="card-body">
                                    <small>appointment id: {{$appo->id}}</small> <br>
                                <small>time: {{$appo->timeIn}}</small>
                                <h6>To Director: {{$appo->officerToSee}}</h6>
                                <p>Reason: {{$appo->reasonForVisit}}</p>
                                <p>Remarks: {{$appo->comments}}</p>
                                <p><strong>STATUS: {{$appo->status}}</strong></p>
                                </div>
                            </div>
                                
                            @endforeach

                            @else
                            <p> ERROR LOADING APPOINTMENTS!</p>

                            @endif
                        
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
        
        </div>    
        <!-- Bootstrap core JavaScript -->                  
        <!-- Placed at the end of the document so the pages load faster -->
        
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/custom.js"></script>
        
                                
                                <?php }

                      
                      


                      
                     ?>
              
  



        









    </div>
</div>
<script type="text/javascript" src="js/mdb.min.js"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/nav.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/nav.js')}}"></script>
@endsection

@extends('layouts.apptry')
<style>
    
    .main-content{
        height: 100vh;
    }
    .content-display{
        min-height: 100vh;
    }
    .sidenav{
        position:fixed;
        height: 100%;

    }
    .sidenav ul li{
        color: rgba(230, 230, 230, 0.9);
        list-style: none !important;
        padding:15px 10px;
        border-bottom: 1px solid rgba(100, 100, 100, 0.3);

    }
    .sidenav ul li a{
        color: rgba(200, 200, 230, 0.9);
        text-decoration: none;

    }
    .sidenav ul li:hover{
        background-color: grey;
    }
    .footer-container{
        bottom:0;
    }
</style>
@section('content')
<div class="container">

        @if(\Session::has('error'))

        <div class="alert alert-danger">
        
        {{\Session::get('error')}}
        
        </div>
        
        @endif

    <div class="row justify-content-centers">
        <div class="col-md-12">


        <div class="content-container container-fluid">
                <?php if(auth()->user()->isAdmin == 1){?>

                    <!-- <div class="panel-body">
                      
                      <a href="{{url('admin/dash')}}">Admin</a>
                      
                      </div> -->
                      <div class="row content-display">
                            <div class="col-md-3 sidenav">
<<<<<<< HEAD
                                <h2 class="well text-center"> Some Links</h2>
                                <div Container>
                                    <ul id="sidenav-links">
                                        <li>
                                            <a href="admin/profile">Profile</a>
                                        </li>
                                        
                                        <li>                        
                                            <a href="admin/my_hist">History</a>  
                                        </li>

                                        <li>                        
                                            <a href="schedule">Inspection Schedule</a>  
                                        </li>
                                       
                                    </ul>
                                </div>
=======
                                          
                                <ul>
                                    <li>
                                        <a href="admin/profile">Profile</a>
                                    </li>
                                    
                                    <li>                        
                                        <a href="admin/my_hist">History</a>  
                                    </li>
                                    
                                </ul>
                                
>>>>>>> 503149cad525c0627a7652684efadf809f71750c
                            </div><!--Sidebar col-md-5-->
                            
                            <div class="col-md-9" id="admin-dashboard">
                                
                                <div class="col-md-12">
                                   <h2>ADMIN DASHBOARD</h2>
                                   <hr>
                                   <!-- iterate new cases -->

                                   @if(count($complaints)>0)
                                       @foreach ($complaints as $case)
                                            <div class="card card-body"> 
                                                <a href="case/handler/{{$case->id}}">
                                                    <small>REF ID: {{$case->id}}</small>
                                                    <h5>Department: {{$case->department}}</h5>
                                                    <small>DATE: {{$case->created_at}}</small>
                                                </a>
                                            </div
                                           
                                       @endforeach
                                   
                                   @else
                                        <p> Filed cases appear here.</p>
                                   @endif

                                      <!-- end iteration of new tasks here --> 
                                </div>
                            </div>
                            
                        </div>
                            
                            
                            
                            
                            <!--====================================FOOTER====================================-->  
                            
                            <div class="footer-container">
            
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
                            
                            </div>
                        </div>   
                    <?php } 

                                if(auth()->user()->isAdmin == 0){?>

<div class="row content-display">
        <div class="col-md-3 sidenav">
                <ul>
                    <li>
                        <a href="/student/profile">Your Profile</a>
                    </li>
                    <li>
                        <a href="/student/{id}/complaint">Complain</a>  
                    </li>  
                    <li>                        
                        <a href="/student/{id}/my_hist">History</a>  
                    </li>
                    <li>                          
                        <a href="/student/{id}/rate_service">Rate Us</a>
                    </li>
                </ul>
        </div><!--Sidebar col-md-5-->
        
        <div class="col-md-9">
        
            <div class="col-md-12 main-content">
             <!--  <h2>Open Tasks Shows up here</h2>  -->
             <h2>STUDENT DASHBOARD</h2>
               <hr>
               
                   
            </div>
        
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
        
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/custom.js"></script>
        
                                
                                <?php }

                      
                      


                      
                     ?>
              
  



        </div>









    </div>
</div>
@endsection

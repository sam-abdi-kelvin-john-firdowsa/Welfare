@extends('layouts.apptry')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">

<link rel="stylesheet" type="text/css" href= "{{asset('css/dash.css')}}">
 

@section('content')
 
          

    <div class="content-container container-fluid">
    <div class="row content-display">
    <div class="col-md-3 sidenav">
        <h2 class="well text-center"> Some Links</h2>
        <div Container>
            <ul id="sidenav-links">
                <li>
                    <a href="/student/profile">Your Profile</a>
                </li>
                <li>
                    <a href="/student/complaint">Complain</a>  
                </li>  
                <li>                        
                    <a href="/student/{id}/my_hist">History</a>  
                </li>
                <li>                          
                    <a href="/student/rate_service">Rate Us</a>
                </li>
            </ul>
        </div>

    </div><!--Sidebar col-md-5-->

    <div class="col-md-8">

        <div class="col-md-12 main-content" >
        <!--  <h2>Open Tasks Shows up here</h2>  -->
        <small>Case status: {{$thisCase->status}}</small>
        <br>
        <small>Case submitted at:{{$thisCase->created_at}}</small>
        <br>
        <hr>
        <h6>Department: {{$thisCase->department}}</h6>
        <p>{{$thisCase->details}}</p>
        </div>

    </div>

    </nav> 
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







@endsection

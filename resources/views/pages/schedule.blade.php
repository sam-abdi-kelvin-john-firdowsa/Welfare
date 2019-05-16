@extends('layouts.apptry')


@section('content')
   

    <div class="row content-display">
        <div class="col-md-3 sidenav">
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
        </div><!--Sidebar col-md-5-->
        
        <div class="col-md-8">
        
            <div class="col-md-12 main-content">
             
                <div class="panel-heading">MONTHLY INSPECTION SCHEDULE</div>
             <hr>

             {!! Form::open(array('route' => 'schedule.set', 'method'=>'POST', 'files'=>'true' )) !!}
             {{ csrf_field() }}
             <div class="col-xs-4 col-sm-4 col-md-4">
                 <div class="form-group">
                     {!! Form::label('events', 'Input Inspection Dates')!!}
                     {!! Form::date('day1',null,['class'=>'form-control'] )!!}
                     {!! Form::date('day2',null,['class'=>'form-control'] )!!}
                     {!! Form::date('day3',null,['class'=>'form-control'] )!!}
                     {!! Form::date('day4',null,['class'=>'form-control'] )!!}
                 </div>
                 <div class="col-xs-1 col-sm-1 col-md-1 text-centre"> &nbsp; <br>
                    {!! Form::submit('Set Dates',['class'=>'btn btn-primary'] )!!}
                
                </div>
             </div>
             {!!Form::close() !!}
               
               <!-- calendar shows here -->

              
                  <!-- end calendar here --> 
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
    </div>    
        <!-- Bootstrap core JavaScript -->                  
        <!-- Placed at the end of the document so the pages load faster -->
        
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/custom.js"></script>
        
  


        

@endsection
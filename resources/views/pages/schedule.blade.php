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
             @if (count($schedule) == 0)
             
                {!! Form::open(array('route' => 'schedule.set', 'method'=>'POST', 'files'=>'true', 'autocomplete' => 'off')) !!}
                {{ csrf_field() }}
                <div class="col-xs-4 col-sm-4 col-md-4">
                 <div class="form-group">
                     {!! Form::label('day', 'Input Inspection Dates')!!}
                   <div> {!! Form::label('events', 'Day 1')!!}
                       {!! Form::date('day1',null,['class'=>'form-control'] )!!}</div>  
                   <div> {!! Form::label('day', 'Day 2')!!}
                       {!! Form::date('day2',null,['class'=>'form-control'] )!!}</div> 
                   <div> {!! Form::label('day', 'Day 3')!!}
                       {!! Form::date('day3',null,['class'=>'form-control'] )!!}</div>  
                   <div> {!! Form::label('day', 'Day 4')!!}
                       {!! Form::date('day4',null,['class'=>'form-control'] )!!}</div> 
                 </div>
                 <div class="col-xs-1 col-sm-1 col-md-1 text-centre"> &nbsp; <br>
                    {!! Form::submit('Set Dates',['class'=>'btn btn-primary'] )!!}
                
                </div>
             </div>
             {!!Form::close() !!}
               

              @else 
            <p>The schedule for period <strong>{{$for_period}}</strong>  has been set. <br> However, you can edit the set dates. </p>
             @endif

               <!-- calendar shows here -->
               <br>
               <br>
               <hr>

               <div class="">
                   @if(count($schedule) > 0)

                   <div class="table">
                       <table class="table table-hover">
                           <thead>
                               <tr>
                                   <th scope="col">No.</th>
                                   <th scope="col">Department</th>
                                   <th scope="col">Visit on</th>
                               </tr>
                           </thead>
                           <?php $i = 0 ?>
                           @foreach ($schedule as $sch)
                           <?php $i++ ?>
                           
                               <tr>
                               <th scope="row">{{$i}}</th>
                               <td>{{$sch->department}}</td>
                               <td>{{$sch->visit_on}}</td>
                               </tr>
                           @endforeach
                       </table>
                   </div>

                   @else
                   <h3>Schedule has not been set yet.</h3>

                   @endif
               </div>

              
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
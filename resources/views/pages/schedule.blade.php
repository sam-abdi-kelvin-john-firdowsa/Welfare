@extends('layouts.apptry')

<link rel="stylesheet" type="text/css" href={{url('css/pop.css')}}>
<link rel="stylesheet" type="text/css" href={{url('css/sidenav.css')}}>
<link rel="stylesheet" type="text/css" href={{url('css/appointment.css')}}>

@section('content')

<div class="myContainer">

    
        <div id="sidemenu" class="nav-sidenav">
                            
                        
                <a href="#" class="btn-close" id="showMenu" onclick="closesidemenu()">&times;</a> 
                <a href="home">Home</a>    
                <a href="admin/profile">Profile</a>                         
                <a href="admin/my_hist">History</a>                              
                <a href="schedule">Inspection Schedule</a>  
            
            
            </div>
                <div id="togglesidebar" class="togglesidebar" onclick="opensidemenu()">
                    <span id="q"></span>
                    <span id="q"></span>
                    <span id="q"></span>
                </div>

                <div class="popUp" id="popUp">
                    
                        <div class="popUp-content" id="popUP-content">
                            <div class="padd">
                                    <a href="#" class="btn-close" id="closePopUp">&times;</a>
                                    {!! Form::open(array('route' => 'schedule.update', 'method'=>'POST', 'files'=>'true', 'autocomplete' => 'off')) !!}
                                    {{ csrf_field() }}
                                    {!! Form::label('day', 'Edit Inspection Dates')!!}
                        
                        
                                    <div class="table">
                                     <table class="table table-hover">
                                         <thead>
                                             <tr>
                                                 <th scope="col">No.</th>
                                                 <th scope="col">Department</th>
                                                 <th scope="col">Current Dates</th>
                                                 <th scope="col">New Dates</th>
                                             </tr>
                                         </thead>
                                         <?php $i = 0 ?>
                                         @foreach ($schedule as $sch)
                                         <?php $i++ ?>
                                         
                                             <tr>
                                             <th scope="row">{{$i}}</th>
                                             <td> {{form::text('dept'.$i, $sch->department , ['class'=>'form-control','id'=>'no-border','readonly'=>'readonly'])}} </td>                                                
                                             <td>{{$sch->visit_on}}</td>
                                             <td>{!! Form::input('date','date'.$i,null,['class'=>'form-control', 'placeholder'=>''] )!!} </td>
                                             </tr>
                                         @endforeach
                                     </table>
                                 {{ Form::hidden('_method', 'PUT') }}
                                     <div class="row btn-row"> &nbsp; <br>
                                         <div class="col">{!! Form::submit('Update Dates',['class'=>'btn btn-primary'] )!!}</div>
                                        <div class="col" id="closePopUps">{!! Form::reset('Cancel',['class'=>'btn btn-danger', 'id'=>'closePopUp'] )!!}</div>
                                        
                                    
                                    </div>
                                 
                                 {!!Form::close() !!}
                                   
                                   
                        
                                </div>

                            </div>
                             
                    </div>
                
                   
                       <!-- end pop up here --> 
                 </div>




        <div class="main" id="main" onclick="closesidemenu()"> 

                <div class="heading">
                        <h5><strong>MONTHLY INSPECTION SCHEDULE</strong> </h5>
                        <br>
                        <h6>SCHEDULE:</h6>
                        <hr>
                    </div>

                    <div id="show-free-day-input">

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
            

                    </div>
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
                       <input  id="pop" type="submit" class="btn btn-primary" value="Edit Dates">
                   </div>
                   <script>
                       
                        $(document).ready(function(){
                            $("#pop").click(function(){
                                $(".popUp, .popUp-content").addClass("actives");
                            });
                            $("#closePopUp").click(function(){
                                $(".popUp, .popUp-content").removeClass("actives");
                            });

                            $("#togglesidebar").click(function(){
                                $(this).hide();
                            });

                            $("#showMenu").click(function(){
                                $("#togglesidebar").show();
                            });

                            $("#main").click(function(){
                                $("#togglesidebar").show();
                            });
                       
                        });
        
        

                   </script>

                   @else
                   <h3>Schedule has not been set yet.</h3>

                   @endif
               </div>


            

        </div>   <!-- end main content here --> 










   

    
       
        
       
        
        
        
        
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
        
       
        <!-- Bootstrap core JavaScript -->                  
        <!-- Placed at the end of the document so the pages load faster -->
        
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/custom.js"></script>
        <script type="text/javascript" src="{{URL::asset('js/nav.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/pop.js')}}"></script>
       
        
        
    </div> <!-- myContainer -->
        

@endsection
@extends('layouts.apptry')

 
<link rel="stylesheet" type="text/css" href={{url('css/pop.css')}}>
@section('content')

<div class="myContainerss">

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

           




    <div class="mains" id="main">

        
            <div class="card" >
                <div class="card-body">
                        <!--  <h2>Open Tasks Shows up here</h2>  -->
                        <div class="row">
                            <div class="col">
                                    <small>Case status: {{$thisCase->status}}</small>
                                    <br>
                                    <small>Case submitted at: {{$thisCase->created_at}}</small>
                                    <br>
                                    <small>Case submitted by: {{$thisCase->studReg}}</small> <br>
                                <small>Complainant's contacts: {{$stud->email}} &nbsp; PHONE: {{$stud->phoneNo}}</small>
                                    <br>
                                    <hr>
                                    @if($thisCase->status == 'Closed')
                                    <small>Case closed on: {{$thisCase->closed_at}}</small>
                                    <p>Corrective Action: {{$thisCase->corrective_action}}</p>
                                    @endif
                            </div>
                            <div class="col togg" >
                                
                                <div class="toggleClose">

                                    @if($thisCase->status == 'Open')
                                    
                                    <label class="switch">


                                             
                                            
                                           

                                       
                                        <div class="row">
                                                <input id="pop" type="checkbox">
                                                <span class="slider round"></span>
                                        </div> <br>
                                        <div class="row">
                                                 <p>close case</p>
                                        </div>
                                        
                                        
                                    </label>

                                    @else
                                        <label class="switch closed">
                                            <div class="clsd">
                                                <p> <strong>CLOSED</strong> </p>
                                            </div>
                                        </label>
                                    @endif

                                    <style>
                                        .switch {
                                            position: relative;
                                            display: inline-block;
                                            width: 60px;
                                            height: 34px;
                                            }
                                            .closed .clsd{
                                                background-color: red;
                                                border-radius: 4px;
                                                
                                            }

                                            .closed .clsd p{
                                                color: antiquewhite;
                                                text-align: center;
                                            }

                                            .togg{
                                               
                                                position: relative;
                                            }

                                            .togg .switch{
                                                position: absolute;
                                               
                                                left: 22px;
                                                margin-left: 80%;
                                                top: 10%;
                                            }

                                            /* Hide default HTML checkbox */
                                            .switch input {
                                            opacity: 0;
                                            width: 0;
                                            height: 0;
                                            }

                                            .switch select {
                                            opacity: 0;
                                            width: 0;
                                            height: 0;
                                            }

                                            /* The slider */
                                            .slider {
                                            position: absolute;
                                            cursor: pointer;
                                            top: 0;
                                            left: 0;
                                            right: 0;
                                            bottom: 0;
                                            background-color: #ccc;
                                            -webkit-transition: .4s;
                                            transition: .4s;
                                            }

                                            .slider:before {
                                            position: absolute;
                                            content: "";
                                            height: 26px;
                                            width: 26px;
                                            left: 4px;
                                            bottom: 4px;
                                            background-color: white;
                                            -webkit-transition: .4s;
                                            transition: .4s;
                                            }

                                            input:checked + .slider {
                                            background-color: #2196F3;
                                            }

                                            input:focus + .slider {
                                            box-shadow: 0 0 1px #2196F3;
                                            }

                                            input:checked + .slider:before {
                                            -webkit-transform: translateX(26px);
                                            -ms-transform: translateX(26px);
                                            transform: translateX(26px);
                                            }

                                            /* Rounded sliders */
                                            .slider.round {
                                            border-radius: 34px;
                                            }

                                            .slider.round:before {
                                            border-radius: 50%;
                                            }
                                    
                                    </style>

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
                                </div>




                                <div class="popUp" id="popUp">
                    
                                        <div class="popUp-content" id="popUP-content">
                                            <div class="padd">
                                                    <a href="#" class="btn-close" id="closePopUp">&times;</a>
                                                    {!! Form::open(array('action'=>['ComplaintsController@close', $thisCase->id ], 'method'=>'POST', 'files'=>'true', 'autocomplete' => 'off')) !!}
                                                    {{ csrf_field() }}
                                                    {!! Form::label('day', 'CLOSE CASE')!!}

                                                    {!! Form::label('day', 'Enter Corrective Action Taken:')!!}

                                                    {!! Form::text('action','',['placeholder'=>'corrective action...', 'class'=>'form-control'])!!}


                                        <br> <br>
                                        
                                                   
                                                     
                                                 {{ Form::hidden('_method', 'PUT') }}
                                                     <div class="row btn-row"> &nbsp; <br>
                                                         <div class="col">{!! Form::submit('CLOSE CASE',['class'=>'btn btn-primary'] )!!}</div>
                                                        <div class="col" id="closePopUps">{!! Form::reset('CANCEL',['class'=>'btn btn-danger', 'id'=>'closePopUp'] )!!}</div>
                                                        
                                                    
                                                    </div>
                                                 
                                                 {!!Form::close() !!}
                                                   
                                                   
                                        
                                                </div>
                
                                            
                                             
                                    </div>
                                
                                   
                                       <!-- end pop up here --> 
                                 </div>














                            </div>
                        </div>
                   
                    <hr>
                    <h6>Department: {{$thisCase->department}}</h6>
                    <br>

                    <p>{{$thisCase->details}}</p>
                    </div>
                </div>

                <div class="chat">
                    
                </div>
                    
            <style>
                .card{
                    min-height: 450px;
                    height: auto;
                    opacity: 1 !important;
                }
                .mains{
                    position: static;
                    /*height: 700px !important;*/
                    min-height: 500px !important;
                    height: auto;
                    padding: 20px;
                    background-color: rgb(220, 220, 220);
                    
                }
                .myContainerss{
                    position:inherit;
                   
                   margin-top: 0 !important;
                   top: 0px !important;
                }
                 
            </style>

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

@extends('layouts.apptry')

@section('content')

<link rel="stylesheet" type="text/css" href={{url('css/sidenav.css')}}>
<link rel="stylesheet" type="text/css" href={{url('css/handleappoint.css')}}>

<div class="myContainer">

        <div id="sidemenu" class="nav-sidenav">
           
        
                <a href="#" class="btn-close" onclick="closesidemenu()">&times;</a>    
                <a href="/home">Home</a>
                <a href="/student/{id}/complaint">Complain</a>                         
                <a href="/student/{id}/my_hist">History</a>                             
                
            
            
            </div>
                <div id="togglesidebar" class="togglesidebar" onclick="opensidemenu()">
                    <span id="q"></span>
                    <span id="q"></span>
                    <span id="q"></span>
                </div>
        
                <div class="main" id="main" onclick="closesidemenu()">
                    <div class="heading">
                        <h5>FRONT OFFICE</h5>
                        <hr>
                    </div>
                    <div class="big-crd">
                        <div>
                    <h5><strong>APPOINTMENT ID: </strong>{{$appoint->id}}</h5>
                    </div>

                    <div class="appo-inst">
                        <table class="table-striped">
                            <tbody>
                                <tr>
                                    <th scope="row">NAME</th>
                                <td>{{$appoint->name}}</td>
                                </tr>
                                <tr>
                                   <th scope="row">Reg Number</th>
                                    <td>{{$appoint->regNo}}</td>
                                </tr>

                                <tr>
                                   <th scope="row">PHONE</th>
                                <td>{{$appoint->mobileNo}}</td>
                                </tr>
                                <tr>
                                     <th scope="row">DIRECTOR</th>
                                <td>{{$appoint->officerToSee}}</td>
                                </tr>
                                <tr> <th scope="row">TIME</th>
                                <td>{{$appoint->timeIn}}</td>
                                </tr>
                                <tr>
                                  <th scope="row">REASON</th>
                                <td>{{$appoint->reasonForVisit}}</td>
                                </tr>
                                    
                                
                            </tbody>
                        </table>
                    </div>

                        <hr>

                        <div>
                            <h6>RESPOND TO APPOINTMENT REQUEST:</h6>
                        
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="well">
                                {!! Form::open(['method'=>'POST', 'autocomplete'=>'off', 'action'=>['AppointmentController@sendResponse',$appoint->id ]]) !!}
                                    <div class="row">
                                        <div class="col">
                                            {{form::text('response', '' , ['class'=>'form-control', 'placeholder'=>'Type response here...'])}}
                                           
                                        </div>
                                    </div>
                                    <br>
                                    {{ Form::hidden('_method', 'PUT') }}
                                    <div class="row">
                                        <div class="col">
                                            {{form::submit('ACCEPT', ['class'=>'btn btn-success', 'value'=>'ACCEPT', 'name'=>'submitbutton'])}}
                                           
                                        </div>
                                        &nbsp; 
                                        <div class="col">
                                                {{form::submit('DECLINE', ['class'=>'btn btn-danger', 'value'=>'DECLINE', 'name'=>'submitbutton'])}}
                                            
                                        </div>

                                        </div>
                                    </div>
                                   


                                {!! Form::close() !!}
                                </div>
                            </div>
                        </div>

                        </div>

                    
                    
        
                </div>
        
            </div>
        
        
                <script type="text/javascript" src="{{URL::asset('js/nav.js')}}"></script>
    
@endsection
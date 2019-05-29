@extends('layouts.apptry')

<link rel="stylesheet" type="text/css" href={{url('css/sidenav.css')}}>
<link rel="stylesheet" type="text/css" href={{url('css/handleappoint.css')}}>

@section('content')

<div class="myContainer">
        <div id="sidemenu" class="nav-sidenav">
   

                <a href="#" class="btn-close" onclick="closesidemenu()">&times;</a>    
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

                <div class="main" id="main">
                    <div class="heading">
                        <h3><STRong>FRONT OFFICE</STRong></h3>
                        <hr>
                        <h5>Visitors Registry</h5>
                    </div>

                    <div>
                        <p>Feed Visitors' Records here:</p>
                        <div class="card">
                            <div class="card-body">
                                <div class="well">
                                        {!! Form::open(['method'=>'POST', 'autocomplete'=>'off', 'action'=>'VisitorRegistryController@registerVisitor'])!!}
                                        {{ csrf_field() }}
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th scope="col"><strong>DATE</strong></th>
                                                <th scope="col"><strong>NAME</strong></th>
                                                <th scope="col"><strong>ROLE</strong></th>
                                                <th scope="col"><strong>MOBILE NO</strong></th>
                                                <th scope="col"><strong>REG NO</strong></th>
                                                <th scope="col"><strong>OFFICER TO SEE</strong></th>
                                                <th scope="col"><strong>REASON</strong></th>
                                                <th scope="col"><strong>TIME IN</strong></th>
                                                <th scope="col"><strong>TIME OUT</strong></th>
                                                <th scope="col"><strong>REMARKS</strong></th>
                                                
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td > {{form::date('date', '' , ['class'=>'form-control', 'placeholder'=>''])}}</td>
                                                    <td> {{form::text('name', '' , ['class'=>'form-control', 'placeholder'=>'Name', 'style'=>'font-style:italic'])}}</td>
                                                    <td> {{form::text('role', '' , ['class'=>'form-control', 'placeholder'=>'student','style'=>'font-style:italic'])}}</td>
                                                    <td> {{form::text('mobile', '' , ['class'=>'form-control', 'placeholder'=>'0712345678'])}}</td>
                                                    <td> {{form::text('reg', '' , ['class'=>'form-control', 'placeholder'=>''])}}</td>
                                                    <td> {{form::text('officer', '' , ['class'=>'form-control', 'placeholder'=>''])}}</td>
                                                    <td> {{form::text('purpose', '' , ['class'=>'form-control', 'placeholder'=>'reason'])}}</td>
                                                    <td> {{form::time('timeIn', '' , ['class'=>'form-control', 'placeholder'=>'hh:mm AM'])}}</td>
                                                    <td> {{form::time('timeOut', '' , ['class'=>'form-control', 'placeholder'=>'hh:mm: AM'])}}</td>
                                                    <td> {{form::text('comments', '' , ['class'=>'form-control', 'placeholder'=>'Good','style'=>'font-style:italic'])}}</td>
                                                   

                                                </tr>

                                            </tbody>
                                           
                                           
                                        </table>
                                        <div class="row">

                                                <div class="col">
                                                        {{form::submit('SUBMIT', ['class'=>'btn btn-success', 'value'=>'ACCEPT', 'name'=>'submitbutton'])}}
                                                        
                                                </div>
                                                &nbsp; 
                                                <div class="col">
                                                        {{form::reset('CANCEL', ['class'=>'btn btn-danger', 'name'=>'resetbutton'])}}
                                                        
                                                </div>
                                                
                                            </div>

                                        {!! Form::close() !!}
                                </div>
                                
                            </div>

                        </div>
                    </div>

                    <div>
                        <p>Visitor's entries:</p>
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col"><strong>DATE</strong></th>
                                            <th scope="col"><strong>NAME</strong></th>
                                            <th scope="col"><strong>ROLE</strong></th>
                                            <th scope="col"><strong>MOBILE NO</strong></th>
                                            <th scope="col"><strong>REG NO</strong></th>
                                            <th scope="col"><strong>OFFICER TO SEE</strong></th>
                                            <th scope="col"><strong>REASON</strong></th>
                                            <th scope="col"><strong>TIME IN</strong></th>
                                            <th scope="col"><strong>TIME OUT</strong></th>
                                            <th scope="col"><strong>REMARKS</strong></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($records)==0)
                                        <tr >
                                            <td colspan="10">No records available!</td>
                                        </tr>
                                        @elseif(count($records)>0)
                                            @foreach ($records as $record)
                                                <tr>
                                                <td>{{$record->date}}</td>
                                                <td>{{$record->name}}</td>
                                                <td>{{$record->role}}</td>
                                                <td>{{$record->mobileNo}}</td>
                                                <td>{{$record->regNo}}</td>
                                                <td>{{$record->officerToSee}}</td>
                                                <td>{{$record->reasonForVisit}}</td>
                                                <td>{{$record->timeIn}}</td>
                                                <td>{{$record->timeOut}}</td>
                                                <td>{{$record->remarks}}</td>
                                                   
                                                </tr>
                                                
                                            @endforeach
                                        @else
                                        <tr >
                                                <td colspan="10">Error loading records!</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
</div>

 <script type="text/javascript" src="{{URL::asset('js/nav.js')}}"></script>

@endsection
@extends('layouts.apptry')

@section('content')

   

<link rel="stylesheet" type="text/css" href={{url('css/sidenav.css')}}>
<link rel="stylesheet" type="text/css" href={{url('css/appointment.css')}}>

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
 
<div class="main appointment-booking" id="main" >
    <h5 class="hed" id="hed">BOOK APPOINTMENT</h5>
    <hr>
<div class="dataEntry">


    
<form role="form" action="/setappointment" enctype="multipart/form-data" method="POST" autocomplete="off">
        {{ csrf_field() }}
        
            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Name:</label>
              <div class="col-sm-7">
                <input name="name" type="name" class="form-control" id="name" value="{{$student->Name}}">
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Phone No:</label>
              <div class="col-sm-7">
              <input name="phone" class="form-control" id="phone" value="{{$student->phoneNo}}">
              </div>
            </div>

            <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Reg No:</label>
                    <div class="col-sm-4">
                    <input name="reg" class="form-control" id="reg" value="{{$student->RegNo}}">
                    </div>
                  </div>

            <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Officer to see:</label>
                <div class="col-sm-6">
                    <select name="officer" class="form-control" id="officer" > 
                            <option value="">--please select the officer to see--</option>
                            @foreach ($admin as $adm)
                    <option value="{{$adm->name}}">Director {{$adm->name}}</option>
                                
                            @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Purpose of visit:</label>
                    <div class="col-sm-7">
                      <input name="purpose" class="form-control" id="purpose" placeholder="Reason" style="inline-block">
                    </div>
             </div>

             <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Date to visit:</label>
                    <div class="col-sm-4">
                      <input type="date" name="date" class="form-control" id="date">
                    </div>
                  </div>

             <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Time to visit:</label>
                    <div class="col-sm-4">
                      <input  type="time" name="time" class="form-control" id="time" placeholder="00:00 AM">
                    </div>
                    <div class="col-sm-4">
                          <small>Eg: 11:45 AMs</small>
                     </div>
             </div>
           
            
            <div class="form-group row">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Book Appointment</button>
              </div>
              <div> 
                    <button type="reset" class="btn btn-danger">Cancel</button> 
               </div>
            </div>
          </form>
        </div>


</div>

<script type="text/javascript" src="{{URL::asset('js/nav.js')}}"></script>

@endsection
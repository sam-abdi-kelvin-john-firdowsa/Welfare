@extends('layouts.apptry')

<link rel="stylesheet" type="text/css" href={{url('css/sidenav.css')}}>
<link rel="stylesheet" type="text/css" href={{url('css/appointment.css')}}>
<script type="text/javascript" src="{{URL::asset('js/nav.js')}}"></script>
@section('content')
    
    <div class="myContainer">

            <div id="sidemenu" class="nav-sidenav">
   

                    <a href="#" class="btn-close" onclick="closesidemenu()">&times;</a> 
                    <a href="/home">Home</a>   
                    <a href="/student/profile">Your Profile</a>
                    <a href="/student/{id}/complaint">Complain</a>                         
                    <a href="/student/{id}/my_hist">History</a>                             
                    <a href="/student/book_appointment"><i class="fa fa-envelope"></i> Appointment</a>
                
                
                </div>
                    <div id="togglesidebar" class="togglesidebar" onclick="opensidemenu()">
                        <span id="q"></span>
                        <span id="q"></span>
                        <span id="q"></span>
                    </div>
            

        <div class="main" id="main" onclick="closesidemenu()">

                <form id="complain-forms" class="form-horizontal" role="form" action="/complain" method="POST" >
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="department">Select Department:</label>
                        <select name="department" id="department"required>
                            <option value="">--please select a department--</option>
                            <option value="catering">Catering</option>
                            <option value="accomodation">Accomodation</option>
                            <option value="disability">Disability</option>
                            <option value="security">Security</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="desc">Please state the problem you encountered:</label>
                        <textarea name="desc" id="desc" cols="30" rows="10" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-block btn-primary" value="Submit">
                    </div>
                    <div class="form-group">
                            <input type="reset" class="btn btn-danger" value="Cancel">
                        </div>
                </form>
        </div>
   
    </div>
@endsection
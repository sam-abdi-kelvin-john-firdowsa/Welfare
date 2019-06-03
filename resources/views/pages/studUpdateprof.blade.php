@extends('layouts.apptry')

<link rel="stylesheet" type="text/css" href={{url('css/sidenav.css')}}>
<link rel="stylesheet" type="text/css" href={{url('css/appointment.css')}}>
<link rel="stylesheet" type="text/css" href={{url('css/profilepicSelector.css')}}>
<link rel="stylesheet" type="text/css" href={{url('css/imageSelect/imgareaselect-default.css')}}>
<script type="text/javascript" src="{{URL::asset('js/profilepicSelector.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/imageSelect/jquery.imgareaselect.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/imageSelect/jquery.imgareaselect.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/imageSelect/jquery.imgareaselect.pack.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/imageSelect/jquery.min.js')}}"></script>
@section('content')
<div class="myContainer">

    <div id="sidemenu" class="nav-sidenav">
                            
                        
        <a href="#" class="btn-close" id="showMenu" onclick="closesidemenu()">&times;</a> 
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



<div class="main appointment-booking" id="main" onclick="closesidemenu()">

    <div class="hed" id="hed">
        <h5><strong>Edit Profile</strong> </h5>
        <br>
        
        <hr>
    </div>
    <div class="well">
    {!! Form::open(array('class'=>'form-horizontal','route' => 'profile.edit', 'method'=>'POST', 'enctype'=>'multipart/form-data','files'=>'true', 'autocomplete' => 'off')) !!}
   
      {{csrf_field()}}
        <div class="row">
          
          <!-- left column -->
          <div class="col-md-3">
              <div class="text-center">
              
                  <img src="/storage/profilePictures/{{$student->profilePic}}" onerror="this.src='/storage/profilePictures/{{$student->profilePic}}'" alt=" ERROR! Loading Avatar" id="avatarImg" width="200" height="200">
                
                 
                <!--  <img src="{{asset('images/icons/eu.png')}}" ALT="logo" id="logo" height="50" width="50"> -->
               <br> <br> <h6>Upload a different photo...</h6>
               {!! Form::input('file','profilePic',null,['class'=>'form-control', 'onchange'=>'previewFile()'] )!!}
                <!--input name="profilePic" type="file" class="form-control" onchange="previewFile()"-->
              </div>
            </div>
          
          <!-- edit form column -->
          <div class="col-md-9 personal-info">
           
            <h3>Personal info</h3>
            
           
                 
              <div class="form-group">
                <label class="col-lg-3 control-label">Name:</label>
                <div class="col-lg-8">
                   {{form::text('name', $user->name , ['class'=>'form-control'])}}
                <!--input class="form-control" type="text" name="name" value="{{$user->name}}"-->
                </div>
              </div>
             
              <div class="form-group">
                <label class="col-lg-3 control-label">Email:</label>
                <div class="col-lg-8">
                    {{form::email('email', $user->email , ['class'=>'form-control'])}}
                <!--input class="form-control" type="text" name="email" value="{{$user->email}}"-->
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Reg Number:</label>
                <div class="col-lg-8">
                    {{form::text('RegNo', $student->RegNo, ['class'=>'form-control', 'value'=>"$student->RegNo"])}}
                <!--input class="form-control" type="text" name="RegNo" placeholder="{{$student->RegNo}}"-->
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-md-3 control-label">Phone Number:</label>
                <div class="col-md-8">
                    {{form::text('phoneNo',$student->phoneNo, ['class'=>'form-control', 'value'=>"$student->phoneNo"])}}
                <!--input class="form-control" type="text" name="phoneNo" placeholder="{{$student->phoneNo}}"-->
                </div>
              </div>
            <!--  
              <div class="form-group">
                <label class="col-md-3 control-label">Password:</label>
                <div class="col-md-8">
                  <input class="form-control" type="password" value="11111122333">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Confirm password:</label>
                <div class="col-md-8">
                  <input class="form-control" type="password" value="11111122333">
                </div>
              </div>
            -->

            {{ Form::hidden('_method', 'PUT') }}

              <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-8">
                  <div class="row">
                    <div class="col">
                        {{form::submit('Edit Profile', ['class'=>'btn btn-primary', 'value'=>'Update Profile'])}}
                      <!--button type="submit" class="btn btn-primary" > Update Profile <button--> </div>
                      
                          <span></span>
                          <div class="col"> 
                              {{form::reset('Cancel', ['class'=>'btn btn-danger', 'value'=>'Cancel', 'onclick'=>'removePreview()'])}}
                            <!--input type="reset" class="btn btn-danger" value="Cancel" onclick="removePreview()"--> </div>
                          
                  </div>
                  
                </div>
              </div>
            </form>
          </div>
      </div>
      {!! Form::close() !!}
    </div>
    </div>
    </div>
    <hr>

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

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="{{URL::asset('js/nav.js')}}"></script>
@endsection
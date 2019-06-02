@extends('layouts.apptry')

<link rel="stylesheet" type="text/css" href={{url('css/profilepicSelector.css')}}>
<link rel="stylesheet" type="text/css" href={{url('css/appointment.css')}}>
<link rel="stylesheet" type="text/css" href={{url('css/imageSelect/imgareaselect-default.css')}}>
<script type="text/javascript" src="{{URL::asset('js/profilepicSelector.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/imageSelect/jquery.imgareaselect.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/imageSelect/jquery.imgareaselect.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/imageSelect/jquery.imgareaselect.pack.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/imageSelect/jquery.min.js')}}"></script>
@section('content')
<div class="myContainer">

 


        @if(\Session::has('error'))

        <div class="alert alert-danger">
        
        {{\Session::get('error')}}
        
        </div>
        @endif

<div class="main">
  <div class="heading text-center" id="hed">
      <h5 id="hed">Complete Registration</h5>
          <hr>
  </div>
  <form class="form-horizontal" role="form" action="/profile" enctype="multipart/form-data" method="POST" autocomplete="nope">
    {{ csrf_field() }}
        <div class="row">
          <!-- left column -->
          <div class="col-md-3">
              <div class="text-center">
              
                    <img src="{{asset('images/user/defaultAvatar.jpg')}}" class="avatar img-circle" id="avatarImg" onerror="this.src='{{asset('images/user/defaultAvatar.jpg')}}'" alt="avatar" height="200" width="200">
                
                 
                <!--  <img src="{{asset('images/icons/eu.png')}}" ALT="logo" id="logo" height="50" width="50"> -->
               <br> <br> <h6>Upload a different photos...</h6>
                
                <input name="profilePic" type="file" class="form-control" onchange="previewFile()">
              </div>
            </div>
          <script type="text/javascript">
            $(document).ready(function(){
              $('#avatarImg').imgAreaSelect({
                  handles: true,
                  aspectRatio: "1:1",
                  maxHeight: 200,
                  maxWidth: 200,
                  minHeight: 200,
                  minWidth: 200,
                  show: true

              });
            });
          </script>
          <!-- edit form column -->
          <div class="col-md-9 personal-info">
            
            <h3>Personal info</h3>
            
           
                  {{csrf_field()}}
              <div class="form-group">
                <label class="col-lg-3 control-label">Name:</label>
                <div class="col-lg-8">
                <input class="form-control" type="text" name="name" value="{{$user->name}}">
                </div>
              </div>
             
              <div class="form-group">
                <label class="col-lg-3 control-label">Email:</label>
                <div class="col-lg-8">
                <input class="form-control" type="text" name="email" value="{{$user->email}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Reg Number:</label>
                <div class="col-lg-8">
                  <input class="form-control" type="text" name="RegNo" placeholder="S13/12345/03">
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-md-3 control-label">Phone Number:</label>
                <div class="col-md-8">
                  <input class="form-control" type="text" name="phoneNo" placeholder="+2547945521">
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



              <div class="form-group">
                
                <div class="col-md-8">
                  <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
                    </div>
                   
                    <div class="col">
                        <button type="reset" class="btn btn-danger" value="Cancel" onclick="removePreview()">Cancel</button>
                    </div>
                  </div>
                  
                 
                  
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>
    <hr>
  </div>
@endsection
@extends('layouts.apptry')


@section('content')
<div class="container">


        @if(\Session::has('error'))

        <div class="alert alert-danger">
        
        {{\Session::get('error')}}
        
        </div>
        @endif


        <h1>Complete Registration</h1>
          <hr>
        <div class="row">
          <!-- left column -->
          <div class="col-md-3">
            <div class="text-center">
              <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
              <h6>Upload a different photo...</h6>
              
              <input type="file" class="form-control">
            </div>
          </div>
          
          <!-- edit form column -->
          <div class="col-md-9 personal-info">
            <div class="alert alert-info alert-dismissable">
              <a class="panel-close close" data-dismiss="alert">×</a> 
              <i class="fa fa-coffee"></i>
              This is an <strong>.alert</strong>. Use this to show important messages to the user.
            </div>
            <h3>Personal info</h3>
            
            <form class="form-horizontal" role="form" action="/profile" enctype="multipart/form-data" method="POST">
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
                <label class="col-md-3 control-label"></label>
                <div class="col-md-8">
                  <button type="submit" class="btn btn-primary" > Update Profile <button>
                  <span></span>
                  <input type="reset" class="btn btn-default" value="Cancel">
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>
    <hr>
@endsection
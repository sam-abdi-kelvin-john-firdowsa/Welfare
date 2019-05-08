@extends('layouts.apptry')


@section('content')
<div class="container">
        <h1>Edit Profile</h1>
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
            
            <form class="form-horizontal" role="form">
              <div class="form-group">
                <label class="col-lg-3 control-label">Name:</label>
                <div class="col-lg-8">
                  <input class="form-control" type="text" placeholder="Jane Someone">
                </div>
              </div>
             
              <div class="form-group">
                <label class="col-lg-3 control-label">Email:</label>
                <div class="col-lg-8">
                  <input class="form-control" type="text" placeholder="yourmail@mail.com">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Reg Number:</label>
                <div class="col-lg-8">
                  <input class="form-control" type="text" placeholder="S13/12345/03">
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-md-3 control-label">Phone Number:</label>
                <div class="col-md-8">
                  <input class="form-control" type="text" placeholder="+2547945521">
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
                  <input type="button" class="btn btn-primary" value="Save Changes">
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
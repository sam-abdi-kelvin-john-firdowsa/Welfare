@extends('layouts.apphtml')

@section('content')
    
    <div class="container student-dashboard">
        <div class="row">
            <div class="col-md-8 registration-form">
                <form id="registration-form" name="register" method="post">

                    <legend>Student Registration</legend>

                    <div class="form-group">
                    <label for="regno">Registration Number *</label><input type="text" name="regno" id="regno" class="form-control" placeholder="Example S13/09682/15" >
                    </div>

                    <div class="form-group">
                        <label for="regno">Full Name *</label><input type="text" name="fullname" id="fullname" class="form-control" placeholder="Stephen John" >
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address *</label><input type="email" name="email" id="email" class="form-control" placeholder="someone@hotmail.com" >
                    </div>

                    <div class="form-group">
                        <label for="password">Password *</label><input type="password" name="password" id="password" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label for="password">Confirm Password *</label><input type="password" name="confirmpassword" id="confirmpassword" class="form-control" >
                    </div>
                    
                    <label></label><input type="submit" name="register-student" value="Register" class="btn btn-theme btn-block">

                    <br>
                    <p>Already registered? 
                        <a href="login.html">Login</a>
                    </p>
                </form>
            </div>

            <div class="col-md-4">

                <div class="col-md-12 help">
                    <legend>Help Info</legend>
                    <p>
                        Fill in the form on the left to create an account with the Directorate of University Welfare.
                    </p>
                </div>

            </div>
        </div>

    </div>
@endsection
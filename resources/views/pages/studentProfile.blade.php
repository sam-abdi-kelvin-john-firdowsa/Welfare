@extends('layouts.apptry')

@section('content')
    <div class="container">
        <div class="row">
            <!-- <div class="col-sm-5" id="picture-display">
                <img src="images/index.png" alt="">
                <br><br>
                <input type="file" name="profile">
            </div> -->
            <div class="col-sm-7" id="profile-display">
            <p>Registration Number: {{ $studentUser['studentT']->RegNo }}</p>
            <p>Full Name: {{ $studentUser['userT']->name }}</p>
            <p>Email: {{ $studentUser['userT']->email }}</p>
            <p>Phone: {{$studentUser['studentT']->phoneNo}}</p>
                
            </div>
            <div class="btn btnprimary">
               <a class="btn btn-primary" href="/student/profile_updt">edit profile</a>
            </div>
        </div>
        
    </div>
@endsection   
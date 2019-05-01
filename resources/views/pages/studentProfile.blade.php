@extends('layouts.apphtml')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-5" id="picture-display">
                <img src="images/index.png" alt="">
                <br><br>
                <input type="file" name="profile">
            </div>
            <div class="col-sm-7" id="profile-display">
                <p>Registration Number: S13/09682/15</p>
                <p>Full Name: Stephen Mulei John</p>
                <p>Email: muleistephen3@gmail.com</p>
                <p>Phone: +254708739676</p>
                <p>Password:</p>
            </div>
        </div>
        
    </div>
@endsection   
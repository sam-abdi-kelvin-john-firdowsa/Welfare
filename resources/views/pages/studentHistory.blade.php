@extends('layouts.apptry')

<link rel="stylesheet" type="text/css" href= "{{asset('css/dash.css')}}">
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
    
@section('content')

    
@if(\Session::has('success'))

<div class="alert alert-success">

{{\Session::get('success')}}

</div>
@endif

      

<div class="content-container container-fluid">
    <div class="row content-display">
    <div class="col-md-3 sidenav">
        <h2 class="well text-center"> Some Links</h2>
        <div Container>
            <ul id="sidenav-links">
                <li>
                    <a href="/student/{id}/profile">Your Profile</a>
                </li>
                <li>
                    <a href="/student/{id}/complaint">Complain</a>  
                </li>  
                <li>                        
                    <a href="/student/{id}/my_hist">History</a>  
                </li>
                <li>                          
                    <a href="/student/{id}/rate_service">Rate Us</a>
                </li>
            </ul>
        </div>
    </div><!--Sidebar col-md-5-->
    
          <div class = "complaintList">
              <!-- list the complaints that a specific student has ever made -->
              @if(count($myComplaint)>0)
                    @foreach ($myComplaint as $complaint)
          <a href="/student/case/show/{{$complaint->id}}">
                            <div class="card card-body " max-width="100%">
                           <h5>{{$complaint->department}}</h5>
                        <small>Date: {{$complaint->created_at}}</small>
                        </div>
                       </a>
                        
                    @endforeach

              @else
                    <p>Your cases history appears here.</p>

              @endif

            </div>
    </div>
    </div>
    

    
@endsection
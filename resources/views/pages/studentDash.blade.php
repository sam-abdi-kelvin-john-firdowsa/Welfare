@extends('layouts.apphtml')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">

<link rel="stylesheet" type="text/css" href= "{{asset('css/dash.css')}}">
 

@section('content')
 
<div class="nav-container">
    <nav class="navbar navbar-expand-md navbar-inverse">
        <!-- Brand -->
        <div class="navbar-brand">
            <a class="navbar-brand" href="#"><img src="{{asset('images/icons/eu.png')}}" ALT="logo" id="logo" height="50" width="50"></a>
        </div>
        <p style="text-align:left" id="brand">Directorate of <br> University Welfare</p>
        <!-- Collapse menu -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse navbar-right" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/studhlp">Help</a>
                </li>
            </ul>
        </div>
    </nav> 
</div>       

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

<div class="col-md-8">

    <div class="col-md-12 main-content">
     <!--  <h2>Open Tasks Shows up here</h2>  -->
     <h2>{{$students->FName, $students->SName}}</h2>
       <hr>
       <P>
           Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus necessitatibus velit consequuntur, deleniti corrupti laboriosam et repudiandae modi ea amet! Quibusdam hic culpa aliquid numquam. Explicabo officiis ex id, mollitia quibusdam velit vitae magnam reiciendis quasi temporibus, corporis nobis obcaecati esse voluptas voluptatibus aperiam tempore minima dolore eligendi ut repellat fugit modi aliquid. Nam doloribus temporibus quidem qui iure magni autem? Nisi provident ut fugiat, quisquam ullam quaerat, alias cupiditate aperiam officiis suscipit eius. Fugit quod modi vitae, voluptatum aliquam maiores unde, sapiente culpa veniam rerum exercitationem neque debitis beatae ipsam quibusdam corporis quos accusantium consequatur ut ipsa iure adipisci.
       </P>
       <p>
           Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit illo provident qui nihil, soluta ut. Culpa nisi aut ea quibusdam cum tenetur at ipsa, repudiandae nihil, consectetur officia autem sequi iure vel modi ratione quod voluptate debitis quia! Libero rem pariatur assumenda at ut illum harum, adipisci, laudantium exercitationem, cupiditate ad officia nisi ea alias nobis perspiciatis maxime error. Maiores perferendis quam atque corporis culpa odio saepe placeat dolorem ea voluptatem, quas nostrum quis aut officia incidunt accusamus nulla fugit aperiam illum soluta velit ipsam molestias? Voluptas hic, nemo possimus magni provident recusandae unde quod laudantium iste suscipit enim neque ex quos? Cumque consequatur nihil atque labore corrupti, reprehenderit obcaecati neque cum, corporis natus ab earum a aspernatur quis iusto molestiae officia aperiam voluptatibus omnis pariatur, sint culpa odio voluptate consectetur. Tenetur recusandae iste porro magnam quisquam consequatur sint provident dolorum explicabo, distinctio laudantium perferendis dignissimos sunt nisi dolore expedita aspernatur architecto esse! Veritatis iusto quas impedit fugit autem adipisci vel, culpa officiis doloribus suscipit quo, eaque perferendis. Dolorem sint voluptatibus libero vitae sed quasi odio deleniti quia iure, inventore, corporis laborum ea exercitationem excepturi quibusdam modi maiores tempora! Ipsa modi numquam consectetur temporibus beatae corrupti aut saepe, nisi dolorem.
       </p>
           
    </div>

</div>
</div>
</div>



<!--====================================FOOTER====================================-->  

<div class="footer-container">
<div class="dashboard-footer">
    
        <div class="row">
            <div class="col-lg-6 text-center">
                
                <div class="hline-w"></div>
                    <p>                               
                        <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a>

                        <a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a>

                        <a href="https://www.instagram.com" target="_blank"><i class="fa fa-instagram"></i></a>
                    </p>
            </div>
            <div class="col-lg-6">
                <p>
                    Copyright &copy; 2019 Egerton University 
                </p>
            </div>
        </div><!--/row -->
    
</div> <!--/footer -->
</div><!--/footer-container -->
</div>    
<!-- Bootstrap core JavaScript -->                  
<!-- Placed at the end of the document so the pages load faster -->

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>


@endsection

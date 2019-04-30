<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="{{asset('css/app.css')}}">
         <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
         <link rel="shortcut icon" type="image/png" href="{{asset('images/icons/eu.png')}}">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>{{config('app.name', 'Welfare')}}</title>
 
    <body>
    @section('header')

            <div class="nav-container">
                    <div class="navbar navbar-expand-md bg-dark navbar-dark">
                        <!-- Navbar Brand -->
                        <div class="navbar-brand">
                            <a class="navbar-brand" href="#"><img src="images/eu.png" id="logo" height="50" width="50"></a>
                            
                        </div>
                        <p style="color:aliceblue; text-align:left ">Directorate of <br> University Welfare</p>
                        <!--Collapse menu-->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                                <span class="navbar-toggler-icon"></span>
                            </button>         
                    
                    <!--Nav links-->
                    <div class="navbar-collapse collapse navbar-right">
                        <ul class="navbar-nav ml-auto">
                            <li class="active nav-item">
                                <a class="nav-link" href="#">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">FAQs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Help</a>
                            </li>
                        </ul>
                    </div><!--/.nav-collapse -->
                    </div>
                </div>

    @yield('content')

    @section('footer')

        <div class="footer-container">
                <div class="registration-footer">
                    
                        <div class="row">
                            <div class="col-md-6 text-center">
                                
                            
                                    <p>                               
                                        <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a>

                                        <a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a>

                                        <a href="https://www.instagram.com" target="_blank"><i class="fa fa-instagram"></i></a>
                                    </p>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    Copyright &copy; 2019 Egerton University 
                                </p>
                            </div>
                        </div><!--/row -->
                    
                </div> <!--/footer -->
            </div><!--/footer-container -->
        
            <!--/footerwrap -->
            <!-- Bootstrap core JavaScript
                ================================================== -->
            <!-- Placed at the end of the document so the pages load faster -->
            <script type="text/javascript" src="js/bootstrap.min.js"></script>
            <script type="text/javascript" src="js/custom.js"></script>
    </body>

</html>

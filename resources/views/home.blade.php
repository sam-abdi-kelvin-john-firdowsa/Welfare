@extends('layouts.apptry')

@section('content')
<div class="container">

        @if(\Session::has('error'))

        <div class="alert alert-danger">
        
        {{\Session::get('error')}}
        
        </div>
        
        @endif

    <div class="row justify-content-centers">
        <div class="col-md-8s">


        <div class="content-container container-fluid">
                <?php if(auth()->user()->isAdmin == 1){?>

                    <!-- <div class="panel-body">
                      
                      <a href="{{url('admin/dash')}}">Admin</a>
                      
                      </div> -->
                      <div class="row content-display">
                            <div class="col-md-3 sidenav">
                                <h2 class="well text-center"> Some Links</h2>
                                <div Container>
                                    <ul id="sidenav-links">
                                        <li>
                                            <a href="admin/profile">Profile</a>
                                        </li>
                                        
                                        <li>                        
                                            <a href="admin/my_hist">History</a>  
                                        </li>
                                       
                                    </ul>
                                </div>
                            </div><!--Sidebar col-md-5-->
                            
                            <div class="col-md-8">
                            
                                <div class="col-md-12 main-content">
                                 <!--  <h2>Open Tasks Shows up here</h2>  -->
                                 <h2>ADMIN DASHBOARD</h2>
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
                        </div>    
                            <!-- Bootstrap core JavaScript -->                  
                            <!-- Placed at the end of the document so the pages load faster -->
                            
                            <script type="text/javascript" src="js/bootstrap.min.js"></script>
                            <script type="text/javascript" src="js/custom.js"></script>
                            
                      


                            
  
                      <?php } 

                                if(auth()->user()->isAdmin == 0){?>

<div class="row content-display">
        <div class="col-md-3 sidenav">
            <h2 class="well text-center"> Some Links</h2>
            <div Container>
                <ul id="sidenav-links">
                    <li>
                        <a href="/student/profile">Your Profile</a>
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
             <h2>STUDENT DASHBOARD</h2>
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
        
                                
                                <?php }

                      
                      


                      
                      else echo '';?>
              
  



        </div>









            <div class="card">
                <div class="card-header">Dashboard</div>




                <?php if(auth()->user()->isAdmin == 1){?>

                  <!-- <div class="panel-body">
                    
                    <a href="{{url('admin/dash')}}">Admin</a>
                    
                    </div> -->
                    
                    
                    

                    <?php } else echo '';?>
            

                    
       



                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

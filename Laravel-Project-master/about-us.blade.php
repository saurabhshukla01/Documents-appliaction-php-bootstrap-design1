@extends('backend/master')

@section('content')

<section id="about-us">
        <div class="container">
            <div class="center wow fadeInDown">
                <h2>About IDB University</h2>
                <p class="lead">In keeping with its name, East West University (EWU), rated among the top private universities of Bangladesh, is an institution that promotes eastern culture and values, and meaningfully blends eastern and western thought and innovation. As an institution of higher learning that promotes and inculcates ethical standards, values and norms, EWU is committed to the ideals of equal opportunity, transparency, and non-discrimination. The primary mission of this institution is to provide tertiary education at a reasonable cost, characterized by academic excellence in a range of subjects that are particularly relevant to current and anticipated societal needs. Central to the university’s mission is its intention to provide students with opportunities, resources and expertise to achieve academic, personal and career goals within a stimulating and supportive environment. EWU is striving not only to maintain high quality in both instruction and research, it is also rendering community service through dissemination of information, organization of training programs and other activities. Sensitive to the needs of its students and staff, EWU is committed to providing a humane, responsive and invigorating atmosphere for productive learning and innovative thinking.</p>
            </div>
            
            <!-- about us slider -->
            <div id="about-slider">
                <div id="carousel-slider" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators visible-xs">
                        <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-slider" data-slide-to="1"></li>
                        <li data-target="#carousel-slider" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="images/slider_one.jpg" class="img-responsive" alt=""> 
                       </div>
                       <div class="item">
                            <img src="images/slider_one.jpg" class="img-responsive" alt=""> 
                       </div> 
                       <div class="item">
                            <img src="images/slider_one.jpg" class="img-responsive" alt=""> 
                       </div> 
                    </div>
                    
                    <a class="left carousel-control hidden-xs" href="#carousel-slider" data-slide="prev">
                        <i class="fa fa-angle-left"></i> 
                    </a>
                    
                    <a class=" right carousel-control hidden-xs"href="#carousel-slider" data-slide="next">
                        <i class="fa fa-angle-right"></i> 
                    </a>
                </div> <!--/#carousel-slider-->
            </div><!--/#about-slider-->
            
            
            <!-- Our Skill -->
            <div class="skill-wrap clearfix">
            
                <div class="center wow fadeInDown">
                    <h2>Our Skill</h2>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
                </div>
                
                <div class="row">
        
                    <div class="col-sm-3">
                        <div class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                            <div class="joomla-skill">                                   
                                <p><em>85%</em></p>
                                <p>Joomla</p>
                            </div>
                        </div>
                    </div>
                    
                     <div class="col-sm-3">
                        <div class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                            <div class="html-skill">                                  
                                <p><em>95%</em></p>
                                <p>HTML</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-3">
                        <div class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
                            <div class="css-skill">                                    
                                <p><em>80%</em></p>
                                <p>CSS</p>
                            </div>
                        </div>
                    </div>
                    
                     <div class="col-sm-3">
                        <div class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms">
                            <div class="wp-skill">
                                <p><em>90%</em></p>
                                <p>Wordpress</p>                                     
                            </div>
                        </div>
                    </div>
                    
                </div>
    
            </div><!--/.our-skill-->
            

            <!-- our-team -->
            <div class="team">
                <div class="center wow fadeInDown">
                    <h2>Team of Corlate</h2>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
                </div>

                <div class="row clearfix">
                    <div class="col-md-4 col-sm-6"> 
                        <div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                            <div class="media">
                                <div class="pull-left">
                                    <a href="#"><img class="media-object" src="images/man1.jpg" alt=""></a>
                                </div>
                                <div class="media-body">
                                    <h4>Jhon Doe</h4>
                                    <h5>Founder and CEO</h5>
                                    <ul class="tag clearfix">
                                        <li class="btn"><a href="#">Web</a></li>
                                        <li class="btn"><a href="#">Ui</a></li>
                                        <li class="btn"><a href="#">Ux</a></li>
                                        <li class="btn"><a href="#">Photoshop</a></li>
                                    </ul>
                                    
                                    <ul class="social_icons">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li> 
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div><!--/.media -->
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                        </div>
                    </div><!--/.col-lg-4 -->
                    
                    
                    <div class="col-md-4 col-sm-6 col-md-offset-2"> 
                        <div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                            <div class="media">
                                <div class="pull-left">
                                    <a href="#"><img class="media-object" src="images/man2.jpg" alt=""></a>
                                </div>
                                <div class="media-body">
                                    <h4>Jhon Doe</h4>
                                    <h5>Founder and CEO</h5>
                                    <ul class="tag clearfix">
                                        <li class="btn"><a href="#">Web</a></li>
                                        <li class="btn"><a href="#">Ui</a></li>
                                        <li class="btn"><a href="#">Ux</a></li>
                                        <li class="btn"><a href="#">Photoshop</a></li>
                                    </ul>
                                    <ul class="social_icons">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li> 
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div><!--/.media -->
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                        </div>
                    </div><!--/.col-lg-4 -->                    
                </div> <!--/.row -->
                <div class="row team-bar">
                    <div class="first-one-arrow hidden-xs">
                        <hr>
                    </div>
                    <div class="first-arrow hidden-xs">
                        <hr> <i class="fa fa-angle-up"></i>
                    </div>
                    <div class="second-arrow hidden-xs">
                        <hr> <i class="fa fa-angle-down"></i>
                    </div>
                    <div class="third-arrow hidden-xs">
                        <hr> <i class="fa fa-angle-up"></i>
                    </div>
                    <div class="fourth-arrow hidden-xs">
                        <hr> <i class="fa fa-angle-down"></i>
                    </div>
                </div> <!--skill_border-->       

                <div class="row clearfix">   
                    <div class="col-md-4 col-sm-6 col-md-offset-2"> 
                        <div class="single-profile-bottom wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="600ms">
                            <div class="media">
                                <div class="pull-left">
                                    <a href="#"><img class="media-object" src="images/man3.jpg" alt=""></a>
                                </div>

                                <div class="media-body">
                                    <h4>Jhon Doe</h4>
                                    <h5>Founder and CEO</h5>
                                    <ul class="tag clearfix">
                                        <li class="btn"><a href="#">Web</a></li>
                                        <li class="btn"><a href="#">Ui</a></li>
                                        <li class="btn"><a href="#">Ux</a></li>
                                        <li class="btn"><a href="#">Photoshop</a></li>
                                    </ul>
                                    <ul class="social_icons">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li> 
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div><!--/.media -->
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-md-offset-2">
                        <div class="single-profile-bottom wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="600ms">
                            <div class="media">
                                <div class="pull-left">
                                    <a href="#"><img class="media-object" src="images/man4.jpg" alt=""></a>
                                </div>
                                <div class="media-body">
                                    <h4>Jhon Doe</h4>
                                    <h5>Founder and CEO</h5>
                                    <ul class="tag clearfix">
                                        <li class="btn"><a href="#">Web</a></li>
                                        <li class="btn"><a href="#">Ui</a></li>
                                        <li class="btn"><a href="#">Ux</a></li>
                                        <li class="btn"><a href="#">Photoshop</a></li>
                                    </ul>
                                    <ul class="social_icons">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li> 
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div><!--/.media -->
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                        </div>
                    </div>
                </div>  <!--/.row-->
            </div><!--section-->
        </div><!--/.container-->
    </section><!--/about-us-->

@endsection
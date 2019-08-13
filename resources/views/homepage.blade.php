<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">

    <head>


        <link rel="icon" type="image/png" href="image/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="image/favicon-16x16.png" sizes="16x16" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=6">
        <meta name="description" content="This is english learning page for college student">
        <meta name="theme-color" content="#317EFB">
        <meta name="author" content="UIT">

        <!-- Basic -->
        <title>Home Page</title>

        <!-- Bootstrap CSS  -->
        <link rel="stylesheet" href="homepage_asset/bootstrap/css/bootstrap.min.css" type="text/css">

        <!-- Font Awesome CSS -->
        <link rel="stylesheet" href="homepage_asset/font-awesome/css/font-awesome.min.css" type="text/css">

        <!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="homepage_asset/css/owl.carousel.css" type="text/css">
        <link rel="stylesheet" href="homepage_asset/css/owl.theme.css" type="text/css">
        <link rel="stylesheet" href="homepage_asset/css/owl.transitions.css" type="text/css">
        
        <!-- Css3 Transitions Styles  -->
        <link rel="stylesheet" type="text/css" href="homepage_asset/css/animate.css">
        
        <!-- Lightbox CSS -->
        <link rel="stylesheet" type="text/css" href="homepage_asset/css/lightbox.css">

        <!-- Sulfur CSS Styles  -->
        <link rel="stylesheet" type="text/css" href="homepage_asset/css/style.css">

        <!-- Responsive CSS Style -->
        <link rel="stylesheet" type="text/css" href="homepage_asset/css/responsive.css">


        <script src="homepage_asset/js/modernizrr.js"></script>


    </head>

    <body>
    
        <header class="clearfix">
        
            <!-- Top Bar  -->
        
            <!-- Start  Logo & Naviagtion  -->
            <div class="navbar navbar-default navbar-top">
                <div class="container">
                    <div class="navbar-header">
                        <!-- Stat Toggle Nav Link For Mobiles -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                        <!-- End Toggle Nav Link For Mobiles -->
                        <a class="navbar-brand" href="trangchu">English For College</a>
                    </div>
                    <div class="navbar-collapse collapse">
                        
                        <!-- Start Navigation List -->
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a class="active" href="trangchu">Home</a>
                            </li>
                            <li>
                                <a href="readingnews">Reading News</a>
                            </li>
                            <li>
                                <a href="skillmainpage">Skills</a>
                            </li>
                            <li>
                                <a href="grammarmainpage">Grammar</a>
                            </li>
                            <li>
                                <a href="diary">Diary</a>
                            </li>
                            @if(!Auth::user())
                                <li>
                                    <a href="dangky">Sign Up</a>
                                </li>
                                <li>
                                    <a href="dangnhap">Sign In</a>
                                </li>
                            @else
                                <li>
                                    <a href="nguoidung">{{Auth::user()->name}}</a>
                                    @if(Auth::user()->quyen>=1)
                                    <ul class="dropdown">
                                        <li>
                                            <a href="admin/theloai/danhsach">Manage Data</a>
                                        </li>
                                    </ul>
                                    @endif
                                </li>
                                <li>
                                    <a href="dangxuat">Sign Out</a>
                                </li>
                            @endif
                        </ul>
                        <!-- End Navigation List -->
                    </div>
                </div>
            </div>
            <!-- End Header Logo & Naviagtion -->
            
        </header>
        
        
        <!-- Start Header Section -->
        <div class="banner">
            <div class="overlay">
                <div class="container">
                    <div class="intro-text">
                        <h1>Welcome To <span>English For College</span></h1>
                        <p>Feel free to follow us and we will support you.</p>
                        <p>Join us now by sign up.</p>
                        <a href="grammarmainpage" class="page-scroll btn btn-primary">Learn Now</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Section -->
        
        
        <!-- Start About Us Section -->
    <section id="about-section" class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center wow fadeInDown" data-wow-duration="2s" data-wow-delay="50ms">
                        <h2>About Our Website</h2>
                    </div>                        
                </div>
            </div>
            <div class="row">
               <div class="col-md-5">
                   <div class="about-img">
                       <img src="homepage_asset/images/corporate2.jpg" class="img-responsive" alt="About images">
                       <div class="head-text">
                           <p>Team PMCL2016 - ( UIT-2019 )</p>
                           <span></span>
                       </div>
                   </div>
               </div>
               <div class="col-md-7">
                   <div class="about-text">
                       <p>Our team designs this website to help you learn english. Because we know that english is very important for anyone who wants to study and work in advance.</p>
                       <p>Some of these lessons was copied from others website so we added the original link to support the author</p>
                   </div>
                   
                   <div class="about-list">
                       <h4>Some important Feature</h4>
                       <ul>
                           <li><i class="fa fa-check-square"></i>Learning skills.</li>
                           <li><i class="fa fa-check-square"></i>Doing skills exercise.</li>
                           <li><i class="fa fa-check-square"></i>Learning grammar.</li>
                           <li><i class="fa fa-check-square"></i>Doing grammar exercise.</li>
                       </ul>
                       
                       <h4>More Feature</h4>
                       <ul>
                       <li>
                           <li><i class="fa fa-check-square"></i>Reading news.</li>
                           <li><i class="fa fa-check-square"></i>Commenting on news.</li>
                           <li><i class="fa fa-check-square"></i>Reading others diary.</li>
                           <li><i class="fa fa-check-square"></i>Creating your own diary.</li>
                       </ul>
                   </div>
                   
               </div>
                
                
                
            </div>
        </div>
    </section>
        
        
        <!-- Start Call to Action Section -->
    <section class="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-md-12 wow zoomIn" data-wow-duration="2s" data-wow-delay="300ms">
                    <p>Learn a new language <br> and get a new soul<br> – Czech Proverb – </p>
                </div>
            </div>
        </div>
    </section>
    <!-- End Call to Action Section -->
        
        
        
        
        <!-- Start Team Member Section -->
    <section id="team-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center wow fadeInDown" data-wow-duration="2s" data-wow-delay="50ms">
                        <h2>About Us<h2>
                        <p>Here is our team members. You can contact us by Facebook</p>
                    </div>                        
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="300ms">
                    <div class="team-member">
                        <img src="homepage_asset/images/team/an.jpg" class="img-responsive" alt="">
                        <div class="team-details">
                            <h4>Trần Hoàng Ân</h4>
                            <p>Sub-Team1 Leader</p>
                            <ul>
                                <li><a href="https://www.facebook.com/profile.php?id=100006332441827"><i class="fa fa-facebook"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- /.col-md-3 -->
                <div class="col-md-3 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="600ms">
                    <div class="team-member">
                        <img src="homepage_asset/images/team/binh.jpg" class="img-responsive" alt="">
                        <div class="team-details">
                            <h4>Lục Thiên Bình</h4>
                            <p>Sub-Team2 Leader</p>
                            <ul>
                                <li><a href="https://www.facebook.com/lucthienbinh.98"><i class="fa fa-facebook"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- /.col-md-3 -->
                <div class="col-md-3 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="900ms">
                    <div class="team-member">
                        <img src="homepage_asset/images/team/hoa.jpg" class="img-responsive" alt="">
                        <div class="team-details">
                            <h4>Bùi Gia Hòa</h4>
                            <p>Sub-Team2</p>
                            <ul>
                                <li><a href="https://www.facebook.com/hoa199297"><i class="fa fa-facebook"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- /.col-md-3 -->
                <div class="col-md-3 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="1200ms">
                    <div class="team-member">
                        <img src="homepage_asset/images/team/huy.jpg" class="img-responsive" alt="">
                        <div class="team-details">
                            <h4>Cao Minh Huy</h4>
                            <p>Sub-Team2</p>
                            <ul>
                                <li><a href="https://www.facebook.com/profile.php?id=100008676101975"><i class="fa fa-facebook"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- /.col-md-3 -->
            </div>
        </div>
    </section>
    <!-- End Team Member Section -->
        
    
    <!-- Start Portfolio Section -->
    <section id="portfolio" class="portfolio-section-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center wow fadeInDown" data-wow-duration="2s" data-wow-delay="50ms">
                        <h2>Our Reference Page</h2>
                        <p>Here is our reference website. You can visit these websites by clicking in the link below to support the author.</p>
                    </div>                        
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    
                    <!-- Start Portfolio items -->
                    <ul id="portfolio-list">
                        <li class="wow fadeInLeft" data-wow-duration="2s" data-wow-delay="300ms">
                            <div class="portfolio-item">
                                <img src="homepage_asset/images/portfolio/peg.jpg" class="img-responsive" alt="" />
                                <div class="portfolio-caption" style="padding-top:60px">
                                    <h4>Grammar Section</h4>
                                    <a href="https://www.perfect-english-grammar.com" data-toggle="modal" class="link-1"><p>Grammar lesson and exercise belong to this website.</p></a>
                                </div>
                            </div>
                        </li>
                        <li class="wow fadeInLeft" data-wow-duration="2s" data-wow-delay="600ms">
                            <div class="portfolio-item">
                                <img src="homepage_asset/images/portfolio/bc.jpg" class="img-responsive" alt="" />
                                <div class="portfolio-caption" style="padding-top:60px">
                                    <h4>Skill Section</h4>
                                    <a href="https://learnenglishteens.britishcouncil.org" data-toggle="modal" class="link-1"><p>Skill lesson and exercise belong to this website.</p></a>
                                </div>
                            </div>
                        </li>
                        <li class="wow fadeInLeft" data-wow-duration="2s" data-wow-delay="900ms">
                            <div class="portfolio-item">
                                <img src="homepage_asset/images/portfolio/cnn.jpg" class="img-responsive" alt="" />
                                <div class="portfolio-caption" style="padding-top:60px">
                                    <h4>News Section </h4>
                                    <a href="https://edition.cnn.com" data-toggle="modal" class="link-1"><p>News from Cable News Network</p></a>
                                </div>
                            </div>
                        </li>
                        <li class="wow fadeInLeft" data-wow-duration="2s" data-wow-delay="1200ms">
                            <div class="portfolio-item">
                                <img src="homepage_asset/images/portfolio/nyt.jpg" class="img-responsive" alt="" />
                                <div class="portfolio-caption" style="padding-top:60px">
                                    <h4>News Section</h4>
                                    <a href="https://www.nytimes.com" data-toggle="modal" class="link-1"><p>News from New York Times</p></a>
                                </div>
                            </div>
                        </li>
                        <li class="wow fadeInLeft" data-wow-duration="2s" data-wow-delay="1500ms">
                            <div class="portfolio-item">
                                <img src="homepage_asset/images/portfolio/pcworld.jpg" class="img-responsive" alt="" />
                                <div class="portfolio-caption" style="padding-top:60px">
                                    <h4>News Section</h4>
                                    <a href="https://www.pcworld.com" data-toggle="modal" class="link-1"><p>News from PC World</p></a>
                                </div>
                            </div>
                        </li>
                        <li class="wow fadeInLeft" data-wow-duration="2s" data-wow-delay="1800ms">
                            <div class="portfolio-item">
                                <img src="homepage_asset/images/portfolio/cna.jpg" class="img-responsive" alt="" />
                                <div class="portfolio-caption" style="padding-top:60px">
                                    <h4>News Section</h4>
                                    <a href="https://www.channelnewsasia.com/news/international" data-toggle="modal" class="link-1"><p>News from Chanel News Asia</p></a>
                                </div>
                            </div>
                        </li>
                        
                    </ul>
                    <!-- End Portfolio items -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Portfolio Section -->
       
        
    <!-- Start Service Section -->
    <section id="service-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center wow fadeInDown" data-wow-duration="2s" data-wow-delay="50ms">
                        <h2>Our Suggest Youtube Chanel</h2>
                        <p>You can also learning english by watching video.</p>
                    </div>                        
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="services-post">
                        <a href="https://www.youtube.com/user/caseyneistat/"><i class="fa fa-diamond"></i></a>
                        <h2>CaseyNeistat</h2>
                        <p>Hi, I live in New York City and love YouTube. </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services-post">
                        <a href="https://www.youtube.com/user/Vsauce/"><i class="fa fa-wordpress"></i></a>
                        <h2>Vsauce</h2>
                        <p>Our World is Amazing.  </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services-post">
                        <a href="https://www.youtube.com/user/harpersbazaar/"><i class="fa fa-forumbee"></i></a>
                        <h2>Harper's BAZAAR</h2>
                        <p>Harper's Bazaar is your source for fashion trends.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services-post">
                        <a href="https://www.youtube.com/user/unboxtherapy"><i class="fa fa-bicycle"></i></a>
                        <h2>Unbox Therapy</h2>
                        <p>From the newest smartphone to surprising gadgets and technology.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services-post">
                        <a href="https://www.youtube.com/user/TEDtalksDirector"><i class="fa fa-foursquare"></i></a>
                        <h2>TED</h2>
                        <p>The TED Talks channel features the best talks and performances from the TED Conference.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services-post">
                        <a href="https://www.youtube.com/user/EnglishLessons4U"><i class="fa fa-skyatlas"></i></a>
                        <h2>EnglishLessons4U</h2>
                        <p>Free English lessons in pronunciation, grammar, spelling, and more!</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services-post">
                        <a href="https://www.youtube.com/channel/UCz4tgANd4yy8Oe0iXCdSWfA"><i class="fa fa-magic"></i></a>
                        <h2>English with Lucy </h2>
                        <p>Learn beautiful British English with English teacher Lucy Bella Earl.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services-post">
                        <a href="https://www.youtube.com/channel/UCVBErcpqaokOf4fI5j73K_w"><i class="fa fa-gift"></i></a>
                        <h2>Learn English with Emma</h2>
                        <p>Learning a different language can be hard, but it rewarding experience.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Start Service Section -->
        
        
    <!-- Start Footer Section -->
    <section id="footer-section" class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="section-heading-2">
                        <h3 class="section-title">
                            <span>Office Address</span>
                        </h3>
                    </div>
                    
                    <div class="footer-address">
                        <ul>
                            <li class="footer-contact"><i class="fa fa-home"></i>Khu phố 6, P.Linh Trung, Q.Thủ Đức, Ho Chi Minh city - Viet Nam.</li>
                            <li class="footer-contact"><i class="fa fa-envelope"></i><a href="#">info@uit.edu.vn</a></li>
                            <li class="footer-contact"><i class="fa fa-phone"></i>+84 (028) 372 52002</li>
                            <li class="footer-contact"><i class="fa fa-globe"></i><a href="http://www.uit.edu.vn" target="_blank">www.uit.edu.vn</a></li>
                        </ul>
                    </div>
                </div><!--/.col-md-3 -->
                
                
                <div class="col-md-6">
                    <div class="section-heading-2">
                        <h3 class="section-title">
                            <span>Latest News on Facebook</span>
                        </h3>
                    </div>
                    
                    <div class="latest-tweet">
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-facebook fa-2x media-object"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Visit us on Facebook</h4>
                                <p>For more information about our school. Check it out here <a href="https://www.facebook.com/UIT.Fanpage/">www.facebook.com/UIT.Fanpage/</a></p>
                            </div>
                        </div>
                    </div>
                </div><!--/.col-md-3 -->
            </div><!--/.row -->
        </div><!-- /.container -->
    </section>
    <!-- End Footer Section -->
    
    
    <!-- Start CCopyright Section -->
    <div id="copyright-section" class="copyright-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="copyright">
                        Copyright © 2019. All Rights Reserved. Original Design and Developed by <a href="http://www.themefisher.com">Themefisher</a>
                    </div>
                </div>
                
                <div class="col-md-5">
                    <div class="copyright-menu pull-right">
                        <ul>
                            <li><a href="trangchu" class="active">Home</a></li>
                        </ul>
                    </div>
                </div>
            </div><!--/.row -->
        </div><!-- /.container -->
    </div>
    <!-- End CCopyright Section -->
        
        
        
       <!-- Sulfur JS File -->
        <script src="homepage_asset/js/jquery-2.1.3.min.js"></script>
        <script src="homepage_asset/js/jquery-migrate-1.2.1.min.js"></script>
        <script src="homepage_asset/bootstrap/js/bootstrap.min.js"></script>
        <script src="homepage_asset/js/owl.carousel.min.js"></script>
        <script src="homepage_asset/js/jquery.appear.js"></script>
        <script src="homepage_asset/js/jquery.fitvids.js"></script>
        <script src="homepage_asset/js/jquery.nicescroll.min.js"></script>
        <script src="homepage_asset/js/lightbox.min.js"></script>
        <script src="homepage_asset/js/count-to.js"></script>
        <script src="homepage_asset/js/styleswitcher.js"></script>
        
        <script src="homepage_asset/js/map.js"></script>
        <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <script src="homepage_asset/js/script.js"></script> 
        
    
    </body>
</html>

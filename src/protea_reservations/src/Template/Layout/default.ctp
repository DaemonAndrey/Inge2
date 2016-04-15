<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
    <!-- Basic Page Needs
    ================================================== -->
        <meta charset="utf-8">
        <title>PROTEA Reservaciones</title>
        <meta name="description" content="">
        <!-- Mobile Specific Metas
    ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
         <!-- CSS
         ================================================== -->
        <!-- Bootstrap -->
		<?php echo $this->Html->css('bootstrap.min.css');
        // FontAwesome -->
		echo $this->Html->css('font-awesome.min.css');
        // Animation -->
		echo $this->Html->css('animate.css');
        // Owl Carousel -->
		echo $this->Html->css('owl.carousel.css');
		echo $this->Html->css('owl.theme.css');
        // Pretty Photo -->
		echo $this->Html->css('prettyPhoto.css');
        // Main color style -->
		echo $this->Html->css('red.css');
        // Template styles-->
		echo $this->Html->css('custom.css');
        // Responsive -->
		echo $this->Html->css('responsive.css');
		echo $this->Html->css('jquery.fancybox.css?v=2.1.5.css');
        ?>
		<link rel="stylesheet" href="css/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<link href='http://fonts.googleapis.com/css?family=Lato:400,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500' rel='stylesheet' type='text/css'>
        
            <div class="container">
                 <!-- <div class="row"> -->
                 <div class="navbar-header ">
                     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">
                            <?php echo $this->Html->image('logo-protea.png', ['alt' => '']); ?>
                        </a>
                 </div><!--Navbar header End-->
                 <nav class="collapse navbar-collapse navigation" id="bs-example-navbar-collapse-1" role="navigation">
                    <ul class="nav navbar-nav navbar-right ">
                        <li class="active"><?php echo $this->Html->link('Inicio', array('controller'=>'pages','action' => 'home'),
                                                                                array('target' => '_self', 'escape' => false)) ?> </li>
                        <li><?php echo $this->Html->link('Registro',    array('controller'=>'users','action' => 'add')) ?> </li>
                        <li><?php echo $this->Html->link('Acerca de',   array('controller'=>'pages','action' => 'home'),
                                                                        array('target' => '_self', 'escape' => false)) ?> </li>
                        <!-- <li><a href="#contact" class="page-scroll">Contacto</a> </li> -->
                    </ul>
                 </nav>
            </div><!-- /.container-fluid -->
	</head>

 <body data-spy="scroll" data-target=".navbar-fixed-top">
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
     
      
     
    <?= $this->fetch('content') ?>

    <!-- Footer Area Start -->

    <section id="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <h3 class="menu_head">Main Menu</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="#about">Home</a></li>
                                <li><a href="#service">Service</a></li>
                                <li><a href="#portfolio">Portfolio</a></li>
                                <li><a href="#blog">Blog</a></li>
                                <li><a href="#contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <h3 class="menu_head">Useful Links</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="#">Terms of use</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#"> inventore natus ullam eum</a></li>
                                <li><a href="#">consectetur adipisicing elit.</a></li>
                                <li><a href="#">Frequently Asked Questions</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <h3 class="menu_head">Contact us</h3>
                        <div class="footer_menu_contact">
                            <ul>
                                <li> <i class="fa fa-home"></i>
                                    <span> 12 Segun Bagicha, 10th Floor </span></li>
                                <li><i class="fa fa-globe"></i>
                                    <span> +880-12345678</span></li>
                                <li><i class="fa fa-phone"></i>
                                    <span> info@mail.com</span></li>
                                <li><i class="fa fa-map-marker"></i>
                                <span> www.web.com</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <h3 class="menu_head">Tags</h3>
                        <div class="footer_menu tags">
                            <a href="#"> Design</a>
                            <a href="#"> User Interface</a>
                            <a href="#"> Graphics</a>
                            <a href="#"> Web Design</a>
                            <a href="#"> Development</a>
                            <a href="#"> Asp.net</a>
                            <a href="#"> Bootstrap</a>
                            <a href="#"> Joomla</a>
                            <a href="#"> SEO</a>
                            <a href="#"> Wordepress</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer_b">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="footer_bottom">
                            <p class="text-block"> &copy; Copyright reserved to <span>Cyprass </span></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="footer_mid pull-right">
                            <ul class="social-contact list-inline">
                                <li> <a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li> <a href="#"><i class="fa fa-rss"></i></a></li>
                                <li> <a href="#"><i class="fa fa-google-plus"></i> </a></li>
                                <li><a href="#"> <i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"> <i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Footer Area End -->

    <!-- Back To Top Button -->
       <!-- <div id="back-top">
            <a href="#slider_part" class="scroll" data-scroll>
                <button class="btn btn-primary" title="Back to Top"><i class="fa fa-angle-up"></i></button>
            </a>
        </div>-->
    <!-- End Back To Top Button -->



<!-- Javascript Files
    ================================================== -->
    <!-- initialize jQuery Library -->

		<!-- initialize jQuery Library -->
        <!-- Main jquery -->
        <?php
        echo $this->Html->script('jquery.js');
        // Bootstrap jQuery -->
        echo $this->Html->script('bootstrap.min.js');
        // Owl Carousel -->
        echo $this->Html->script('owl.carousel.min.js');
        // Isotope -->
        echo $this->Html->script('jquery.isotope.js');
        // Pretty Photo -->
        echo $this->Html->script('jquery.prettyPhoto.js');
        // SmoothScroll -->
        echo $this->Html->script('smooth-scroll.js');
        // Image Fancybox -->
        echo $this->Html->script('jquery.fancybox.pack.js?v=2.1.5');
        // Counter  -->
        echo $this->Html->script('jquery.counterup.min.js');
        // waypoints -->
        echo $this->Html->script('waypoints.min.js');
        // Bx slider -->
        echo $this->Html->script('jquery.bxslider.min.js');
        // Scroll to top -->
        echo $this->Html->script('jquery.scrollTo.js');
        // Easing js -->
        echo $this->Html->script('jquery.easing.1.3.js');
   		// PrettyPhoto -->
        echo $this->Html->script('jquery.singlePageNav.js');
      	// Wow Animation -->
        echo $this->Html->script('wow.min.js');
        // Google Map  Source -->
        echo $this->Html->script('gmaps.js');
        // Custom js -->
        echo $this->Html->script('custom.js');
        ?>
	    
        <script>
		// Google Map - with support of gmaps.js
         var map;
            map = new GMaps({
              div: '#map',
              lat: 23.709921,
              lng: 90.407143,
              scrollwheel: false,
              panControl: false,
              zoomControl: false,
            });

            map.addMarker({
              lat: 23.709921,
              lng: 90.407143,
              title: 'Smilebuddy',
              infoWindow: { 
                content: '<p> Smilebuddy, Dhanmondhi 27</p>'
              },
              icon: "images/map1.png"
            });
      	</script>
 
    </body>
</html>
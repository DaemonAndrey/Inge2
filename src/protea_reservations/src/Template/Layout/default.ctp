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
        echo $this->Html->css('font-awesome.css');
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
		echo $this->Html->css('jquery.fancybox.css');
        ?>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<link href='http://fonts.googleapis.com/css?family=Lato:400,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css"> 
        </head>

<header>
        
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                     <div class="navbar-header ">

                        <!-- LOGO DE PROTEA -->
                        <a class="navbar-brand" href="#">
                            <?php 
                                // Crea la imagen
                                $imgLogo = $this->Html->image('logo-protea.png', array( 'alt' => 'Protea', 'width' => '150'));

                                // Hace el link con la imagen
                                echo $this->Html->link($imgLogo,'http://www.facultadeducacion.ucr.ac.cr/protea',
                                                       array('target'=>'_blank', 'escape' => false));
                            ?>
                        </a>

                         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                     </div><!--Navbar header End-->

                    <nav class="collapse navbar-collapse navigation" id="bs-example-navbar-collapse-1" role="navigation">
                        <ul class="nav navbar-nav navbar-right ">
                            <li class="active"><?php echo $this->Html->link('<span class="glyphicon glyphicon-home"></span> Inicio',
                                                                            array('controller'=>'pages','action' => 'home'),
                                                                            array('target' => '_self', 'escape' => false)) ?> </li>
                            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-user"></span> Registro',
                                                             array('controller'=>'users','action' => 'add'),
                                                             array('target' => '_self', 'escape' => false)) ?> </li>
                            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-log-in"></span> Ingresar',
                                                             array('controller'=>'users','action' => 'login'),
                                                             array('target' => '_self', 'escape' => false)) ?> </li>
                            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-book"></span> Reservar',
                                                             array('controller'=>'pages','action' => 'home'),
                                                             array('target' => '_self', 'escape' => false)) ?> </li>
                            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-cog"></span> Mi Cuenta',
                                                             array('controller'=>'pages','action' => 'home'),
                                                             array('target' => '_self', 'escape' => false)) ?> </li>
                            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-tasks"></span> Administrar',
                                                             array('controller'=>'pages','action' => 'home'),
                                                             array('target' => '_self', 'escape' => false)) ?> </li>
                            <!--<li><?php /*echo $this->Html->link('<span class="glyphicon glyphicon-info-sign"></span> Acerca de',
                                                             array('controller'=>'pages','action' => 'home'),
                                                             array('target' => '_self', 'escape' => false)) */?> </li>-->
                            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-phone"></span> Contacto',
                                                             array('controller'=>'pages','action' => 'home'),
                                                             array('target' => '_self', 'escape' => false)) ?> </li>
                            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-log-out"></span> Salir',
                                                             array('controller'=>'users','action' => 'logout'),
                                                             array('target' => '_self', 'escape' => false)) ?> </li>
                        </ul>
                    </nav>
                </div>
            </div><!-- class row -->
        </div><!-- /.container-fluid -->
</header>

<body data-spy="scroll" data-target=".navbar-fixed-top">
     
      
     
    <?= $this->fetch('content') ?>


<!-- Footer Area Start -->
    
    <div id="g-map" class="no-padding">
	<div class="container-fluid">
		<div class="row">
			<div class="map" id="map"></div>
		</div>
	</div>
</div>

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
        echo $this->Html->script('jquery.fancybox.pack.js');
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
        var imgMap = {
    url: 'http://lh4.ggpht.com/Tr5sntMif9qOPrKV_UVl7K8A_V3xQDgA7Sw_qweLUFlg76d_vGFA7q1xIKZ6IcmeGqg=w100'}
        
         // Google Map - with support of gmaps.js
         var map;
            map = new GMaps({
              div: '#map',
              lat: 9.936099,
              lng: -84.048795,
              zoom: 18,
              scrollwheel: false,
              panControl: false,
              zoomControl: true,
            });

            map.addMarker({
                div: '#map',
              lat: 9.936099,
              lng: -84.048795,
              animation: google.maps.Animation.BOUNCE,
              animation: google.maps.Animation.BOUNCE,
              title: 'Facultad de Educación',
              infoWindow: { 
                content: '<p> Facultad de Educación, <br>Universidad de Costa Rica</p>'
              },
              icon: imgMap,
            });
             
      	</script>
 
    </body>
</html>

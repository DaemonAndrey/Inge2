<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<!-- HEAD ================================================= -->
<head>
    <!-- META ============================================= -->
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Mobile Specific Metas -->
    <!-- FIN META ========================================= -->
    
    
    <!-- TITULO  ========================================== -->
    <title>PROTEA Reservaciones</title>
    <!-- ================================================== -->

    
    <!-- CSS ============================================== -->
    <?php
    echo $this->Html->css('bootstrap.min.css');         // Bootstrap
    echo $this->Html->css('font-awesome.css');          // FontAwesome
    echo $this->Html->css('font-awesome.min.css');      // FontAwesome
    echo $this->Html->css('animate.css');               // Animation
    echo $this->Html->css('owl.carousel.css');          // Owl Carousel
    echo $this->Html->css('owl.theme.css');             // Owl Carousel
    echo $this->Html->css('prettyPhoto.css');           // Pretty Photo
    echo $this->Html->css('red.css');                   // Main color style
    echo $this->Html->css('custom.css');                // Template styles
    echo $this->Html->css('responsive.css');            // Responsive
    echo $this->Html->css('jquery.fancybox.css');       // Responsive
    echo $this->Html->css('mensajes.css');

        //Calendario

    echo $this->Html->css('fullcalendar/fullcalendar.css');  
    echo $this->Html->css('fullcalendar/style.css');  
    echo $this->Html->script('jquery.min.js');                  // Main jquery -> Debe cargar primero para evitar conflictos
    ?>
    <link type='text/css' rel='stylesheet' href='http://fonts.googleapis.com/css?family=Lato:400,300'>
    <link type='text/css' rel='stylesheet' href='http://fonts.googleapis.com/css?family=Raleway:400,300,500'>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css"> 
    <!-- FIN CSS ========================================== -->
    
    
    <!-- SCRIPTS ========================================== -->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <!-- FIN SRIPTS ======================================= --> 
</head> <!-- FIN HEAD ===================================== -->


<!-- ENCABEZADO =========================================== -->
<header style="background: #91BB1B">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12">

                <!-- NAVBAR HEADER ================== -->
                <div class="navbar-header ">
                    <!-- LOGO ================== -->
                    <a class="navbar-brand" href="#">
                        <?php 
                        // Crea la imagen
                        $imgUcrLogo = $this->Html->image('logo-ucr.png', array( 'alt' => 'Protea', 'height' => '50'));
                        $imgProteaLogo = $this->Html->image('logo-protea.png', array( 'alt' => 'Protea', 'height' => '50'));
                        $imgFaceduLogo = $this->Html->image('logo-facedu.png', array( 'alt' => 'Protea', 'height' => '50'));
                        
                        // Hace el link con la imagen
                        echo $this->Html->link($imgUcrLogo,'http://www.ucr.ac.cr',
                                               array('target'=>'_blank', 'escape' => false));
                        echo $this->Html->link($imgProteaLogo,'http://www.facultadeducacion.ucr.ac.cr/protea',
                                               array('target'=>'_blank', 'escape' => false));
                        echo $this->Html->link($imgFaceduLogo,'http://www.facultadeducacion.ucr.ac.cr',
                                               array('target'=>'_blank', 'escape' => false));
                        ?>
                    </a> <!-- FIN LOGO ================ -->

                    <!-- COLAPSAR ==================== -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button> <!-- FIN COLAPSAR ========= -->
                </div> <!-- FIN NAVBAR HEADER ========== -->

                <!-- NAVEGACION ================== -->
                <nav class="collapse navbar-collapse navigation" id="bs-example-navbar-collapse-1" role="navigation">
                    <!-- OPCIONES ================ -->
                    <ul class="nav navbar-nav navbar-right ">
                        <!-- INICIO -->
                        <li class="active"><?php echo $this->Html->link('<span class="glyphicon glyphicon-home"></span> Inicio',
                                                                        array('controller'=>'pages','action' => 'home'),
                                                                        array('target' => '_self', 'escape' => false)) ?> </li>
                        <?php
                        // SI NO ESTA LOGGEADO
                        if($user_username == NULL)
                        {   ?>
                            <!-- ACERCA DE -->
                            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-info-sign"></span> Acerca de',
                                                             array('controller'=>'pages','action' => 'home'),
                                                             array('target' => '_self', 'escape' => false)) ?> </li>
                            <!-- CONTACTO -->
                            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-phone"></span> Contacto',
                                                             array('controller'=>'pages','action' => 'home'),
                                                             array('target' => '_self', 'escape' => false)) ?> </li>
                            <!-- REGISTRAR -->
                            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-user"></span> Registrar',
                                                             array('controller'=>'users','action' => 'add'),
                                                             array('target' => '_self', 'escape' => false)) ?> </li>
                            <!-- LOGIN -->
                            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-log-in"></span> Ingresar',
                                                             array('controller'=>'users','action' => 'login'),
                                                             array('target' => '_self', 'escape' => false)) ?> </li>
                            <?php
                        } ?>

                        <?php
                        // SI ESTA LOGGEADO
                        if($user_username != NULL)
                        {   // SI ES USUARIO
                            if($user_role_id == '2')
                            {
                                ?>
                                <!-- ACERCA DE -->
                                <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-info-sign"></span> Acerca de',
                                                                 array('controller'=>'pages','action' => 'home'),
                                                                 array('target' => '_self', 'escape' => false)) ?> </li>
                                <!-- CONTACTO -->
                                <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-phone"></span> Contacto',
                                                                 array('controller'=>'pages','action' => 'home'),
                                                                 array('target' => '_self', 'escape' => false)) ?> </li>
                                <!-- RESERVAR -->
                                <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-book"></span> Reservar',
                                                                 array('controller'=>'reservations','action' => 'index'),
                                                                 array('target' => '_self', 'escape' => false)) ?> </li>
                                <?php
                            } 
                            // SI ES ADMINISTRADOR
                            if($user_role_id == '1')
                            {
                                ?>
                                <!-- ADMINISTRAR -->
                                <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-tasks"></span> Administrar',
                                                                 array('controller'=>'pages','action' => 'home'),
                                                                 array('target' => '_self', 'escape' => false)) ?> </li>
                                <?php
                            } ?>
                            <!-- MI CUENTA -->
                            <li><?php echo $this->Html->link( '<span class="glyphicon glyphicon-cog"></span> '.$user_username,
                                                             array('controller'=>'pages','action' => 'home'),
                                                             array('target' => '_self', 'escape' => false)) ?> </li>
                            <!-- LOGOUT -->
                            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-log-out"></span> Salir',
                                                             array('controller'=>'users','action' => 'logout'),
                                                             array('target' => '_self', 'escape' => false)) ?> </li>
                            <?php
                        } ?>    
                    </ul> <!-- FIN OPCIONES =========== -->
                </nav> <!-- FIN NAVEGACION ============ -->
            </div>
            <div class="lead text-info" style="text-align:center; color: #00A3C5">
                    <br>
                    <?= $this->Flash->render('addUserSuccess') ?>
                    <?= $this->Flash->render('logoutSuccess') ?>
            </div>
        </div><!-- class row -->
    </div><!-- /.container-fluid -->
</header>
<!-- FIN ENCABEZADO ======================================= -->
    

<!-- CUERPO =============================================== -->
<body data-spy="scroll" data-target=".navbar-fixed-top">
     
    <hr>
    
    <?= $this->fetch('content') ?> <!-- Trae el contenido de las demás páginas aquí -->

    <hr>
    
    <!-- PIE DE PAGINA ======================================== -->
    <section id="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <h3 class="menu_head">Menú Principal</h3>
                        <div class="footer_menu">
                            <ul>
                                <!-- INICIO -->
                                <li><?php echo $this->Html->link('Inicio',
                                                                        array('controller'=>'pages','action' => 'home'),
                                                                        array('target' => '_self', 'escape' => false)) ?> </li>
                                <?php
                                // SI NO ESTA LOGGEADO
                                if($user_username == NULL)
                                {   ?>
                                    <!-- ACERCA DE -->
                                    <li><?php echo $this->Html->link('Acerca de',
                                                                     array('controller'=>'pages','action' => 'home'),
                                                                     array('target' => '_self', 'escape' => false)) ?> </li>
                                    <!-- CONTACTO -->
                                    <li><?php echo $this->Html->link('Contacto',
                                                                     array('controller'=>'pages','action' => 'home'),
                                                                     array('target' => '_self', 'escape' => false)) ?> </li>
                                    <!-- REGISTRAR -->
                                    <li><?php echo $this->Html->link('Registrar',
                                                                     array('controller'=>'users','action' => 'add'),
                                                                     array('target' => '_self', 'escape' => false)) ?> </li>
                                    <!-- LOGIN -->
                                    <li><?php echo $this->Html->link('Ingresar',
                                                                     array('controller'=>'users','action' => 'login'),
                                                                     array('target' => '_self', 'escape' => false)) ?> </li>
                                    <?php
                                } ?>

                                <?php
                                // SI ESTA LOGGEADO
                                if($user_username != NULL)
                                {   // SI ES USUARIO
                                    if($user_role_id == '2')
                                    {
                                        ?>
                                        <!-- ACERCA DE -->
                                        <li><?php echo $this->Html->link('Acerca de',
                                                                         array('controller'=>'pages','action' => 'home'),
                                                                         array('target' => '_self', 'escape' => false)) ?> </li>
                                        <!-- CONTACTO -->
                                        <li><?php echo $this->Html->link('Contacto',
                                                                         array('controller'=>'pages','action' => 'home'),
                                                                         array('target' => '_self', 'escape' => false)) ?> </li>
                                        <!-- RESERVAR -->
                                        <li><?php echo $this->Html->link('Reservar',
                                                                         array('controller'=>'reservations','action' => 'index'),
                                                                         array('target' => '_self', 'escape' => false)) ?> </li>
                                        <?php
                                    } 
                                    // SI ES ADMINISTRADOR
                                    if($user_role_id == '1')
                                    {
                                        ?>
                                        <!-- ADMINISTRAR -->
                                        <li><?php echo $this->Html->link('Administrar',
                                                                         array('controller'=>'pages','action' => 'home'),
                                                                         array('target' => '_self', 'escape' => false)) ?> </li>
                                        <?php
                                    } ?>
                                    <!-- MI CUENTA -->
                                    <li><?php echo $this->Html->link( 'Mi Cuenta',
                                                                     array('controller'=>'pages','action' => 'home'),
                                                                     array('target' => '_self', 'escape' => false)) ?> </li>
                                    <!-- LOGOUT -->
                                    <li><?php echo $this->Html->link('Salir',
                                                                     array('controller'=>'users','action' => 'logout'),
                                                                     array('target' => '_self', 'escape' => false)) ?> </li>
                                    <?php
                                } ?>    
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <h3 class="menu_head">Enlaces</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="#">Términos de uso</a></li>
                                <li><a href="#">Política de privacidad</a></li>
                                <li><a href="#">Preguntas frecuentes</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <h3 class="menu_head">Contacto</h3>
                        <div class="footer_menu_contact">
                            <ul>
                                <li> <i class="fa fa-calendar"></i>
                                    <span> Lun a Vie 8am-12md y 1pm-5pm</span></li>
                                <li> <i class="fa fa-map-marker"></i>
                                    <span> 2do piso, Facultad de Educación</span></li>
                                <li><i class="fa fa-phone"></i>
                                    <span> (506) 2511-5387 / 2511-8868</span></li>
                                <li><i class="fa fa-fax"></i>
                                    <span> (506) 2511-6123</span></li>
                                <li><i class="fa fa-send"></i>
                                    <span> protea.educacion@ucr.ac.cr</span></li>
                                <li><i class="fa fa-globe"></i>
                                    <span> facultadeducacion.ucr.ac.cr/protea</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <h3 class="menu_head">Etiquetas</h3>
                        <div class="footer_menu tags">
                            <a href="#"> Diseño</a>
                            <a href="#"> Interfaz de usuario</a>
                            <a href="#"> Gráficos</a>
                            <a href="#"> Diseño Web</a>
                            <a href="#"> Desarrollo</a>
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
                            <p class="text-block"> En colaboración con <span>ECCI UCR </span></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="footer_mid pull-right">
                            <ul class="social-contact list-inline">
                                <li><a target="_blank" href="http://www.facebook.com/proteaucr"><i class="fa fa-facebook"></i></a></li>
                                <li><a target="_blank" href="http://www.twitter.com/proteaed"><i class="fa fa-twitter"></i></a></li>
                                <li><a target="_blank" href="http://www.youtube.com/proteaeducacion"><i class="fa fa-youtube-play"></i></a></li>
                                <!--
                                <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i> </a></li>
                                <li><a href="#"> <i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"> <i class="fa fa-pinterest"></i></a></li>
                                -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FIN PIE DE PAGINA ==================================== -->


    <!-- JAVASCRIPT =========================================== -->
    <?php
    //echo $this->Html->script('jquery.js'); 
    echo $this->Html->script('bootstrap.min.js');           // Bootstrap jQuery
    echo $this->Html->script('owl.carousel.min.js');        // Owl Carousel
    echo $this->Html->script('jquery.isotope.js');          // Isotope
    echo $this->Html->script('jquery.prettyPhoto.js');      // Pretty Photo
    echo $this->Html->script('smooth-scroll.js');           // SmoothScroll
    echo $this->Html->script('jquery.fancybox.pack.js');    // Image Fancybox
    echo $this->Html->script('jquery.counterup.min.js');    // Counter
    echo $this->Html->script('waypoints.min.js');           // waypoints
    echo $this->Html->script('jquery.bxslider.min.js');     // Bx slider
    echo $this->Html->script('jquery.scrollTo.js');         // Scroll to top
    echo $this->Html->script('jquery.easing.1.3.js');       // Easing
    echo $this->Html->script('jquery.singlePageNav.js');    // PrettyPhoto
    echo $this->Html->script('wow.min.js');                 // Wow Animation
    echo $this->Html->script('gmaps.js');                   // Google Map  Source
    echo $this->Html->script('custom.js');                 // Custom

        //Calendario
    echo $this->Html->script('moment.min.js');
    echo $this->Html->script('fullcalendar.js');  
    


    ?>

    <script>
        // Google Map - with support of gmaps.js
        var map;
        
        // Mapa
        map = new GMaps({
            div: '#map',
            lat: 9.936099,      // Facultad Educacion Latitud
            lng: -84.048795,    // Facultad Educacion Longitud
            zoom: 18,
            scrollwheel: false,
            panControl: false,
            zoomControl: true,
        });

        // Marcador
        map.addMarker({
            div: '#map',
            lat: 9.936099,      // Facultad Educacion Latitud
            lng: -84.048795,    // Facultad Educacion Longitud
            animation: google.maps.Animation.BOUNCE,
            title: 'Facultad de Educación',
            infoWindow: {content: '<p> Facultad de Educación, <br>Universidad de Costa Rica</p>'},
            icon: 'http://lh4.ggpht.com/Tr5sntMif9qOPrKV_UVl7K8A_V3xQDgA7Sw_qweLUFlg76d_vGFA7q1xIKZ6IcmeGqg=w100'
        });
    </script>
    <!-- FIN JAVASCRIPT =============================== -->
</body> <!-- FIN CUERPO =============================== -->
</html>

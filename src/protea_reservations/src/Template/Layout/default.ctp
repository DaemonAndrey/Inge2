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
    <?= $this->Html->meta(
    'favicon.ico',
    '/logo-facedu.png',
    ['type' => 'icon']
);
?>
    
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
    //echo $this->Html->css('style.css');

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



    

<!-- CUERPO =============================================== -->
<body data-spy="scroll" data-target=".navbar-fixed-top">

<div id="navbar-background">

  <?php
    $imgUcrLogo = $this->Html->image('logo-ucr.png', [ 'alt' => 'Protea','id'=>'logo_ucr']);

                    // Hace el link con la imagen
    echo $this->Html->link($imgUcrLogo,'http://www.ucr.ac.cr',
                                           ['target'=>'_blank', 'escape' => false]);
 ?>
    <nav class="navbar">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right ">
                            
                            <!-- INICIO -->
                            <li class="active"><?php echo $this->Html->link('<span class="glyphicon glyphicon-home"></span> Inicio',
                                                                            array('controller'=>'pages','action' => 'home'),
                                                                            array('target' => '_self', 'escape' => false, 'title'=>'Ve al inicio de la página')) ?> </li>

                            

                            <?php
                            // SI NO ESTA LOGGEADO
                            if(is_null($this->request->session()->read('Auth.User.username')))
                            {   ?>
                                <!-- ACERCA DE -->
                                <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-info-sign"></span> Acerca de',

                                                                 array('controller'=>'pages','action' => 'about'),
                                                                 array('target' => '_self', 'escape' => false, 'title'=>'Conoce más de nosotros')) ?> </li>
                                <!-- CONTACTO -->
                                <li><a href="#cont" class="page-scroll" ><span class="glyphicon glyphicon-phone"></span> Contacto</a> </li>
                            
                                <!-- REGISTRAR -->
                                <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-user"></span> Registrar',
                                                                 array('controller'=>'users','action' => 'registrar'),
                                                                 array('target' => '_self', 'escape' => false, 'title'=>'Presiona para registrarte')) ?> </li>

                                <!-- LOGIN -->
                                <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-log-in"></span> Ingresar',
                                                                 array('controller'=>'users','action' => 'login'),
                                                                 array('target' => '_self', 'escape' => false, 'title'=>'¿Ya eres usuario? ¡Ingresá!')) ?> </li>
                                <?php
                            } ?>

                            <?php

                            // SI ESTA LOGGEADO
                            if(!is_null($this->request->session()->read('Auth.User.username')))
                            {                                  
                                // SI ES USUARIO
                                if($this->request->session()->read('Auth.User.role_id') == '2')
                                {
                                    ?>                        
                                    <!-- RESERVAR -->
                                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-book"></span> Reservar',
                                                                     array('controller'=>'reservations','action' => 'index'),
                                                                     array('target' => '_self', 'escape' => false)) ?> </li>
                                    <?php
                                } 
                                
                                // SI ES ADMINISTRADOR
                                if($this->request->session()->read('Auth.User.role_id') == '1')
                                {
                                    ?>
                                    <!-- ADMINISTRAR -->
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown">
                                        <span class="glyphicon glyphicon-tasks"></span> Administrar <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="administrar" aria-labelledby="menu1">
                                        <!-- ADMINISTRAR RECURSOS -->
                                        <li role="recursos"><?php echo $this->Html->link('Recursos',
                                                                 array('controller'=>'resources','action' => 'index'),
                                                                 array('target' => '_self', 'escape' => false)) ?> </li>

                                        <!-- ADMINISTRAR TIPOS DE RECURSOS -->
                                        <li role="tipos de recurso"><?php echo $this->Html->link('Tipos de Recurso',
                                                                 array('controller'=>'resourceTypes','action' => 'index'),
                                                                 array('target' => '_self', 'escape' => false)) ?> </li>
                                    </ul>
                                </li>
                            
                                    <!-- VER RESERVAS -->
                                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-book"></span> Ver Reservas',
                                                                     array('controller'=>'reservations','action' => 'index'),
                                                                     array('target' => '_self', 'escape' => false)) ?> </li>
                                    <?php
                                } ?>
                            
                                <!-- MI CUENTA -->
                                <li><?php echo $this->Html->link( '<span class="glyphicon glyphicon-cog"></span> '.$this->request->session()->read('Auth.User.username'),
                                                                 array('controller'=>'pages','action' => 'home'),
                                                                 array('target' => '_self', 'escape' => false)) ?> </li>
                            
                                <!-- LOGOUT -->
                                <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-log-out"></span> Salir',
                                                                 array('controller'=>'users','action' => 'logout'),
                                                                 array('target' => '_self', 'escape' => false)) ?> </li>
                                <?php
                            } ?>    
                        </ul> <!-- FIN OPCIONES =========== -->



                <div class="lead text-info" style="text-align:center; color: #FFFFFF">
                        <br>
                        <?= $this->Flash->render('addUserSuccess') ?>
                        <?= $this->Flash->render('logoutSuccess') ?>
                </div>

        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
</div>



    
    <?= $this->fetch('content') ?> <!-- Trae el contenido de las demás páginas aquí -->
    

    
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
                                <li class="active"><?php echo $this->Html->link('Inicio',
                                                                                array('controller'=>'pages','action' => 'home'),
                                                                                array('target' => '_self', 'escape' => false, 'title'=>'Ve al inicio de la página')) ?> </li>

                                <?php
                                // SI NO ESTA LOGGEADO
                                if(is_null($this->request->session()->read('Auth.User.username')))
                                {   ?>
                                    <!-- ACERCA DE -->
                                    <li><?php echo $this->Html->link('Acerca de',
                                                                     array('controller'=>'pages','action' => 'about'),
                                                                     array('target' => '_self', 'escape' => false, 'title'=>'Conoce más de nosotros')) ?> </li>
                                
                                    <!-- REGISTRAR -->
                                    <li><?php echo $this->Html->link('Registrar',
                                                                     array('controller'=>'users','action' => 'registrar'),
                                                                     array('target' => '_self', 'escape' => false, 'title'=>'Presiona para registrarte')) ?> </li>

                                    <!-- LOGIN -->
                                    <li><?php echo $this->Html->link('Ingresar',
                                                                     array('controller'=>'users','action' => 'login'),
                                                                     array('target' => '_self', 'escape' => false, 'title'=>'¿Ya eres usuario? ¡Ingresá!')) ?> </li>
                                    <?php
                                } ?>

                                <?php

                                // SI ESTA LOGGEADO
                                if(!is_null($this->request->session()->read('Auth.User.username')))
                                {                                  
                                    // SI ES USUARIO
                                    if($this->request->session()->read('Auth.User.role_id') == '2')
                                    {
                                        ?> 
                                        <!-- ACERCA DE -->
                                        <li><?php echo $this->Html->link('Acerca de',
                                                                     array('controller'=>'pages','action' => 'about'),
                                                                     array('target' => '_self', 'escape' => false, 'title'=>'Conoce más de nosotros')) ?> </li>
                                
                                        <!-- RESERVAR -->
                                        <li><?php echo $this->Html->link('Reservar',
                                                                         array('controller'=>'reservations','action' => 'index'),
                                                                         array('target' => '_self', 'escape' => false)) ?> </li>
                                        <?php
                                    } 

                                    // SI ES ADMINISTRADOR
                                    if($this->request->session()->read('Auth.User.role_id') == '1')
                                    {
                                        ?>                            
                                        <!-- ADMINISTRAR -->
                                        <li><?php echo $this->Html->link('Administrar',
                                                                         array('controller'=>'pages','action' => 'home'),
                                                                         array('target' => '_self', 'escape' => false)) ?> </li>
                                        <?php
                                    } ?>

                                    <!-- MI CUENTA -->
                                    <li><?php echo $this->Html->link( $this->request->session()->read('Auth.User.username'),
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
                                <!-- FAQ PREGUNTAS FRECUENTES -->
                                <li><?php echo $this->Html->link( 'Preguntas frecuentes',
                                                                 array('controller'=>'pages','action' => 'faq'),
                                                                 array('target' => '_self', 'escape' => false)) ?> </li>
                                <!-- TÉRMINOS DE USO -->
                                <li><?php echo $this->Html->link( 'Términos de uso',
                                                                 array('controller'=>'pages','action' => 'terms'),
                                                                 array('target' => '_self', 'escape' => false)) ?> </li>
                                <!-- POLÍTICA DE PRIVACIDAD -->
                                <li><?php echo $this->Html->link( 'Política de privacidad',
                                                                 array('controller'=>'pages','action' => 'privacy'),
                                                                 array('target' => '_self', 'escape' => false)) ?> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12" id="cont">
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
    echo $this->Html->script('lang/es.js'); 
    


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

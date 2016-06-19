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
    ); ?>
    <!-- FIN META ========================================= -->
    
    
    <!-- TITULO  ========================================== -->
    <title>PROTEA Reservaciones</title>
    <!-- FIN TITULO ======================================= -->

    
    <!-- CSS ============================================== -->
    <?php
    echo $this->Html->css('bootstrap.min.css');             // Bootstrap
    echo $this->Html->css('red.css');                       // Main color style
    echo $this->Html->css('custom.css');                    // Template styles
    echo $this->Html->css('mensajes.css');
    echo $this->Html->css('fullcalendar/fullcalendar.css'); //Calendario
    echo $this->Html->css('fullcalendar/style.css');  
    echo $this->Html->script('jquery.min.js');              // Main jquery -> Debe cargar primero para evitar conflictos
    ?>
    <link type='text/css' rel='stylesheet' href='http://fonts.googleapis.com/css?family=Lato:400,300'>
    <link type='text/css' rel='stylesheet' href='http://fonts.googleapis.com/css?family=Raleway:400,300,500'>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css"> 
    <!-- FIN CSS ========================================== -->
    
    
    <!-- SCRIPTS ========================================== -->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <!-- FIN SRIPTS ======================================= --> 
</head>
<!-- FIN HEAD ============================================= -->

    

<!-- CUERPO =============================================== -->
<body data-spy="scroll" data-target=".navbar-fixed-top">
<div id="navbar-background">
  <div class="row">
        <!-- LOGO UCR ===================================== -->
        <div class="col-md-3 col-sm-3 col-xs-3">
        <?php
            $imgUcrLogo = $this->Html->image('logo-ucr.png',
                                             ['alt' => 'Protea',
                                              'id'=>'logo_ucr']);

            // Hace el link con la imagen
            echo $this->Html->link($imgUcrLogo,
                                   'http://www.ucr.ac.cr',
                                   ['target'=>'_blank',
                                    'escape' => false]);
        ?>
        </div>
        <!-- FIN LOGO UCR ================================= -->
      
        <div class="col-md-9 col-sm-9 col-xs-9">
            </br>
        </div>
    
        <!-- REDES SOCIALES =============================== -->
        <div class="col-md-9 col-sm-9 col-xs-9">
            <div>
                </br>
                <ul class="text-right" style="margin-top:3px">
                    <ul class="social-contact list-inline">
                        <li>
                            <a target="_blank" href="https://www.facebook.com/pages/Facultad-de-Educaci%C3%B3n-UCR/179257438867025">
                                <i class="fa fa-facebook" id="facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="http://www.twitter.com/proteaed">
                                <i class="fa fa-twitter" id="tw"></i>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="http://www.youtube.com/proteaeducacion">
                                <i class="fa fa-youtube-play" id="yt"></i>
                            </a>
                        </li>
                    </ul>
                </ul>
            </div>
        </div>
        <!-- FIN REDES SOCIALES ============================== -->
       
    </div>
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
          <a class="navbar-brand" href="http://www.facultadeducacion.ucr.ac.cr/" target="_blank">
                <?php echo $this->Html->image("logo-facedu.png", [
                "alt" => "Facultad de Educación", 'id'=> 'logo-educa']); ?>
          </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right ">

                <!-- INICIO -->
                <li class="active">
                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-home"></span> Inicio',
                                                 array('controller'=>'pages',
                                                       'action' => 'home'),
                                                 array('target' => '_self',
                                                       'escape' => false,
                                                       'title'=>'Ve al inicio de la página')) ?>
                </li>

                <?php
                // SI NO ESTA LOGGEADO
                if( is_null( $this->request->session()->read('Auth.User.username') ) )
                {
                    ?>
                    <!-- REGISTRAR -->
                    <li>
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-user"></span> Registrar',
                                                     array('controller'=>'users',
                                                           'action' => 'add'),
                                                     array('target' => '_self',
                                                           'escape' => false,
                                                           'title'=>'Presiona para registrarte')) ?>
                    </li>

                    <!-- LOGIN -->
                    <li>
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-log-in"></span> Ingresar',
                                                     array('controller'=>'users',
                                                           'action' => 'login'),
                                                     array('target' => '_self',
                                                           'escape' => false,
                                                           'title'=>'¿Ya eres usuario? ¡Ingresá!')) ?>
                    </li>
                    <?php
                }
                ?>

                <?php
                // SI ESTA LOGGEADO
                if( !is_null( $this->request->session()->read('Auth.User.username') ) )
                {  
                    ?>
                    <?php
                    // SI ES USUARIO
                    if( $this->request->session()->read('Auth.User.role_id') == '1' )
                    {
                        ?>                        
                        <!-- RESERVAR -->
                        <li>
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-book"></span> Reservar',
                                                         array('controller'=>'reservations',
                                                               'action' => 'index'),
                                                         array('target' => '_self',
                                                               'escape' => false)) ?>
                        </li>
                        <?php
                    }
                    ?>

                    <?php
                    // SI ES ADMINISTRADOR O SUPERADMIN
                    if($this->request->session()->read('Auth.User.role_id') == '2' ||
                       $this->request->session()->read('Auth.User.role_id') == '3')
                    {
                        ?>
                        <!-- ADMINISTRAR -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-tasks"></span> Administrar <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="administrar" aria-labelledby="menu1">
                                <!-- ADMINISTRAR RESERVACIONES PENDIENTES -->
                                <li role="reservaciones">
                                    <?php echo $this->Html->link('Reservaciones pendientes',
                                                                 array('controller'=>'reservations',
                                                                       'action' => 'manage'),
                                                                 array('target' => '_self',
                                                                       'escape' => false)) ?>
                                </li>

                                <!-- ADMINISTRAR HISTORIAL DE RESERVACIONES -->
                                <li role="mis_reservaciones">
                                    <?php echo $this->Html->link('Historial de reservaciones',
                                                                 array('controller'=>'pages',
                                                                       'action' => 'home'),
                                                                 array('target' => '_self',
                                                                       'escape' => false)) ?>
                                </li>

                                <!-- ADMINISTRAR TIPOS DE RECURSOS -->
                                <li role="tipos de recurso">
                                    <?php echo $this->Html->link('Tipos de Recurso',
                                                                 array('controller'=>'resourceTypes',
                                                                       'action' => 'index'),
                                                                 array('target' => '_self',
                                                                       'escape' => false)) ?>
                                </li>

                                <!-- ADMINISTRAR RECURSOS -->
                                <li role="recursos">
                                    <?php echo $this->Html->link('Recursos',
                                                                 array('controller'=>'resources',
                                                                       'action' => 'index'),
                                                                 array('target' => '_self',
                                                                       'escape' => false)) ?>
                                </li>
                                
                                <!-- ADMINISTRAR CUENTAS DE USUARIO -->
                                <?php
                                if($this->request->session()->read('Auth.User.role_id') == '3')
                                {
                                    ?>
                                    <li role="usuarios">
                                        <?php echo $this->Html->link('Cuentas de Usuarios',
                                                                     array('controller'=>'users',
                                                                           'action' => 'index'),
                                                                     array('target' => '_self',
                                                                           'escape' => false)) ?>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </li>

                        <!-- VER CALENDARIO -->
                        <li>
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-calendar"></span> Ver Calendario',
                                                         array('controller'=>'reservations',
                                                               'action' => 'index'),
                                                         array('target' => '_self',
                                                               'escape' => false)) ?>
                        </li>
                        <?php
                    }
                    ?>

                    <!-- MI CUENTA -->
                    <li class="dropdown">
                        <?php
                        echo $this->Html->link($this->request->session()->read('Auth.User.username').'<span class="caret"></span>',
                                               '#',
                                               array('class' => 'dropdown-toggle',
                                                     'data-delay' => '1000',
                                                     'data-hover' => 'dropdown',
                                                     'escape' => false));
                        ?>
                        <ul class="dropdown-menu" role="administrar" aria-labelledby="menu2">
                            <!-- ACTUALIZAR MI CUENTA -->
                            <li role="mi_cuenta">
                                <?php echo $this->Html->link('Actualizar Mi Cuenta',
                                                             array('controller'=>'users',
                                                                   'action' => 'edit',
                                                                   $this->request->session()->read('Auth.User.id')),
                                                             array('target' => '_self',
                                                                   'escape' => false)) ?>
                            </li>

                            <?php
                            if($this->request->session()->read('Auth.User.role_id') == 1 )
                            {
                                ?>
                                <!-- MIS RESERVACIONES -->
                                <li role="mis_reservaciones">
                                    <?php echo $this->Html->link('Mis Reservaciones',
                                                                 array('controller'=>'reservations',
                                                                       'action' => 'manage'),
                                                                 array('target' => '_self',
                                                                       'escape' => false)) ?>
                                </li>
                                
                                <!-- HISTORIAL DE MIS RESERVACIONES -->
                                <li role="mis_reservaciones">
                                    <?php echo $this->Html->link('Historial de reservaciones',
                                                                 array('controller'=>'pages',
                                                                       'action' => 'home'),
                                                                 array('target' => '_self',
                                                                       'escape' => false)) ?>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </li>


                    <!-- LOGOUT -->
                    <li>
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-log-out"></span> Salir',
                                                     array('controller'=>'users',
                                                           'action' => 'logout'),
                                                     array('target' => '_self',
                                                           'escape' => false)) ?>
                    </li>
                    <?php
                }
                ?>

                <!-- AYUDA -->
                <?php
                if($this->request->session()->read('Auth.User.role_id') == '1' ||
                   $this->request->session()->read('Auth.User.role_id') == '2' ||
                   $this->request->session()->read('Auth.User.role_id') == '3')
                {
                    ?>
                    <li>
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-question-sign"></span> Ayuda',
                                                     array('controller'=>'pages',
                                                           'action' => 'help'),
                                                     array('target' => '_self',
                                                           'escape' => false,
                                                           'title'=>'Manual de ayuda')) ?>
                    </li>
                    <?php
                }
                ?>
            </ul>
            <!-- FIN OPCIONES =========== -->

                <div class="lead text-info" style="text-align:center; color: #FFFFFF">
                    <br>
                    <?= $this->Flash->render() ?>
                </div>

        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
</div>

<div id="post-nav"> </div>


<!-- ===================================================================== -->
    <!-- Trae el contenido de las demás páginas aquí -->
    <?= $this->fetch('content') ?> 
<!-- ===================================================================== -->


<!-- MODAL PARA LOS MENSAJES FLASH ======================================== -->
<div id="flash" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" role="button" aria-label="Cerrar">&times;</button>
                <h4 class="modal-title">Información</h4>
            </div>
            <div class="modal-body">

                <h4 style="color:red;"><?= $this->Flash->render('error') ?></h4>
                <h4 style='color:green;'><?= $this->Flash->render('success') ?></h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" role="button" aria-label="Cerrar">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<!-- PIE DE PAGINA ======================================== -->
<section id="footer">
    <div class="footer_b">
        <div class="container">
            <div class="row text-center">
                <div class="col-xs-12">
                    <p style="color:#fff;"> Derechos reservados - Facultad de Educación <?php echo date("Y"); ?></p>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- FIN PIE DE PAGINA ==================================== -->


<!-- JAVASCRIPT =========================================== -->
<?php
echo $this->Html->script('bootstrap.min.js');   // Bootstrap jQuery
echo $this->Html->script('gmaps.js');           // Google Map  Source
echo $this->Html->script('moment.min.js');
echo $this->Html->script('fullcalendar.js');    //Calendario
echo $this->Html->script('lang/es.js'); 
echo $this->Html->script('vistas_admin.js');
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
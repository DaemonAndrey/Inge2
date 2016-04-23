<!--FontAwesome -->
<?php echo $this->Html->css('font-awesome.min.css'); ?>

<!-- SLIDER -->
<section id="slider_part">
     <div class="carousel slide" id="carousel-example-generic" data-ride="carousel">
         
        <!-- ENLACE A PANTALLAS -->
         <ol class="carousel-indicators text-center">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
         </ol> <!-- FIN ENLACE PANTALLAS -->
         
         <!-- PANTALLAS -->
        <div class="carousel-inner">
            <!-- PANTALLA 1 -->
            <div class="item active">
                <div class="overlay-slide">
                    <?php echo $this->Html->image('protea/facultad1.jpg', ['alt' => ''], ['class' => 'img-responsive']); ?>
                </div>
                <div class="carousel-caption">
                    <div class="col-md-12 col-xs-12 text-center">
                  <h2>PROTEA</h2>
                        <h3 class="animated2">Conexiones para aprender</h3>
                        <!--<div class="line"></div>-->
                        <p class="animated3">Reservación de recursos</p>
                    </div>
                </div>
            </div>
            <!-- PANTALLA 2 -->
            <div class="item">
                <div class="overlay-slide">
                    <?php echo $this->Html->image('protea/facultad1.jpg', ['alt' => ''], ['class' => 'img-responsive']); ?>
                </div>
                <div class="carousel-caption">
                    <div class="col-md-12 col-xs-12 text-center">
                <h2>PROTEA</h2>
                        <h3 class="animated2">Facultad de Educación</h3>
                        <!--<div class="line"></div>-->
                        <p class="animated3">Reservación de recursos</p>
                    </div>
                </div>
            </div>
            <!-- PANTALLA 3 -->
            <div class="item">
                <div class="overlay-slide">
                    <?php echo $this->Html->image('protea/facultad1.jpg', ['alt' => ''], ['class' => 'img-responsive']); ?>
                </div>
                <div class="carousel-caption">
                    <div class="col-md-12 col-xs-12 text-center">
                <h2>PROTEA</h2>
                        <h3 class="animated2">Universidad de Costa Rica</h3>
                        <!-- <div class="line"></div> -->
                        <p class="animated3">Reservación de recursos</p>
                    </div>
                </div>
            </div>
         </div> <!-- FIN PANTALLAS -->

        <!-- CONTROLES -->
        <div class="slides-control ">
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span><i class="fa fa-angle-left"></i></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span><i class="fa fa-angle-right"></i></span>
            </a>
        </div> <!-- FIN CONTROLES -->
         
    </div>
</section>
<!--/ FIN SLIDER -->

<!-- MAPA -->
<div id="g-map" class="no-padding">
	<div class="container-fluid">
		<div class="row">
			<div class="map" id="map"></div>
		</div>
	</div>
</div> <!-- FIN MAPA -->
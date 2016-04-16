<!--FontAwesome -->
		<?php echo $this->Html->css('font-awesome.min.css'); ?>
<!-- Slider start -->
    <section id="slider_part">
         <div class="carousel slide" id="carousel-example-generic" data-ride="carousel">
            <!-- Indicators -->
         	 <ol class="carousel-indicators text-center">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
             </ol>

           	<div class="carousel-inner">
           	 	<div class="item active">
           	 		<div class="overlay-slide">
                        <?php echo $this->Html->image('protea/facultad1.jpg', ['alt' => ''], ['class' => 'img-responsive']); ?>
           	 		</div>
           	 		<div class="carousel-caption">
               	 		<div class="col-md-12 col-xs-12 text-center">
                      <h2>PROTEA</h2>
               	 			<h3 class="animated2"> <b>Conexiones</b> para aprender </h3>
               	 			<!--<div class="line"></div>-->
               	 			<p class="animated3">Escuela de Educación</p>
               	 		</div>
           	 		</div>
           	 	</div>
                <div class="item">
                    <div class="overlay-slide">
                        <?php echo $this->Html->image('protea/facultad1.jpg', ['alt' => ''], ['class' => 'img-responsive']); ?>
           	 		</div>
           	 		<div class="carousel-caption">
               	 		<div class="col-md-12 col-xs-12 text-center">
                    <h2>PROTEA</h2>
               	 			<h3 class="animated3"> <b>Conexiones</b> para aprender </h3>
               	 			<!--<div class="line"></div>-->
               	 			<p class="animated2">Reservación de recursos</p>
               	 		</div>
           	 		</div>
           	 	</div>
           	 	<div class="item">
                    <div class="overlay-slide">
                        <?php echo $this->Html->image('protea/facultad1.jpg', ['alt' => ''], ['class' => 'img-responsive']); ?>
           	 		</div>
           	 		<div class="carousel-caption">
               	 		<div class="col-md-12 col-xs-12 text-center">
                    <h2>PROTEA</h2>
               	 			<h3 class="animated3"> <b>Conexiones</b> para aprender </h3>
               	 			<!-- <div class="line"></div> -->
               	 			<p class="animated2">Universidad de Costa Rica</p>
               	 		</div>
           	 		</div>
           	 	</div>

           	 </div> 	 <!-- End Carousel Inner -->

            <!-- Controls -->
            <div class="slides-control ">
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                	<span><i class="fa fa-angle-left"></i></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                	<span><i class="fa fa-angle-right"></i></span>
                </a>
            </div>
        </div>
  	</section>
    <!--/ Slider end -->

<hr>


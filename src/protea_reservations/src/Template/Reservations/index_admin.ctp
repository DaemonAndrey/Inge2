<!-- src/Template/Reservations/indexAdmin.ctp -->

<br>

<!-- TÍTULO -->
<div class="row">
    <div class="col-xs-12">
        <div class="text-center">
            <h1>Administrar reservaciones</h1>
            <br>
        </div>
    </div>
</div>
<!-- FIN TÍTULO -->

<!-- PAGINADOR -->
<div class="row text-center">
  <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
      <div class="center_pagination" >
          <ul class="pagination">
                <li><?php echo $this->Paginator->numbers(array('separator' => '')); ?></li>
          </ul>
      </div>
   </div>
</div> <!-- FIN PAGINADOR -->
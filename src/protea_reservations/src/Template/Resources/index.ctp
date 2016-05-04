<!-- src/Template/Users/registrar.ctp -->
<?php echo $this->Html->css('registro.css'); ?>
<br>
<!-- MENSAJES -->
    <div class="lead text-info" style="text-align:center">
        <?= $this->Flash->render('addResourceSuccess') ?>
        <?= $this->Flash->render('addResourceError') ?>
        <br>
    </div>
<legend><br><center>INDEX RECURSOS</center><br></legend>
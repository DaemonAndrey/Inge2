<?php echo $this->Html->css('registro.css'); ?>
<?php echo $this->Html->css('resources.css') ?>

<!-- MENSAJES -->
<div class="lead text-info" style="text-align:center">
    <?= $this->Flash->render('associateResourceAdminSuccess') ?>
    <?= $this->Flash->render('disassociateResourceAdminSuccess') ?>
</div>

<div class="lead text-danger" style="text-align:center">
    <?= $this->Flash->render('associateResourceAdminError') ?>
    <?= $this->Flash->render('disassociateResourceAdminError') ?>
</div>
<!-- FIN DE MENSAJES -->

<div class="users form">
    
    <!-- TÍTULO -->
    <div class="row" style="color:#000;">
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            <legend>
                <div class='text-center'>
                    <h2>Asociar Administradores</h2>
                    <br>
                </div>
            </legend>
        </div>
    </div>
    <!-- FIN DE TÍTULO -->

    <?= $this->Form->create($resourcesUser) ?>
    
    <!-- CAMPOS A LLENAR -->
    <fieldset>
        <!-- NO ASOCIADOS -->
        <div class="row">
            <div class='col-lg-5 col-lg-offset-3 col-md-5 col-md-offset-3 col-sm-7 col-sm-offset-2 col-xs-8'>
                <?=
                    $this->Form->input('ResourcesUsers.user_id', ['label' => 'Administradores: ',
                                                                   'options' => $no_admins_options,
                                                                   'class' => 'form-control']);
                ?>
                <br>
            </div>
            
            <!-- BOTONES -->
            <div id="btnRegistrar" style="margin-top:25px;">
                <div class='col-lg-4 col-md-4 col-sm-3 col-xs-4'>
                    <?= $this->Form->button('Asociar', ['class' => 'btn btn-success']); ?>
                </div>
            </div>
            <!-- FIN DE BOTONES -->
            
        </div>
    </fieldset>
    <!-- FIN DE CAMPOS A LLENAR -->
    
     <?= $this->Form->end() ?>
    
    <br><br>
    
    <!-- TÍTULO -->
    <div class="row">
        <div class='col-xs-12 text-center'>
            <?=
                $this->Form->label('ResourcesUsers.user_id', 'Administradores asociados');
            ?>
            <br>
            <br>
        </div>
    </div>
    <!-- FIN DE TÍTULO -->

    <!-- TABLA -->
    <div class="table-responsive">
        <table class="table table-striped table-hover table-sm">
            <!-- ENCABEZADO TABLA -->
            <tr>
                <th>
                    Correo
                </th>
                <th>
                    Nombre
                </th> 
                <th>
                    Apellidos
                </th> 
                <th>
                    Desasociar
                </th>
            </tr>
            <!-- FIN DE ENCABEZADO TABLA -->

            <?php 
            // Recorre todos los recursos y los muestra en la tabla.
            foreach ( $admins_assoc as $admin ): ?>
                <tr>
                    <!-- CORREO -->
                    <td>
                        <?php
                            echo $admin['username'];
                        ?>
                    </td>

                    <!-- NOMBRE -->
                    <td>
                        <?php
                            echo $admin['first_name'];
                        ?>
                    </td>

                    <!-- APELLIDOS -->
                    <td>
                        <?php
                            echo $admin['last_name'];
                        ?>
                    </td>

                    <!-- ELIMINAR -->
                    <td>
                        <?php
                            echo $this->Form->postLink($this->Html->tag('span',null,array('class' => 'glyphicon glyphicon-remove')),
                                                       array('controller' => 'resources','action' => 'disassociate', $admin->id, $r_id),
                                                       array('escape' => false));
                        ?>
                    </td>
                </tr>
            <?php
            endforeach;
            unset($admin);
            ?>
        </table>
    </div>
    <!-- FIN DE TABLA -->

    <!-- BOTONES -->
    <div class='row text-center' id="btnRegistrar">
        <div class='col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1'>
            <br>
            <?= $this->Html->link('Regresar', array('controller' => 'resources','action'=> 'edit', $r_id), array( 'class' => 'btn btn-primary')) ?>
        </div>
    </div>
    <!-- FIN DE BOTONES -->

    <legend>
        <br>
    </legend>
</div>
<!-- src/Template/Resources/edit.ctp -->
<?php echo $this->Html->css('registro.css'); ?>

<div class="users form">
    <div style="text-align:center">
        <?= $this->Flash->render('addUserSuccess') ?>   
        <?= $this->Flash->render('addUserError') ?>   
        <br>
    </div>
    
    <?= $this->Form->create($user) ?>

    <!-- TÍTULO -->
    <div class="row">
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            <legend>
                <div class='text-center'>
                    <h1>Editar Usuario</h1>
                    <br>
                </div>
            </legend>
        </div>
    </div> <!-- FIN TÍTULO -->

   
    <!-- CAMPOS A LLENAR -->
    <fieldset>

        <!-- NOMBRE DE USUARIO / CORREO -->
        <div class="row">
            <div class='col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1'>
                <?=
                    $this->Form->input('Users.username', ['label' => 'Correo: ',
                                                          'class' => 'form-control',
                                                          'readonly' => 'readonly']);
                ?>
                <br>
            </div>
        </div>

        <!-- NOMBRE -->
        <div class='row'>
            <div class='col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1'>
                
                <?php
                // SI EL USUARIO NO ESTA ACEPTADO
                if($user['state'] == false)
                {
                ?>
                    <?=
                        $this->Form->input('Users.first_name', ['label' => 'Nombre: ',
                                                                'class' => 'form-control',
                                                                'readonly' => 'readonly']);
                    ?>
                <?php    
                } 
                // SI EL USUARIO ESTA ACEPTADO
                else
                {
                ?> 
                    <?=
                        $this->Form->input('Users.first_name', ['label' => 'Nombre: ',
                                                                'class' => 'form-control']);
                    ?>
                <?php     
                }
                ?> 
               
                <br>
            </div>
        </div>

        <!-- APELLIDO -->
        <div class='row'>
            <div class='col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1'>
                <?php
                // SI EL USUARIO NO ESTA ACEPTADO
                if($user['state'] == false)
                {
                ?>
                    <?=
                        $this->Form->input('Users.last_name', ['label' => 'Apellido: ',
                                                               'class' => 'form-control',
                                                               'readonly' => 'readonly']);
                    ?>
                <?php    
                } 
                // SI EL USUARIO ESTA ACEPTADO
                else
                {
                ?> 
                    <?=
                        $this->Form->input('Users.last_name', ['label' => 'Apellido: ',
                                                               'class' => 'form-control']);
                    ?>
                <?php     
                }
                ?> 
                <br>
            </div>
        </div>

        <!-- TELÉFONO -->
        <div class='row'>
            <div class='col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1'>
                <?php
                // SI EL USUARIO NO ESTA ACEPTADO
                if($user['state'] == false)
                {
                ?>
                    <?=
                        $this->Form->input('Users.telephone_number', ['label' => 'Teléfono: ',
                                                                      'class' => 'form-control',
                                                                      'readonly' => 'readonly']);
                    ?>
                <?php    
                } 
                // SI EL USUARIO ESTA ACEPTADO
                else
                {
                ?> 
                    <?=
                        $this->Form->input('Users.telephone_number', ['label' => 'Teléfono: ',
                                                                      'class' => 'form-control']);
                    ?>
                <?php     
                }
                ?>     
                <br>
            </div>
        </div>
        
        <!-- DEPARTAMENTO -->
        <div class='row'>
            <div class='col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1'>
                 <?php
                // SI EL USUARIO NO ESTA ACEPTADO
                if($user['state'] == false)
                {
                ?>
                    <?=
                        $this->Form->input('Users.department', ['label' => 'Unidad Académica: ',
                                                                'class' => 'form-control',
                                                                'readonly' => 'readonly']);
                    ?>
                <?php    
                } 
                // SI EL USUARIO ESTA ACEPTADO
                else
                {
                ?> 
                    <?=
                        $this->Form->input('Users.department', ['label' => 'Unidad Académica: ',
                                                                'options' => array(
                                                                    'Escuela Administración Educativa'  => 'Escuela Administración Educativa',
                                                                    'Escuela Bibliotecología y Ciencias de la Información'  => 'Escuela Bibliotecología y Ciencias de la Información',
                                                                    'Escuela Educación Física y Deportes'   => 'Escuela Educación Física y Deportes',
                                                                    'Escuela de Formación Docente'  => 'Escuela de Formación Docente',
                                                                    
                                                                    'Escuela de Orientación y Educación Especial'   => 'Escuela de Orientación y Educación Especial',
                                                                    'Instituto de Investigación en Educación INIE' => 'Instituto de Investigación en Educación INIE',
                                                                    'Biblioteca'    => 'Biblioteca',
                                                                    
                                                                    'Decanato' => 'Decanato'),
                                                                'class' => 'form-control']);
                    ?>
                <?php     
                }
                ?>     
                <br>
            </div>
        </div>
        <!-- DEPARTAMENTO -->
        <div class='row'>
            <div class='col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1'>
                <?php
                // SI EL USUARIO NO ESTA ACEPTADO
                if($user['state'] == false)
                {
                ?>
                    <?=
                        $this->Form->input('Users.position', ['label' => 'Puesto: ',
                                                              'class' => 'form-control',
                                                              'readonly' => 'readonly']);
                    ?>
                <?php    
                } 
                // SI EL USUARIO ESTA ACEPTADO
                else
                {
                ?> 
                    <?=
                        $this->Form->input('Users.position', ['label' => 'Puesto: ',
                                                              'options' => array(
                                                                'Administrativo'  => 'Administrativo',
                                                                'Docente'         => 'Docente'
                                                               ),
                                                               'class' => 'form-control']);
                    ?>
                <?php     
                }
                ?>     
                <br>
            </div>
        </div>
        
        
      
        
    </fieldset> <!-- FIN CAMPOS A LLENAR -->

    <!-- BOTONES -->
    <div class='row  text-center' id="btnEdit">
        <div class='col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1'>
            <br>
             <?php
                // SI EL USUARIO NO ESTA ACEPTADO
                if($user['state'] == false)
                {
                
                    echo $this->Form->postLink($this->Html->tag('span',null,array('type'  => 'hidden')),
                                                array('controller' => 'users','action' => 'reject', $user->id),
                                                array('escape' => false));

                    echo $this->Form->postLink($this->Html->tag('span','Aceptar',array('class'  => 'btn btn-primary')),
                                                array('controller' => 'users','action' => 'confirm', $user->id),
                                                array('escape' => false));

                    echo $this->Form->postLink($this->Html->tag('span','Rechazar',array('class' => 'btn btn-danger')),
                                                array('controller' => 'users','action' => 'reject', $user->id),
                                                array('escape' => false));
                    ?>
                   
                <?php    
                } 
                // SI EL USUARIO ESTA ACEPTADO
                else
                {
                ?> 
                     <?= $this->Form->button('Actualizar', ['class' => 'btn btn-success']); ?>
                     <?= $this->Html->link('Regresar', array('controller' => 'users','action'=> 'index'), array( 'class' => 'btn btn-danger')) ?>
                    
                <?php     
                }
                ?>     
        </div>
    </div> <!-- FIN BOTONES -->

    <legend>
        <br>
    </legend>

    <?= $this->Form->end() ?>
</div>
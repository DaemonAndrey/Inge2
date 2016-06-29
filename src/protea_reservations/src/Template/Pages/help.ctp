<?php echo $this->Html->css('help.css'); ?>

<!-- INFORMACION -->
<div class="ayuda">
    
    <!-- TITULO ===================================================================== -->
    <div class='row' id="titulo">
        <div class='col-xs-12 text-center'>
            <legend>
                <br>
                <?php
                // SI SOY ADMINISTRADOR
                if($this->request->session()->read('Auth.User.role_id') == 2 ||
                   $this->request->session()->read('Auth.User.role_id') == 3)
                {
                    ?>
                    <h2>Manual de Ayuda para Administradores</h2>
                    <?php
                }
                // SI SOY USUARIO REGULAR
                else if($this->request->session()->read('Auth.User.role_id') == 1)
                {
                    ?>
                    <h2>Manual de Ayuda para Usuarios</h2>
                    <?php
                }
                ?>
            </legend>
        </div>
    </div>
    <!-- FIN TITULO ================================================================= -->
    
    
    <!-- INTRODUCCION =============================================================== -->
    <!--
    <div class='row' id="introduccion">
        <div class='col-xs-8 col-xs-offset-2'>
            <div style="text-align:justify;color:black;">
                <br>
                <p>
                <?php
                // SI SOY ADMINISTRADOR
                if($this->request->session()->read('Auth.User.role_id') == 2 ||
                   $this->request->session()->read('Auth.User.role_id') == 3)
                {
                    ?>
                    
                    Administradorum Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras varius massa augue, nec consectetur                           dui condimentum efficitur. Praesent sodales urna libero, elementum tincidunt ligula tristique sit amet. Quisque                             bibendum non turpis in euismod. Suspendisse aliquam vel orci sit amet porta. Mauris at sagittis arcu. Donec cursus                          urna in erat pulvinar ullamcorper. Suspendisse sollicitudin rhoncus cursus. Aenean at turpis maximus, scelerisque                           nibh id, efficitur odio. Nam tincidunt metus eu mi eleifend rutrum. Nam finibus varius molestie. Interdum et                                malesuada fames ac ante ipsum primis in faucibus. Donec eget dignissim ipsum, at egestas mi. Nulla facilisi.                                Nunc quis lobortis tellus. Sed volutpat sollicitudin tortor, et iaculis nulla sagittis id.
                        
                    <?php
                }
                // SI SOY USUARIO REGULAR
                else if($this->request->session()->read('Auth.User.role_id') == 1)
                {
                    ?>
                    
                    Usuarius regularix Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras varius massa augue, nec consectetur                        dui condimentum efficitur. Praesent sodales urna libero, elementum tincidunt ligula tristique sit amet. Quisque                             bibendum non turpis in euismod. Suspendisse aliquam vel orci sit amet porta. Mauris at sagittis arcu. Donec cursus                          urna in erat pulvinar ullamcorper. Suspendisse sollicitudin rhoncus cursus. Aenean at turpis maximus, scelerisque                           nibh id, efficitur odio. Nam tincidunt metus eu mi eleifend rutrum. Nam finibus varius molestie. Interdum et                                malesuada fames ac ante ipsum primis in faucibus. Donec eget dignissim ipsum, at egestas mi. Nulla facilisi. Nunc                           quis lobortis tellus. Sed volutpat sollicitudin tortor, et iaculis nulla sagittis id. Nulla non quam nisl.
                        
                    <?php
                }
                ?>
                </p>
            </div>
        </div>
    </div>
    -->
    <!-- FIN DE INTRODUCCION ======================================================== -->
    
    
    <!-- TITULO FUNCIONES =========================================================== -->
    <?php
    if($this->request->session()->read('Auth.User.role_id') == 1 ||
       $this->request->session()->read('Auth.User.role_id') == 2 ||
       $this->request->session()->read('Auth.User.role_id') == 3)
    {
        ?>
        <!--
        <div class='row'>
                <div class='col-xs-8 col-xs-offset-2' style="color:black;">
                    <p>
                        <h4><b>Funciones:</b></h4>
                    </p>
                    <br>
                </div>
            </div>
        </div>
        -->
        <?php
    }
    ?>
    <!-- FIN TITULO FUNCIONES ======================================================= -->

    
    <!-- MANUAL ===================================================================== -->
    <div class='row'>
        <div class='col-xs-12' style="color:black; text-align:center;">            
            <?php
            // SI SOY ADMINISTRADOR
            if($this->request->session()->read('Auth.User.role_id') == 2 ||
               $this->request->session()->read('Auth.User.role_id') == 3)
            {
                ?>
                <!-- ================================================================ -->
                <div class='col-xs-8 col-xs-offset-2'>
                    <h4><u>Calendario de Reservaciones</u></h4>
                </div>
                <!-- ================================================================ -->
                <div class='col-xs-8 col-xs-offset-2'>
                    <button data-toggle="collapse" class="btn btn-info" data-target="#adminCalendario">
                        Revisar el calendario para ver eventos
                    </button>
                    <div id="adminCalendario" class="collapse">
                        <p>
                            <br>
                            Revisar el calendario de eventos permite dar a conocer las fechas y horas en las que hay salas reservadas y los eventos para los cuales están reservadas.
                        </p>
                        <ol>
                            <li>
                                <p>
                                    En la barra de navegación hacer click en <strong>Ver Calendario</strong>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Aparecerá un calendario con las salas que tienen asignado un evento, ya sea un curso, una conferencia, etc... El número que aparece antes del nombre es la hora para la que está reservado el evento.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Cambiar la visualización del calendario haciendo click sobre <strong>Mes</strong>, <strong>Semana</strong>, o <strong>Día</strong>, para ver con mejor detalle la duración de los eventos. 
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en las flechas <strong>◄</strong> (anterior)  o <strong>►</strong> (siguiente) para cambiar la vista del calendario al Mes, Semana, Día anterior o siguiente, respectivamente. 
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en el botón <strong>Hoy</strong> para regresear inmediatamente al día actual, ya sea en la vista de Mes, Semana o Día. 
                                </p>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class='col-xs-8 col-xs-offset-2'>
                    <br>
                </div>
                <!-- ================================================================ -->
                <div class='col-xs-8 col-xs-offset-2'>
                    <button data-toggle="collapse" class="btn btn-info" data-target="#adminReservacion">
                        Hacer reservaciones de salas o equipo
                    </button>
                    <div id="adminReservacion" class="collapse">
                        <p>
                            <br>
                            Reservar salas o equipo audiovisual durante un tiempo determinado por si necesita hacer uso de estos recursos, o para usuarios en caso de que no puedan hacerlo ellos mismos.
                        </p>
                        <ol>
                            <li>
                                <p>
                                    En la barra de navegación hacer click en <strong>Ver Calendario</strong>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en la <strong>casilla del calendario</strong> del día en que desea hacer uso del recurso.
                                    Aparecerá una ventana emergente con la información de la reservación.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Establecer la duración de uso del recurso, seleccionando la <strong>Hora de Inicio</strong> y la <strong>Hora de Fin</strong>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Seleccionar un <strong>Tipo de Recurso</strong> y a su vez el <strong>Recurso</strong> que desea reservar.
                                    Si no puede seleccionar un recurso, es porque ya está reservado a esa hora, por lo que debe seleccionar otra Hora de Incio.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Escribir el <strong>Nombre del Evento</strong> (curso, conferencia, etc...) en el que se va a utilizar el recurso.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en <strong>Información Detallada</strong> para ver las especificaciones del recurso. En caso de necesitar algo adicional a lo especificado en la descripción, escribirlo en el campo de <strong>comentarios</strong>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Si está de acuerdo con los términos y condiciones de uso, chequear la casilla.
                                    En caso de desconocerlos, hacer click en <strong>Términos y Condiciones de Uso</strong> para ser redirijido a una página donde los puede consultar.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Finalmente, hacer click en <strong>Reservar</strong>. En caso de haber reservado una <strong>Sala</strong> correctamente, aparecerá su reservación en el calendario.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Tome en cuenta que si está haciendo la reservación para un usuario que no pudo hacerla por su cuenta, al final quedará a nombre del administrador que realmente la hizo y será él quien se haga responsable en caso de algún inconveniente con el recurso.
                                </p>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class='col-xs-8 col-xs-offset-2'>
                    <br>
                </div>            
                <!-- ================================================================ -->
                <div class='col-xs-8 col-xs-offset-2'>
                    <p>
                        <h4><u>Administrar reservaciones pendientes</u></h4>
                    </p>
                </div>
                <!-- ================================================================ -->
                <div class='col-xs-8 col-xs-offset-2'>
                    <button data-toggle="collapse" class="btn btn-info" data-target="#adminReservacionesPendientes">
                        Aprobar/Rechazar reservaciones pendientes
                    </button>
                    <div id="adminReservacionesPendientes" class="collapse">
                        <p>
                            <br>
                            Aprobar o rechazar reservaciones pendientes para discriminar si el usuario puede o no hacer uso del recurso solicitado.
                        </p>
                        <ol>
                            <li>
                                <p>
                                    En la barra de navegación posicionarse sobre <strong>Administrar</strong>.
                                    Se desplegará una lista de funciones.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en <strong>Reservaciones Pendientes</strong>.
                                    Aparecerá un índice con la información básica de las reservaciones pendientes de confirmación.
                                </p>
                            </li>
                            <li>
                                <p>
                                    En la columna <strong>Revisar</strong>, hacer click en el <strong><i class="glyphicon glyphicon-check"></i></strong> de la reservación que desee revisar.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Aparecerá la información más detallada de la reservación.
                                    En caso de rechazarla, puede escribir un <strong>comentario</strong> que podrá leer el usuario que hizo esa reservación, explicando por qué su reservación fue rechazada.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Si desea aprobar la reservación, hacer click en <strong>Aprobar</strong>.
                                    Se enviará un correo electrónico al usuario, indicándole que su reservación fue aprobada.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Si desea rechazar la reservación, hacer click en <strong>Rechazar</strong>.
                                    Se enviará un correo electrónico al usuario, indicándole que su reservación fue rechazada.
                                    Además, el recurso reservado se habilita de nuevo para que pueda ser reservado por otro usuario.
                                </p>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class='col-xs-8 col-xs-offset-2'>
                    <br>
                </div>
                <!-- ================================================================ -->
                <div class='col-xs-8 col-xs-offset-2'>
                    <button data-toggle="collapse" class="btn btn-info" data-target="#adminCancelar">
                        Cancelar reservaciones pendientes
                    </button>
                    <div id="adminCancelar" class="collapse">
                        <p>
                            <br>
                            Eliminar reservaciones en caso de que se haya pasado la fecha y no pudieron ser Aprobadas ni Rechazadas.
                        </p>
                        <ol>
                            <li>
                                <p>
                                    En la barra de navegación posicionarse sobre <strong>Administrar</strong>.
                                    Se desplegará una lista de funciones.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en <strong>Reservaciones Pendientes</strong>.
                                    Aparecerá un índice con la información básica de las reservaciones pendientes de confirmación.
                                </p>
                            </li>
                            <li>
                                <p>
                                    En la columna <strong>Cancelar</strong>, hacer click en el <strong><i class="glyphicon glyphicon-remove"></i></strong> de la reservación que desee eliminar.
                                </p>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class='col-xs-8 col-xs-offset-2'>
                    <br>
                </div>
                <!-- ================================================================ -->
                <div class='col-xs-8 col-xs-offset-2'>
                    <h4><u>Historial de reservaciones</u></h4>
                </div>
                <!-- ================================================================ -->
                <div class='col-xs-8 col-xs-offset-2'>
                    <button data-toggle="collapse" class="btn btn-info" data-target="#adminHistorial">
                        Generar reportes de reservaciones
                    </button>
                    <div id="adminHistorial" class="collapse">
                        <p style="color: red;">
                            <br>
                            Generar documentos en formato PDF para hacer análisis sobre las reservaciones, o para presentarle a los encargados de limpieza un reporte de las fechas y horas en que hay salas reservadas.
                        </p>
                        <ol>
                            <li>
                                <p>
                                    Paso
                                </p>
                            </li>
                            <li>
                                <p>
                                    Paso
                                </p>
                            </li>
                            <li>
                                <p>
                                    Paso
                                </p>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class='col-xs-8 col-xs-offset-2'>
                    <br>
                </div>
                <!-- ================================================================ -->
                <div class='col-xs-8 col-xs-offset-2'>
                    <h4><u>Administrar tipos de recursos</u></h4>
                </div>
                <!-- ================================================================ -->
                <div class='col-xs-8 col-xs-offset-2'>
                    <button data-toggle="collapse" class="btn btn-info" data-target="#adminAgregarTipo">
                        Agregar nuevos tipos de recursos
                    </button>
                    <div id="adminAgregarTipo" class="collapse">
                        <p>
                            <br>
                            Agregar un nuevo tipo de recurso, para luego poder agregar recursos bajo esa categoría.
                        </p>
                        <ol>
                            <li>
                                <p>
                                    En la barra de navegación posicionarse sobre <strong>Administrar</strong>.
                                    Se desplegará una lista de funciones.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en <strong>Tipos de Recurso</strong>.
                                    Aparecerá un índice con la información de los tipos de recurso existentes y que debajo de ellos hay recursos que usted administra.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en <strong><span class="glyphicon glyphicon-plus"></span>Agregar Tipo de Recurso</strong>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Llenar los campos del formulario. El campo de <strong>días de anticipación</strong> se refiere a que todos los recursos bajo ese nuevo tipo de recurso solamente pueden ser reservados esa cantidad de días antes de la fecha deseada. Por ejemplo: si se establece con 1 día de anticipación, los recursos bajo ese tipo no podrán ser reservados el mismo día, sino 1 día antes.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en <strong>Agregar</strong>. Si sale el error de que el tipo de recurso ya existe, entonces solamente debe ir a <strong>Agregar un Recurso Nuevo</strong> bajo ese tipo.
                                </p>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class='col-xs-8 col-xs-offset-2'>
                    <br>
                </div>
                <!-- ================================================================ -->
                <div class='col-xs-8 col-xs-offset-2'>
                    <button data-toggle="collapse" class="btn btn-info" data-target="#adminActualizarTipo">
                        Actualizar la información de tipos de recursos
                    </button>
                    <div id="adminActualizarTipo" class="collapse">
                        <p>
                            <br>
                            Modificar la información de tipos de recursos que administra en caso de que estos requieran ser actualizados.
                        </p>
                        <ol>
                            <li>
                                <p>
                                    En la barra de navegación posicionarse sobre <strong>Administrar</strong>.
                                    Se desplegará una lista de funciones.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en <strong>Tipos de Recurso</strong>.
                                    Aparecerá un índice con la información de los tipos de recurso existentes y que debajo de ellos hay recursos que usted administra.
                                </p>
                            </li>
                            <li>
                                <p>
                                    En la columna <strong>Actualizar</strong>, hacer click en el <strong><i class="glyphicon glyphicon-pencil"></i></strong> del tipo de recurso que desee actualizar.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Cambiar los campos del formulario que desea actualizar.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en <strong>Actualizar</strong>.
                                </p>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class='col-xs-8 col-xs-offset-2'>
                    <br>
                </div>
                <!-- ================================================================ -->
                <div class='col-xs-8 col-xs-offset-2'>
                    <button data-toggle="collapse" class="btn btn-info" data-target="#adminEliminarTipo">
                        Eliminar tipos de recursos
                    </button>
                    <div id="adminEliminarTipo" class="collapse">
                        <p>
                            <br>
                            Eliminar tipos de recurso que administra en caso de que no desee administrarlos más.
                        </p>
                        <ol>
                            <li>
                                <p>
                                    En la barra de navegación posicionarse sobre <strong>Administrar</strong>.
                                    Se desplegará una lista de funciones.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en <strong>Tipos de Recurso</strong>.
                                    Aparecerá un índice con la información de los tipos de recurso existentes y que debajo de ellos hay recursos que usted administra.
                                </p>
                            </li>
                            <li>
                                <p>
                                    En la columna <strong>Eliminar</strong>, hacer click en el <strong><i class="glyphicon glyphicon-trash"></i></strong> del tipo de recurso que desee eliminar. Aparecerá una ventana emergente confirmando su acción.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en <strong>Aceptar</strong>. Si existieran recursos bajo ese tipo de recurso, también serán eliminados. Además, si existieran más administradores asociados a recursos de ese tipo, el tipo de recurso no se eliminará completamente, únicamente de su índice; de lo contrario, el tipo de recurso sí se eliminará por completo.
                                </p>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class='col-xs-8 col-xs-offset-2'>
                    <br>
                </div>
                <!-- ================================================================ -->
                <div class='col-xs-8 col-xs-offset-2'>
                    <h4><u>Administrar recursos</u></h4>
                </div>
                <!-- ================================================================ -->
                <div class='col-xs-8 col-xs-offset-2'>
                    <button data-toggle="collapse" class="btn btn-info" data-target="#adminAgregarRecurso">
                        Agregar nuevos recursos
                    </button>
                    <div id="adminAgregarRecurso" class="collapse">
                        <p>
                            <br>
                            Agregar nuevos recursos para que los usuarios puedan reservarlos.
                        </p>
                        <ol>
                            <li>
                                <p>
                                    En la barra de navegación posicionarse sobre <strong>Administrar</strong>.
                                    Se desplegará una lista de funciones.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en <strong>Recursos</strong>.
                                    Aparecerá un índice con la información básica de los recursos existentes que usted administra.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en <strong><span class="glyphicon glyphicon-plus"></span>Agregar Recurso</strong>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Llenar los campos del formulario. Si no existiera el <strong>Tipo de Recurso</strong> requerido, debe ir primero a <strong>Agregar Tipo de Recurso</strong>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en <strong>Agregar</strong>. El nuevo recurso se asociará por defecto a su cuenta de administrador; es decir, inicialmente usted administrará ese recurso.
                                </p>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class='col-xs-8 col-xs-offset-2'>
                    <br>
                </div>
                <!-- ================================================================ -->
                <div class='col-xs-8 col-xs-offset-2'>
                    <button data-toggle="collapse" class="btn btn-info" data-target="#adminVerRecurso">
                        Ver la información de recursos
                    </button>
                    <div id="adminVerRecurso" class="collapse">
                        <p>
                            <br>
                            Consultar la información detallada de los recursos que administra.
                        </p>
                        <ol>
                            <li>
                                <p>
                                    En la barra de navegación posicionarse sobre <strong>Administrar</strong>.
                                    Se desplegará una lista de funciones.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en <strong>Recursos</strong>.
                                    Aparecerá un índice con la información básica de los recursos existentes que usted administra.
                                </p>
                            </li>
                            <li>
                                <p>
                                    En la columna <strong>Marca/Modelo</strong> o <strong>Placa/Serie</strong>, hacer click en el modelo o la placa del recurso que desee consultar. Aparecerá la información más detallada de ese recurso.
                                </p>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class='col-xs-8 col-xs-offset-2'>
                    <br>
                </div>
                <!-- ================================================================ -->
                <div class='col-xs-8 col-xs-offset-2'>
                    <button data-toggle="collapse" class="btn btn-info" data-target="#adminActualizarRecurso">
                        Actualizar la información de recursos
                    </button>
                    <div id="adminActualizarRecurso" class="collapse">
                        <p>
                            <br>
                            Modificar la información de recursos que administra en caso de que estos requieran ser actualizados.
                        </p>
                        <ol>
                            <li>
                                <p>
                                    En la barra de navegación posicionarse sobre <strong>Administrar</strong>.
                                    Se desplegará una lista de funciones.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en <strong>Recursos</strong>.
                                    Aparecerá un índice con la información básica de los recursos existentes que usted administra.
                                </p>
                            </li>
                            <li>
                                <p>
                                    En la columna <strong>Actualizar</strong>, hacer click en el <strong><i class="glyphicon glyphicon-pencil"></i></strong> del recurso que desee actualizar.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Cambiar los campos del formulario que desea actualizar. Si no existiera el <strong>Tipo de Recurso</strong> requerido, debe ir primero a <strong>Agregar Tipo de Recurso</strong>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en <strong>Actualizar</strong>.
                                </p>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class='col-xs-8 col-xs-offset-2'>
                    <br>
                </div>
                <!-- ================================================================ -->
                <div class='col-xs-8 col-xs-offset-2'>
                    <button data-toggle="collapse" class="btn btn-info" data-target="#adminEliminarRecurso">
                        Eliminar recursos
                    </button>
                    <div id="adminEliminarRecurso" class="collapse">
                        <p>
                            <br>
                            Eliminar recursos que administra en caso de que no desee administrarlos más.
                        </p>
                        <ol>
                            <li>
                                <p>
                                    En la barra de navegación posicionarse sobre <strong>Administrar</strong>.
                                    Se desplegará una lista de funciones.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en <strong>Recursos</strong>.
                                    Aparecerá un índice con la información básica de los recursos existentes que usted administra.
                                </p>
                            </li>
                            <li>
                                <p>
                                    En la columna <strong>Eliminar</strong>, hacer click en el <strong><i class="glyphicon glyphicon-trash"></i></strong> del recurso que desee eliminar. Aparecerá una ventana emergente confirmando su acción.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en <strong>Aceptar</strong>. Si eliminara todos los recursos de un mismo tipo, el tipo de recurso también se eliminará de su índice.
                                </p>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class='col-xs-8 col-xs-offset-2'>
                    <br>
                </div>
                <!-- ================================================================ -->
                <div class='col-xs-8 col-xs-offset-2'>
                    <button data-toggle="collapse" class="btn btn-info" data-target="#adminAsociarRecurso">
                        Asociar administradores con recursos
                    </button>
                    <div id="adminAsociarRecurso" class="collapse">
                        <p>
                            <br>
                            Asociar otros administradores a recursos para que ellos también puedan administrarlos.
                        </p>
                        <ol>
                            <li>
                                <p>
                                    En la barra de navegación posicionarse sobre <strong>Administrar</strong>.
                                    Se desplegará una lista de funciones.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en <strong>Recursos</strong>.
                                    Aparecerá un índice con la información básica de los recursos existentes que usted administra.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en <strong><i class="glyphicon glyphicon-plus"></i>Asociar Administradores</strong>.
                                    Aparecerá una lista de administradores no asociados al recurso y una tabla de administradores asociados al recurso.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Seleccione el <strong>administrador</strong> que se asociará al recurso. 
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en <strong>Asociar</strong>.
                                    El nuevo administrador aparecerá en la tabla de administradores asociados a ese recurso. Además, se le agregará ese recurso al índice de recursos. 
                                    Si el nuevo administrador no administraba recursos de ese tipo, también se le agregará ese tipo de recurso al índice de tipos de recurso.
                                </p>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class='col-xs-8 col-xs-offset-2'>
                    <br>
                </div>
                <!-- ================================================================ -->
                <div class='col-xs-8 col-xs-offset-2'>
                    <button data-toggle="collapse" class="btn btn-info" data-target="#adminDesasociarRecurso">
                        Desasociar administradores de recursos
                    </button>
                    <div id="adminDesasociarRecurso" class="collapse">
                        <p>
                            <br>
                            Desasociar administradores de recursos para que ya no puedan administrarlos.
                        </p>
                        <ol>
                            <li>
                                <p>
                                    En la barra de navegación posicionarse sobre <strong>Administrar</strong>.
                                    Se desplegará una lista de funciones.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en <strong>Recursos</strong>.
                                    Aparecerá un índice con la información básica de los recursos existentes que usted administra.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en <strong><i class="glyphicon glyphicon-plus"></i>Asociar Administradores</strong>.
                                    Aparecerá una lista de administradores no asociados al recurso y una tabla de administradores asociados al recurso.
                                </p>
                            </li>
                            <li>
                                <p>
                                    En la columna <strong>Desasociar</strong>, hacer click en el <strong><i class="glyphicon glyphicon-remove"></i></strong> del administrador que desee desasociar. Si solamente hay un administrador asociado al recurso, no se podrá desasociar.
                                </p>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class='col-xs-8 col-xs-offset-2'>
                    <br>
                </div>
                <!-- ================================================================ -->

                <?php
                // Si soy SuperAdministrador
                if($this->request->session()->read('Auth.User.role_id') == 3)
                {
                    ?>
                    <!-- ================================================================ -->
                    <div class='col-xs-8 col-xs-offset-2'>
                        <h4><u>Administrar cuentas de usuarios</u></h4>
                    </div>
                    <!-- ================================================================ -->
                    <div class='col-xs-8 col-xs-offset-2'>
                        <button data-toggle="collapse" class="btn btn-info" data-target="#adminAgregarUsuario">
                            Agregar nuevas cuentas de usuarios
                        </button>
                        <div id="adminAgregarUsuario" class="collapse">
                            <p>
                                <br>
                                Registrar usuarios en el sistema en caso de que no puedan hacerlo ellos mismos.
                            </p>
                            <ol>
                            <li>
                                <p>
                                    En la barra de navegación posicionarse sobre <strong>Administrar</strong>.
                                    Se desplegará una lista de funciones.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en <strong>Cuentas de Usuarios</strong>.
                                    Aparecerá un índice con la información básica de las cuentas de usuario existentes.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en <strong><i class="glyphicon glyphicon-plus"></i>Agregar usuario</strong>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Llenar los campos del formulario. Puede escoger el <strong>rol</strong> que tendrá el nuevo usuario en el sistema.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en <strong>Enviar Solicitud</strong>. Al ser un administrador el que hace el registro, este se aprueba inmediatamente.
                                </p>
                            </li>
                        </ol>
                        </div>
                    </div>
                    <div class='col-xs-8 col-xs-offset-2'>
                        <br>
                    </div>
                    <!-- ================================================================ -->
                    <div class='col-xs-8 col-xs-offset-2'>
                        <button data-toggle="collapse" class="btn btn-info" data-target="#adminVerUsuarios">
                            Ver la información de cuentas de usuarios
                        </button>
                        <div id="adminVerUsuarios" class="collapse">
                            <p>
                                <br>
                                Consultar la información detallada de las cuentas de usuario.
                            </p>
                            <ol>
                            <li>
                                <p>
                                    En la barra de navegación posicionarse sobre <strong>Administrar</strong>.
                                    Se desplegará una lista de funciones.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en <strong>Cuentas de Usuarios</strong>.
                                    Aparecerá un índice con la información básica de las cuentas de usuario existentes.
                                </p>
                            </li>
                            <li>
                                <p>
                                    En la columna <strong>E-mail</strong>, hacer click en el correo electrónico institucional del usuario que desee consultar. Aparecerá la información más detallada de ese usuario.
                                </p>
                            </li>
                        </ol>
                        </div>
                    </div>
                    <div class='col-xs-8 col-xs-offset-2'>
                        <br>
                    </div>
                    <!-- ================================================================ -->
                    <div class='col-xs-8 col-xs-offset-2'>
                        <button data-toggle="collapse" class="btn btn-info" data-target="#adminUsuariosPendientes">
                            Aprobar/Rechazar usuarios pendientes
                        </button>
                        <div id="adminUsuariosPendientes" class="collapse">
                            <p>
                                <br>
                                Aprobar o rechazar registros de usuarios pendientes para discriminar si el usuario puede o no hacer uso del sistema de reservación de recursos.
                            </p>
                            <ol>
                                <li>
                                    <p>
                                        En la barra de navegación posicionarse sobre <strong>Administrar</strong>.
                                        Se desplegará una lista de funciones.
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        Hacer click en <strong>Cuentas de Usuarios</strong>.
                                        Aparecerá un índice con la información básica de las cuentas de usuario existentes.
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        En la columna <strong>Actualizar</strong> de usuarios que estén <strong>Pendientes</strong>, hacer click en el <strong><i class="glyphicon glyphicon-pencil"></i></strong> de la cuenta que desee Aprobar o Rechazar.
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        Revisar la información de la cuenta de usuario para determinar si se Aprueba o se Rechaza.
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        Si desea aprobar el registro de usuario, hacer click en <strong>Aprobar</strong>.
                                        Se enviará un correo electrónico al usuario, indicándole que su registro fue aprobado.
                                        De aquí en adelante, el usuario podrá utilizar el sistema de reservación de recursos.
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        Si desea rechazar el registro de usuario, hacer click en <strong>Rechazar</strong>.
                                        Se enviará un correo electrónico al usuario, indicándole que su registro fue rechazado.
                                        El usuario no podrá acceder al sistema de reservación de recursos.
                                    </p>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <div class='col-xs-8 col-xs-offset-2'>
                        <br>
                    </div>
                    <!-- ================================================================ -->
                    <div class='col-xs-8 col-xs-offset-2'>
                        <button data-toggle="collapse" class="btn btn-info" data-target="#adminActualizarUsuarios">
                            Actualizar la información de cuentas de usuarios
                        </button>
                        <div id="adminActualizarUsuarios" class="collapse">
                            <p>
                                <br>
                                    Modificar la información de las cuentas de usuarios en caso de que estas requieran ser actualizadas y los usuarios no puedan hacerlo ellos mismos.
                            </p>
                            <ol>
                                <li>
                                    <p>
                                        En la barra de navegación posicionarse sobre <strong>Administrar</strong>.
                                        Se desplegará una lista de funciones.
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        Hacer click en <strong>Cuentas de Usuarios</strong>.
                                        Aparecerá un índice con la información básica de las cuentas de usuario existentes.
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        En la columna <strong>Actualizar</strong> de usuarios que estén <strong>Aceptados</strong>, hacer click en el <strong><i class="glyphicon glyphicon-pencil"></i></strong> de la cuenta que desee Actualizar.
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        Cambiar los campos del formulario que desea actualizar.
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        Hacer click en <strong>Actualizar</strong>.
                                    </p>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <div class='col-xs-8 col-xs-offset-2'>
                        <br>
                    </div>
                    <!-- ================================================================ -->
                    <div class='col-xs-8 col-xs-offset-2'>
                        <button data-toggle="collapse" class="btn btn-info" data-target="#adminEliminarUsuarios">
                            Eliminar cuentas de usuarios
                        </button>
                        <div id="adminEliminarUsuarios" class="collapse">
                            <p>
                                <br>
                                Eliminar cuentas de usuarios o administradores en caso de que estos estén haciendo un mal uso del sistema de reservación de recursos, o si se deseea hacer una limpieza de usuarios que ya no forman parte de la Universidad de Costa Rica.
                            </p>
                            <ol>
                            <li>
                                <p>
                                    En la barra de navegación posicionarse sobre <strong>Administrar</strong>.
                                    Se desplegará una lista de funciones.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en <strong>Cuentas de Usuarios</strong>.
                                    Aparecerá un índice con la información básica de las cuentas de usuario existentes.
                                </p>
                            </li>
                            <li>
                                <p>
                                    En la columna <strong>Eliminar</strong>, hacer click en el <strong><i class="glyphicon glyphicon-trash"></i></strong> de la cuenta de usuario que desee eliminar. Aparecerá una ventana emergente confirmando su acción.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en <strong>Aceptar</strong>. El usuario o administrador ya no podrá hacer uso del sistema de reservación de recursos.
                                </p>
                            </li>
                        </ol>
                        </div>
                    </div>
                    <div class='col-xs-8 col-xs-offset-2'>
                        <br>
                    </div>
                    <!-- ================================================================ -->
                    <div class='col-xs-8 col-xs-offset-2'>
                        <h4><u>Administrar configuraciones</u></h4>
                    </div>
                    <!-- ================================================================ -->
                    <div class='col-xs-8 col-xs-offset-2'>
                        <button data-toggle="collapse" class="btn btn-info" data-target="#adminConfiguracionMensajes">
                            Actualizar mensajes de Registro y Reservación
                        </button>
                        <div id="adminConfiguracionMensajes" class="collapse">
                            <p>
                                <br>
                                Modificar los mensajes que se envían por defecto por correo electrónico a los usuarios cuando se les aprueba o rechaza su registro o sus reservaciones.
                            </p>
                            <ol>
                                <li>
                                    <p>
                                        En la barra de navegación posicionarse sobre <strong>Administrar</strong>.
                                        Se desplegará una lista de funciones.
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        Hacer click en <strong>Configuraciones</strong>.
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        Cambiar los mensajes del formulario que desea actualizar.
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        Hacer click en <strong>Actualizar</strong>.
                                    </p>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <div class='col-xs-8 col-xs-offset-2'>
                        <br>
                    </div>
                    <!-- ================================================================ -->
                    <div class='col-xs-8 col-xs-offset-2'>
                        <button data-toggle="collapse" class="btn btn-info" data-target="#adminConfiguracionHorario">
                            Actualizar el Horario de las Reservaciones
                        </button>
                        <div id="adminConfiguracionHorario" class="collapse">
                            <p>
                                <br>
                                Modificar el horario en que los usuarios pueden tener recursos reservados en caso de que requiera ser actualizado.
                            </p>
                            <ol>
                                <li>
                                    <p>
                                        En la barra de navegación posicionarse sobre <strong>Administrar</strong>.
                                        Se desplegará una lista de funciones.
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        Hacer click en <strong>Configuraciones</strong>.
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        Al final del formulario, cambiar las horas que desea actualizar.
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        Hacer click en <strong>Actualizar</strong>.
                                    </p>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <div class='col-xs-8 col-xs-offset-2'>
                        <br>
                    </div>
                    <!-- ================================================================ -->
                    <div class='col-xs-8 col-xs-offset-2'>
                        <button data-toggle="collapse" class="btn btn-info" data-target="#adminConfiguracionLDAP">
                            Configuración de LDAP
                        </button>
                        <div id="adminConfiguracionLDAP" class="collapse">
                            <p>
                                <br>
                                Modificar las configuraciones de LDAP en el sistema en caso de que requieran ser actualizadas.
                            </p>
                            <p>
                                Descargar <strong><a href="../files/Manual_Configuracion_LDAP.pdf" download="Manual_Configuracion_LDAP.pdf">aquí</a></strong> el manual de configuración de LDAP.
                            </p>
                        </div>
                    </div>
                    <div class='col-xs-8 col-xs-offset-2'>
                        <br>
                    </div>
                    <!-- ================================================================ -->
                    <div class='col-xs-8 col-xs-offset-2'>
                        <h4><u>Cargado de datos</u></h4>
                    </div>
                    <!-- ================================================================ -->
                    <div class='col-xs-8 col-xs-offset-2'>
                        <button data-toggle="collapse" class="btn btn-info" data-target="#adminBulkInsert">
                            Cargado masivo de recursos
                        </button>
                        <div id="adminBulkInsert" class="collapse">
                            <p>
                                <br>
                                Cargar a la base de datos la información de muchos recursos a la vez, a través de una hoja de cálculo.
                            </p>
                            <p>
                                Descargar <strong><a href="../files/Manual_Cargado_Masivo_Recursos.pdf" download="Manual_Cargado_Masivo_Recursos.pdf">aquí</a></strong> el manual de cargado masivo de recursos.
                            </p>
                        </div>
                    </div>
                    <div class='col-xs-8 col-xs-offset-2'>
                        <br>
                    </div>
                    <!-- ================================================================ -->
                    <?php
                }
                ?>        
                <?php
            }
            // SI SOY USUARIO REGULAR
            else if($this->request->session()->read('Auth.User.role_id') == 1)
            {
                ?>
                <!-- ================================================================ -->
                <div class='col-xs-8 col-xs-offset-2'>
                    <button data-toggle="collapse" class="btn btn-info" data-target="#usuarioCalendario">
                        Revisar el calendario para ver eventos
                    </button>
                    <div id="usuarioCalendario" class="collapse">
                        <p>
                            <br>
                            Revisar el calendario de eventos permite dar a conocer las fechas y horas en las que hay salas reservadas y los eventos para los cuales están reservadas.
                        </p>
                        <ol>
                            <li>
                                <p>
                                    En la barra de navegación hacer click en <strong>Reservar</strong>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Aparecerá un calendario con las salas que tienen asignado un evento, ya sea un curso, una conferencia, etc... El número que aparece antes del nombre es la hora para la que está reservado el evento.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Cambiar la visualización del calendario haciendo click sobre <strong>Mes</strong>, <strong>Semana</strong>, o <strong>Día</strong>, para ver con mejor detalle la duración de los eventos. 
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en las flechas <strong>◄</strong> (anterior)  o <strong>►</strong> (siguiente) para cambiar la vista del calendario al Mes, Semana, Día anterior o siguiente, respectivamente. 
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en el botón <strong>Hoy</strong> para regresear inmediatamente al día actual, ya sea en la vista de Mes, Semana o Día. 
                                </p>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class='col-xs-8 col-xs-offset-2'>
                    <br>
                </div>
                <!-- ================================================================ -->
                <div class='col-xs-8 col-xs-offset-2'>
                    <button data-toggle="collapse" class="btn btn-info" data-target="#usuarioReservacion">
                        Hacer reservaciones de salas o equipo
                    </button>
                    <div id="usuarioReservacion" class="collapse">
                        <p>
                            <br>
                            Reservar salas o equipo audiovisual durante un tiempo determinado, para que una vez confirmada la reservación poder utilizarlo hasta la hora establecida.
                        </p>
                        <ol>
                            <li>
                                <p>
                                    En la barra de navegación hacer click en <strong>Reservar</strong>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en la <strong>casilla del calendario</strong> del día en que desea hacer uso del recurso.
                                    Aparecerá una ventana emergente con la información de la reservación.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Establecer la duración de uso del recurso, seleccionando la <strong>Hora de Inicio</strong> y la <strong>Hora de Fin</strong>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Seleccionar un <strong>Tipo de Recurso</strong> y a su vez el <strong>Recurso</strong> que desea reservar.
                                    Si no puede seleccionar un recurso, es porque ya está reservado a esa hora, por lo que debe seleccionar otra Hora de Incio.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Escribir el <strong>Nombre del Evento</strong> (curso, conferencia, etc...) en el que se va a utilizar el recurso.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en <strong>Información Detallada</strong> para ver las especificaciones del recurso. En caso de necesitar algo adicional a lo especificado en la descripción, escribirlo en el campo de <strong>comentarios</strong>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Si está de acuerdo con los términos y condiciones de uso, chequear la casilla.
                                    En caso de desconocerlos, hacer click en <strong>Términos y Condiciones de Uso</strong> para ser redirijido a una página donde los puede consultar.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Finalmente, hacer click en <strong>Reservar</strong>. En caso de haber reservado una <strong>Sala</strong> correctamente, aparecerá su reservación en el calendario.
                                </p>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class='col-xs-8 col-xs-offset-2'>
                    <br>
                </div>
                <!-- ================================================================ -->
                <div class='col-xs-8 col-xs-offset-2'>
                    <button data-toggle="collapse" class="btn btn-info" data-target="#usuarioActualizar">
                        Actualizar información de mi cuenta
                    </button>
                    <div id="usuarioActualizar" class="collapse">
                        <p>
                            <br>
                            Modificar la información de mi cuenta para tener los datos más actualizados.
                        </p>
                        <ol>
                            <li>
                                <p>
                                    En la barra de navegación posicionarse sobre <strong>usuario@ucr.ac.cr</strong>.
                                    Se desplegará una lista de funciones.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en <strong>Actualizar Mi Cuenta</strong>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Cambiar los campos del formulario que desea actualizar.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en <strong>Actualizar</strong>.
                                </p>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class='col-xs-8 col-xs-offset-2'>
                    <br>
                </div>
                <!-- ================================================================ -->
                <div class='col-xs-8 col-xs-offset-2'>
                    <button data-toggle="collapse" class="btn btn-info" data-target="#usuarioCancelar">
                        Cancelar mis reservaciones actuales
                    </button>
                    <div id="usuarioCancelar" class="collapse">
                        <p>
                            <br>
                            Cancelar una reservación pendiente o aceptada cuya fecha esté después o sea igual que la fecha actual, en caso de que ya no desee hacer uso del recurso.
                        </p>
                        <ol>
                            <li>
                                <p>
                                    En la barra de navegación posicionarse sobre <strong>usuario@ucr.ac.cr</strong>.
                                    Se desplegará una lista de funciones.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en <strong>Mis Reservaciones</strong>.
                                    Aparecerá un índice con la información básica de sus reservaciones, donde además se podrá ver si están <strong>Pendientes</strong> o <strong>Aceptadas</strong>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    En la columna <strong>Revisar</strong>, hacer click en el <strong><i class="glyphicon glyphicon-check"></i></strong> de la reservación que desee revisar.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Aparecerá la información más detallada de la reservación.
                                    Hacer click en <strong>Cancelar</strong>.
                                    Independientemente de si la reservación está Pendiente o Aceptada, se podrá cancelar siempre y cuando el tiempo de anticipación con que la esté cancelando esté dentro del tiempo establecido por los administradores.
                                </p>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class='col-xs-8 col-xs-offset-2'>
                    <br>
                </div>
                <!-- ================================================================ -->
                <div class='col-xs-8 col-xs-offset-2'>
                    <button data-toggle="collapse" class="btn btn-info" data-target="#usuarioHistorial">
                        Revisar el historial de mis reservaciones
                    </button>
                    <div id="usuarioHistorial" class="collapse">
                        <p>
                            <br>
                            Revisar el historial para ver la información detallada de todas mis reservaciones, tanto actuales como pasadas, para saber si fueron aprobadas, rechazadas o canceladas.
                        </p>
                        <ol>
                            <li>
                                <p>
                                    En la barra de navegación posicionarse sobre <strong>usuario@ucr.ac.cr</strong>.
                                    Se desplegará una lista de funciones.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en <strong>Historial de Reservaciones</strong>.
                                    Aparecerá un índice con la información básica de todas las reservaciones que ha hecho, donde además se podrá ver si están <strong>Aceptadas</strong>, <strong>Rechazadas</strong> o <strong>Canceladas</strong>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hacer click en cualquier columna de la reservación que desee revisar.
                                    Aparecerá la información más detallada de la reservación.
                                </p>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class='col-xs-8 col-xs-offset-2'>
                    <br>
                </div>
                <!-- ================================================================ -->
                <?php
            }
            ?>
        </div>
    </div>
    <!-- FIN MANUAL ================================================================= -->

    <div class='row'>
        <div class='col-md-12 col-xs-12 '>
            <legend>
            </legend>
        </div>
    </div>
</div>
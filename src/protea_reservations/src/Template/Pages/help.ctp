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
                if($user_role_id == 2 || $user_role_id == 3)
                {
                    ?>
                    <h2>Manual de Ayuda para Administradores</h2>
                    <?php
                }
                // SI SOY USUARIO REGULAR
                else if($user_role_id == 1)
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
    <div class='row' id="introduccion">
        <div class='col-xs-8 col-xs-offset-2'>
            <div style="text-align:justify;color:black;">
                <br>
                <p>
                <?php
                // SI SOY ADMINISTRADOR
                if($user_role_id == 2 || $user_role_id == 3)
                {
                    ?>
                    Administradorum Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras varius massa augue, nec consectetur dui condimentum efficitur. Praesent sodales urna libero, elementum tincidunt ligula tristique sit amet. Quisque bibendum non turpis in euismod. Suspendisse aliquam vel orci sit amet porta. Mauris at sagittis arcu. Donec cursus urna in erat pulvinar ullamcorper. Suspendisse sollicitudin rhoncus cursus. Aenean at turpis maximus, scelerisque nibh id, efficitur odio. Nam tincidunt metus eu mi eleifend rutrum. Nam finibus varius molestie. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec eget dignissim ipsum, at egestas mi. Nulla facilisi. Nunc quis lobortis tellus. Sed volutpat sollicitudin tortor, et iaculis nulla sagittis id. Nulla non quam nisl.
                    <?php
                }
                // SI SOY USUARIO REGULAR
                else if($user_role_id == 1)
                {
                    ?>
                    Usuarius regularix Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras varius massa augue, nec consectetur dui condimentum efficitur. Praesent sodales urna libero, elementum tincidunt ligula tristique sit amet. Quisque bibendum non turpis in euismod. Suspendisse aliquam vel orci sit amet porta. Mauris at sagittis arcu. Donec cursus urna in erat pulvinar ullamcorper. Suspendisse sollicitudin rhoncus cursus. Aenean at turpis maximus, scelerisque nibh id, efficitur odio. Nam tincidunt metus eu mi eleifend rutrum. Nam finibus varius molestie. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec eget dignissim ipsum, at egestas mi. Nulla facilisi. Nunc quis lobortis tellus. Sed volutpat sollicitudin tortor, et iaculis nulla sagittis id. Nulla non quam nisl.
                    <?php
                }
                ?>
                </p>
            </div>
        </div>
    </div>
    <!-- FIN DE INTRODUCCION ======================================================== -->
    
    
    <!-- TITULO FUNCIONES =========================================================== -->
    <?php
    if($user_role_id == 1 || $user_role_id == 2 || $user_role_id == 3)
    {
        ?>
        <div class='row'>
                <div class='col-xs-8 col-xs-offset-2' style="color:black;">
                    <p>
                        <h4><b>Funciones:</b></h4>
                    </p>
                    <br>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <!-- FIN TITULO FUNCIONES ======================================================= -->

    
    <!-- MANUAL ===================================================================== -->
    <div class='row'>
        <div class='col-xs-12' style="color:black; text-align:center;">            
            <?php
            // SI SOY ADMINISTRADOR
            if($user_role_id == 2 || $user_role_id == 3)
            {
                ?>
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
                                    En la columna <strong>Revisar</strong>, hacer click en el <strong>check</strong> de la reservación que quiere revisar.
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
                            Eliminar reservaciones en caso de que se haya pasado la fecha y no pudieron ser Aprobadas ni Rechazadas.
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
                    <h4><u>Historial de reservaciones</u></h4>
                </div>
                <!-- ================================================================ -->
                <div class='col-xs-8 col-xs-offset-2'>
                    <button data-toggle="collapse" class="btn btn-info" data-target="#adminHistorial">
                        Generar reportes de reservaciones
                    </button>
                    <div id="adminHistorial" class="collapse">
                        <p>
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
                                    Aparecerá un índice con la información de los tipos de recurso.
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
                            Descripción de función
                        </p>
                        <ol>
                            <li>
                                <p>
                                    Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
                                </p>
                            </li>
                            <li>
                                <p>
                                    Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
                                </p>
                            </li>
                            <li>
                                <p>
                                    Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
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
                            Descripción de función
                        </p>
                        <ol>
                            <li>
                                <p>
                                    Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
                                </p>
                            </li>
                            <li>
                                <p>
                                    Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
                                </p>
                            </li>
                            <li>
                                <p>
                                    Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
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
                            Descripción de función
                        </p>
                        <ol>
                            <li>
                                <p>
                                    Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
                                </p>
                            </li>
                            <li>
                                <p>
                                    Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
                                </p>
                            </li>
                            <li>
                                <p>
                                    Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
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
                            Descripción de función
                        </p>
                        <ol>
                            <li>
                                <p>
                                    Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
                                </p>
                            </li>
                            <li>
                                <p>
                                    Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
                                </p>
                            </li>
                            <li>
                                <p>
                                    Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
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
                            Descripción de función
                        </p>
                        <ol>
                            <li>
                                <p>
                                    Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
                                </p>
                            </li>
                            <li>
                                <p>
                                    Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
                                </p>
                            </li>
                            <li>
                                <p>
                                    Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
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
                            Descripción de función
                        </p>
                        <ol>
                            <li>
                                <p>
                                    Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
                                </p>
                            </li>
                            <li>
                                <p>
                                    Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
                                </p>
                            </li>
                            <li>
                                <p>
                                    Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
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
                            Descripción de función
                        </p>
                        <ol>
                            <li>
                                <p>
                                    Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
                                </p>
                            </li>
                            <li>
                                <p>
                                    Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
                                </p>
                            </li>
                            <li>
                                <p>
                                    Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
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
                            Descripción de función
                        </p>
                        <ol>
                            <li>
                                <p>
                                    Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
                                </p>
                            </li>
                            <li>
                                <p>
                                    Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
                                </p>
                            </li>
                            <li>
                                <p>
                                    Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
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
                if($user_role_id == 3)
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
                            Descripción de función
                        </p>
                        <ol>
                            <li>
                                <p>
                                    Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
                                </p>
                            </li>
                            <li>
                                <p>
                                    Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
                                </p>
                            </li>
                            <li>
                                <p>
                                    Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
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
                            Descripción de función
                        </p>
                        <ol>
                            <li>
                                <p>
                                    Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
                                </p>
                            </li>
                            <li>
                                <p>
                                    Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
                                </p>
                            </li>
                            <li>
                                <p>
                                    Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
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
                                Descripción de función
                            </p>
                            <ol>
                                <li>
                                    <p>
                                        Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
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
                                Descripción de función
                            </p>
                            <ol>
                                <li>
                                    <p>
                                        Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
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
                                Descripción de función
                            </p>
                            <ol>
                                <li>
                                    <p>
                                        Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
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
                <?php
            }
            // SI SOY USUARIO REGULAR
            else if($user_role_id == 1)
            {
                ?>
                <!-- ================================================================ -->
                <div class='col-xs-8 col-xs-offset-2'>
                    <button data-toggle="collapse" class="btn btn-info" data-target="#usuarioCalendario">
                        Revisar el calendario para ver eventos
                    </button>
                    <div id="usuarioCalendario" class="collapse">
                        <p>
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
                                    En la columna <strong>Revisar</strong>, hacer click en el <strong>check</strong> de la reservación que quiere revisar.
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
                            Revisar el historial de reservaciones para ver la información de todas mis reservaciones aceptadas, tanto actuales como pasadas.
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
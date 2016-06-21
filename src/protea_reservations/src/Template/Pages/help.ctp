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
        <div class='col-xs-8 col-xs-offset-2' style="color:black;" align="justify">
            <br>
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
            <br>
        </div>
    </div>
    <!-- FIN DE INTRODUCCION ======================================================== -->
    
    <div class='row'>
        <div class='col-xs-12'>
            <br>
        </div>
    </div>
    
    <div class='row'>
            <div class='col-xs-8 col-xs-offset-2' style="color:black;">
                <h4><b>Funciones:</b></h4>
            </div>
        </div>
    </div>
    
    <!-- MANUAL ===================================================================== -->
    <div class='row'>
        <div class='col-xs-12' style="color:black;">            
            <?php
            // SI SOY ADMINISTRADOR
            if($user_role_id == 2 || $user_role_id == 3)
            {
                ?>
                <!-- ================================================================ -->
                <div class='col-xs-8 col-xs-offset-2'>
                    <h4><u>Administrar reservaciones pendientes</u></h4>
                </div>
                <!-- ================================================================ -->
                <div class='col-xs-8 col-xs-offset-2'>
                    <button data-toggle="collapse" class="btn btn-info" data-target="#adminReservacionesPendientes">
                        Aprobar/Rechazar reservaciones pendientes
                    </button>
                    <div id="adminReservacionesPendientes" class="collapse">
                        <p>
                            Descripción de función

                            <ol>
                                <li>
                                    Paso kjsdflk jsdfljs dfljsdfs dfnlmsdnflkjsd flkads flkjsdf kjsdfkj
                                </li>
                                <li>
                                    Paso sdflkjsdfjasdfj sdfkhsdf adskfjsd adskjdsfhsd ñksadf
                                </li>
                                <li>
                                    Paso djjs sksd dsjs djs sjdsfsd fg sdjd sjdf ,jhdsf sldkjhs dsndjsd dksdjdfh
                                </li>
                            </ol>
                        </p>
                    </div>
                </div>
                <div class='col-xs-8 col-xs-offset-2'>
                    <br>
                </div>
                <!-- ================================================================ -->
                <div class='col-xs-8 col-xs-offset-2'>
                    <button data-toggle="collapse" class="btn btn-info" data-target="#adminCancelar">
                        Cancelar reservaciones
                    </button>
                    <div id="adminCancelar" class="collapse">
                        <p>
                            Descripción de función

                            <ol>
                                <li>
                                    Paso
                                </li>
                                <li>
                                    Paso
                                </li>
                                <li>
                                    Paso
                                </li>
                            </ol>
                        </p>
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
                        Revisar historial de reservaciones
                    </button>
                    <div id="adminHistorial" class="collapse">
                        <p>
                            Descripción de función

                            <ol>
                                <li>
                                    Paso
                                </li>
                                <li>
                                    Paso
                                </li>
                                <li>
                                    Paso
                                </li>
                            </ol>
                        </p>
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
                            Descripción de función

                            <ol>
                                <li>
                                    Paso
                                </li>
                                <li>
                                    Paso
                                </li>
                                <li>
                                    Paso
                                </li>
                            </ol>
                        </p>
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

                            <ol>
                                <li>
                                    Paso
                                </li>
                                <li>
                                    Paso
                                </li>
                                <li>
                                    Paso
                                </li>
                            </ol>
                        </p>
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

                            <ol>
                                <li>
                                    Paso
                                </li>
                                <li>
                                    Paso
                                </li>
                                <li>
                                    Paso
                                </li>
                            </ol>
                        </p>
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

                            <ol>
                                <li>
                                    Paso
                                </li>
                                <li>
                                    Paso
                                </li>
                                <li>
                                    Paso
                                </li>
                            </ol>
                        </p>
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

                            <ol>
                                <li>
                                    Paso
                                </li>
                                <li>
                                    Paso
                                </li>
                                <li>
                                    Paso
                                </li>
                            </ol>
                        </p>
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

                            <ol>
                                <li>
                                    Paso
                                </li>
                                <li>
                                    Paso
                                </li>
                                <li>
                                    Paso
                                </li>
                            </ol>
                        </p>
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

                            <ol>
                                <li>
                                    Paso
                                </li>
                                <li>
                                    Paso
                                </li>
                                <li>
                                    Paso
                                </li>
                            </ol>
                        </p>
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

                            <ol>
                                <li>
                                    Paso
                                </li>
                                <li>
                                    Paso
                                </li>
                                <li>
                                    Paso
                                </li>
                            </ol>
                        </p>
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

                            <ol>
                                <li>
                                    Paso
                                </li>
                                <li>
                                    Paso
                                </li>
                                <li>
                                    Paso
                                </li>
                            </ol>
                        </p>
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

                                <ol>
                                    <li>
                                        Paso
                                    </li>
                                    <li>
                                        Paso
                                    </li>
                                    <li>
                                        Paso
                                    </li>
                                </ol>
                            </p>
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

                                <ol>
                                    <li>
                                        Paso
                                    </li>
                                    <li>
                                        Paso
                                    </li>
                                    <li>
                                        Paso
                                    </li>
                                </ol>
                            </p>
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

                                <ol>
                                    <li>
                                        Paso
                                    </li>
                                    <li>
                                        Paso
                                    </li>
                                    <li>
                                        Paso
                                    </li>
                                </ol>
                            </p>
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

                                <ol>
                                    <li>
                                        Paso
                                    </li>
                                    <li>
                                        Paso
                                    </li>
                                    <li>
                                        Paso
                                    </li>
                                </ol>
                            </p>
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

                                <ol>
                                    <li>
                                        Paso
                                    </li>
                                    <li>
                                        Paso
                                    </li>
                                    <li>
                                        Paso
                                    </li>
                                </ol>
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
                            Descripción de función

                            <ol>
                                <li>
                                    Paso
                                </li>
                                <li>
                                    Paso
                                </li>
                                <li>
                                    Paso
                                </li>
                            </ol>
                        </p>
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
                            Descripción de función

                            <ol>
                                <li>
                                    Paso
                                </li>
                                <li>
                                    Paso
                                </li>
                                <li>
                                    Paso
                                </li>
                            </ol>
                        </p>
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
                            Descripción de función

                            <ol>
                                <li>
                                    Paso
                                </li>
                                <li>
                                    Paso
                                </li>
                                <li>
                                    Paso
                                </li>
                            </ol>
                        </p>
                    </div>
                </div>
                <div class='col-xs-8 col-xs-offset-2'>
                    <br>
                </div>
                <!-- ================================================================ -->
                <div class='col-xs-8 col-xs-offset-2'>
                    <button data-toggle="collapse" class="btn btn-info" data-target="#usuarioPendientes">
                        Revisar mis reservaciones actuales
                    </button>
                    <div id="usuarioPendientes" class="collapse">
                        <p>
                            Descripción de función

                            <ol>
                                <li>
                                    Paso
                                </li>
                                <li>
                                    Paso
                                </li>
                                <li>
                                    Paso
                                </li>
                            </ol>
                        </p>
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
                            Descripción de función

                            <ol>
                                <li>
                                    Paso
                                </li>
                                <li>
                                    Paso
                                </li>
                                <li>
                                    Paso
                                </li>
                            </ol>
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
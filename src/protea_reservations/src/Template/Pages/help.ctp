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
    
    
    <!-- MANUAL ===================================================================== -->
    <div class='row'>
        <div class='col-xs-8 col-xs-offset-2' style="color:black;">
            <br>
            <h4><b>Funciones:</b></h4>
            <br>
            <!-- TITULOS ============================================================ -->
            <div id="titulos">
                <?php
                // SI SOY ADMINISTRADOR
                if($user_role_id == 2 || $user_role_id == 3)
                {
                    ?>
                    <ul>
                        <li>
                            <h4><u>Administrar reservaciones pendientes</u></h4>
                            <ul style="list-style-type: circle; padding-left:25px;">
                                <li>
                                    <h4><a href="#adminReservacionesPendientes">Aprobar/Rechazar reservaciones pendientes</a></h4>
                                </li>
                                <li>
                                    <h4><a href="#adminCancelar">Cancelar reservaciones</a></h4>
                                </li>
                            </ul>
                        </li>
                        <br>
                        <li>
                            <h4><u>Historial de reservaciones</u></h4>
                            <ul style="list-style-type: circle; padding-left:25px;">
                                <li>
                                    <h4><a href="#adminHistorial">Revisar historial de reservaciones</a></h4>
                                </li>
                            </ul>
                        </li>
                        <br>
                        <li>
                            <h4><u>Administrar tipos de recursos</u></h4>
                            <ul style="list-style-type: circle; padding-left:25px;">
                                <li>
                                    <h4><a href="#adminAgregarTipo">Agregar nuevos tipos de recursos</a></h4>
                                </li>
                                <li>
                                    <h4><a href="#adminActualizarTipo">Actualizar la información de tipos de recursos</a></h4>
                                </li>
                                <li>
                                    <h4><a href="#adminEliminarTipo">Eliminar tipos de recursos</a></h4>
                                </li>
                            </ul>
                        </li>
                        <br>
                        <li>
                            <h4><u>Administrar recursos</u></h4>
                            <ul style="list-style-type: circle; padding-left:25px;">
                                <li>
                                    <h4><a href="#adminAgregarRecurso">Agregar nuevos recursos</a></h4>
                                </li>
                                <li>
                                    <h4><a href="#adminVerRecurso">Ver la información de recursos</a></h4>
                                </li>
                                <li>
                                    <h4><a href="#adminActualizarRecurso">Actualizar la información de recursos</a></h4>
                                </li>
                                <li>
                                    <h4><a href="#adminEliminarRecurso">Eliminar recursos</a></h4>
                                </li>
                                <li>
                                    <h4><a href="#adminAsociarRecurso">Asociar administradores con recursos</a></h4>
                                </li>
                                <li>
                                    <h4><a href="#adminDesasociarRecurso">Desasociar administradores de recursos</a></h4>
                                </li>
                            </ul>
                        </li>
                        
                        <?php
                        // Si soy SuperAdministrador
                        if($user_role_id == 3)
                        {
                            ?>
                            <br>
                            <li>
                                <h4><u>Administrar cuentas de usuarios</u></h4>
                                <ul style="list-style-type: circle; padding-left:25px;">
                                    <li>
                                        <h4><a href="#adminAgregarUsuario">Agregar nuevas cuentas de usuarios</a></h4>
                                    </li>
                                    <li>
                                        <h4><a href="#adminVerUsuarios">Ver la información de cuentas de usuarios</a></h4>
                                    </li>
                                    <li>
                                        <h4><a href="#adminUsuariosPendientes">Aprobar/Rechazar usuarios pendientes</a></h4>
                                    </li>
                                    <li>
                                        <h4><a href="#adminActualizarUsuarios">Actualizar la información de cuentas de usuarios</a></h4>
                                    </li>
                                    <li>
                                        <h4><a href="#adminEliminarUsuarios">Eliminar cuentas de usuarios</a></h4>
                                    </li>
                                </ul>
                            </li>
                          <?php
                        }
                        ?>
                    </ul>
                    <?php
                }
                // SI SOY USUARIO REGULAR
                else if($user_role_id == 1)
                {
                    ?>
                    <ul style="list-style-type: circle;">
                        <li>
                            <h4><a href="#usuarioCalendario">Revisar el calendario para ver eventos</a></h4>
                        </li>
                        <li>
                            <h4><a href="#usuarioReservacion">Hacer reservaciones de salas o equipo</a></h4>
                        </li>
                        <li>
                            <h4><a href="#usuarioActualizar">Actualizar información de mi cuenta</a></h4>
                        </li>
                        <li>
                            <h4><a href="#usuarioPendientes">Revisar mis reservaciones actuales</a></h4>
                        </li>
                        <li>
                            <h4><a href="#usuarioHistorial">Revisar el historial de mis reservaciones</a></h4>
                        </li>
                    </ul>
                    <?php
                }
                ?>
            </div>
            <!-- FIN TITULOS ======================================================== -->

            <legend><br></legend>
            <h4><b>Paso a paso:</b></h4>
            <br>

            <!-- PASO A PASO ======================================================== -->
            <div id="pasos">
                <?php
                // SI SOY ADMINISTRADOR
                if($user_role_id == 2 || $user_role_id == 3)
                {
                    ?>
                    <ul>
                        <li>
                            <div id="adminReservacionesPendientes">
                                <h4>
                                    <b>Aprobar/Rechazar reservaciones pendientes:</b>
                                </h4>
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
                                        <li style="list-style-type: none;">
                                            <a href="#titulo">Volver arriba</a>
                                        </li>
                                    </ol>
                                </p>
                            </div>
                        </li>
                        <br>
                        <li>
                            <div id="adminCancelar">
                                <h4>
                                    <b>Cancelar reservaciones:</b>
                                </h4>
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
                                        <li style="list-style-type: none;">
                                            <a href="#titulo">Volver arriba</a>
                                        </li>
                                    </ol>
                                </p>
                            </div>
                        </li>
                        <br>
                        <li>
                            <div id="adminHistorial">
                                <h4>
                                    <b>Revisar historial de reservaciones:</b>
                                </h4>
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
                                        <li style="list-style-type: none;">
                                            <a href="#titulo">Volver arriba</a>
                                        </li>
                                    </ol>
                                </p>
                            </div>
                        </li>
                        <br>
                        <li>
                            <div id="adminAgregarTipo">
                                <h4>
                                    <b>Agregar nuevos tipos de recursos:</b>
                                </h4>
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
                                        <li style="list-style-type: none;">
                                            <a href="#titulo">Volver arriba</a>
                                        </li>
                                    </ol>
                                </p>
                            </div>
                        </li>
                        <br>
                        <li>
                            <div id="adminActualizarTipo">
                                <h4>
                                    <b>Actualizar la información de tipos de recursos:</b>
                                </h4>
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
                                        <li style="list-style-type: none;">
                                            <a href="#titulo">Volver arriba</a>
                                        </li>
                                    </ol>
                                </p>
                            </div>
                        </li>
                        <br>
                        <li>
                            <div id="adminEliminarTipo">
                                <h4>
                                    <b>Eliminar tipos de recursos:</b>
                                </h4>
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
                                        <li style="list-style-type: none;">
                                            <a href="#titulo">Volver arriba</a>
                                        </li>
                                    </ol>
                                </p>
                            </div>
                        </li>
                        <br>
                        <li>
                            <div id="adminAgregarRecurso">
                                <h4>
                                    <b>Agregar nuevos recursos:</b>
                                </h4>
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
                                        <li style="list-style-type: none;">
                                            <a href="#titulo">Volver arriba</a>
                                        </li>
                                    </ol>
                                </p>
                            </div>
                        </li>
                        <br>
                        <li>
                            <div id="adminVerRecurso">
                                <h4>
                                    <b>Ver la información de recursos:</b>
                                </h4>
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
                                        <li style="list-style-type: none;">
                                            <a href="#titulo">Volver arriba</a>
                                        </li>
                                    </ol>
                                </p>
                            </div>
                        </li>
                        <br>
                        <li>
                            <div id="adminActualizarRecurso">
                                <h4>
                                    <b>Actualizar la información de recursos:</b>
                                </h4>
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
                                        <li style="list-style-type: none;">
                                            <a href="#titulo">Volver arriba</a>
                                        </li>
                                    </ol>
                                </p>
                            </div>
                        </li>
                        <br>
                        <li>
                            <div id="adminEliminarRecurso">
                                <h4>
                                    <b>Eliminar recursos:</b>
                                </h4>
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
                                        <li style="list-style-type: none;">
                                            <a href="#titulo">Volver arriba</a>
                                        </li>
                                    </ol>
                                </p>
                            </div>
                        </li>
                        <br>
                        <li>
                            <div id="adminAsociarRecurso">
                                <h4>
                                    <b>Asociar administradores con recursos:</b>
                                </h4>
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
                                        <li style="list-style-type: none;">
                                            <a href="#titulo">Volver arriba</a>
                                        </li>
                                    </ol>
                                </p>
                            </div>
                        </li>
                        <br>
                        <li>
                            <div id="adminDesasociarRecurso">
                                <h4>
                                    <b>Desasociar administradores de recursos:</b>
                                </h4>
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
                                        <li style="list-style-type: none;">
                                            <a href="#titulo">Volver arriba</a>
                                        </li>
                                    </ol>
                                </p>
                            </div>
                        </li>
                        <br>

                        <?php
                        // Si soy SuperAdministrador
                        if($user_role_id == 3)
                        {
                            ?>
                            <li>
                                <div id="adminAgregarUsuario">
                                    <h4>
                                        <b>Agregar nuevas cuentas de usuarios:</b>
                                    </h4>
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
                                            <li style="list-style-type: none;">
                                                <a href="#titulo">Volver arriba</a>
                                            </li>
                                        </ol>
                                    </p>
                                </div>
                            </li>
                            <br>
                            <li>
                                <div id="adminVerUsuarios">
                                    <h4>
                                        <b>Ver la información de cuentas de usuarios:</b>
                                    </h4>
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
                                            <li style="list-style-type: none;">
                                                <a href="#titulo">Volver arriba</a>
                                            </li>
                                        </ol>
                                    </p>
                                </div>
                            </li>
                            <br>
                            <li>
                                <div id="adminUsuariosPendientes">
                                    <h4>
                                        <b>Aprobar/Rechazar usuarios pendientes:</b>
                                    </h4>
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
                                            <li style="list-style-type: none;">
                                                <a href="#titulo">Volver arriba</a>
                                            </li>
                                        </ol>
                                    </p>
                                </div>
                            </li>
                            <br>
                            <li>
                                <div id="adminActualizarUsuarios">
                                    <h4>
                                        <b>Actualizar la información de cuentas de usuarios:</b>
                                    </h4>
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
                                            <li style="list-style-type: none;">
                                                <a href="#titulo">Volver arriba</a>
                                            </li>
                                        </ol>
                                    </p>
                                </div>
                            </li>
                            <br>
                            <li>
                                <div id="adminEliminarUsuarios">
                                    <h4>
                                        <b>Eliminar cuentas de usuarios:</b>
                                    </h4>
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
                                            <li style="list-style-type: none;">
                                                <a href="#titulo">Volver arriba</a>
                                            </li>
                                        </ol>
                                    </p>
                                </div>
                            </li>
                            <br>
                            <?php
                        }
                        ?>
                    </ul>

                    <?php
                }
                // SI SOY USUARIO REGULAR
                else if($user_role_id == 1)
                {
                    ?>
                    <ul>
                        <li>
                            <div id="usuarioCalendario">
                                <h4>
                                    <b>Revisar el calendario para ver eventos:</b>
                                </h4>
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
                                        <li style="list-style-type: none;">
                                            <a href="#titulo">Volver arriba</a>
                                        </li>
                                    </ol>
                                </p>
                            </div>
                        </li>
                        <br>
                        <li>
                            <div id="usuarioReservacion">
                                <h4>
                                    <b>Hacer reservaciones de salas o equipo:</b>
                                </h4>
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
                                        <li style="list-style-type: none;">
                                            <a href="#titulo">Volver arriba</a>
                                        </li>
                                    </ol>
                                </p>
                            </div>
                        </li>
                        <br>
                        <li>
                            <div id="usuarioActualizar">
                                <h4>
                                    <b>Actualizar la informacón de mi cuenta:</b>
                                </h4>
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
                                        <li style="list-style-type: none;">
                                            <a href="#titulo">Volver arriba</a>
                                        </li>
                                    </ol>
                                </p>
                            </div>
                        </li>
                        <br>
                        <li>
                            <div id="usuarioPendientes">
                                <h4>
                                    <b>Revisar mis reservaciones actuales:</b>
                                </h4>
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
                                        <li style="list-style-type: none;">
                                            <a href="#titulo">Volver arriba</a>
                                        </li>
                                    </ol>
                                </p>
                            </div>
                        </li>
                        <br>
                        <li>
                            <div id="usuarioHistorial">
                                <h4>
                                    <b>Revisar el historial de mis reservaciones:</b>
                                </h4>
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
                                        <li style="list-style-type: none;">
                                            <a href="#titulo">Volver arriba</a>
                                        </li>
                                    </ol>
                                </p>
                            </div>
                        </li>
                        <br>
                    </ul>
                    <?php
                }
                ?>
            </div>
            <!-- FIN PASO A PASO ==================================================== -->
            <br>
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
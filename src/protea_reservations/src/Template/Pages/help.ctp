<!-- INFORMACION -->
<div class="ayuda">
    
    <!-- TITULO ===================================================================== -->
    <div class='row'>
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
                // SI SOY USUARIO O NO ESTOY LOGGEADO
                else
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
    <div class='row'>
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
                // SI SOY USUARIO O NO ESTOY LOGGEADO
                else
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
            <?php
                // SI SOY ADMINISTRADOR
                if($user_role_id == 2 || $user_role_id == 3)
                {
                    ?>

                    <?php
                }
                // SI SOY USUARIO O NO ESTOY LOGGEADO
                else
                {
                    ?>
                    <p>
                        <h4><u>Contactarse con los administradores</u>:</h4>
                    </p>
                    <p>
                        <h4><u>Revisar las políticas de uso</u>:</h4>
                    </p>
                    <p>
                        <h4><u>Revisar el calendario para ver eventos</u>:</h4>
                    </p>
                    <p>
                        <h4><u>Hacer una reservación:</u></h4>
                    </p>
                    <p>
                        <h4><u>Actualizar los datos de mi cuenta</u>:</h4>
                    </p>
                    <p>
                        <h4><u>Revisar mis reservaciones actuales</u>:</h4>
                    </p>
                    <p>
                        <h4><u>Revisar el historial de mis reservaciones</u>:</h4>
                    </p>
                    <?php
                }
                ?>
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
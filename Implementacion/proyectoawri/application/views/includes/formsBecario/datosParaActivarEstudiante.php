<div id="contenido">
    <?php
    $codigo = array(
        'name' => 'codigo',
        'id' => 'codigo',
        'value' => ''
    );
    $programa = array(
        'name' => 'programa',
        'id' => 'programa',
        'value' => ''
    );
    $nombre = array(
        'name' => 'nombre',
        'id' => 'nombre',
        'value' => ''
    );
    $telefono = array(
        'name' => 'telefono',
        'id' => 'telefono',
        'value' => ''
    );
    $direccion = array(
        'name' => 'direccion',
        'id' => 'direccion',
        'value' => ''
    );
    $correo = array(
        'name' => 'correo',
        'id' => 'correo',
        'value' => ''
    );
    $boton = array(
        'name' => 'adicionarEstudiante',
        'id' => 'adicionarEstudiante',
        'content' => 'Adicionar'
    );
    $formulario = array(
        'id' => 'fomulario',
        'name' => 'formulario'
    );
    ?>
    <?php echo form_open('becarioGestion/datosParaActivarEstudiante', $formulario); ?>
    <div class="intertitulobase2">Adicionar estudiante</div>
    <br/>
    <div id="formulario">
        <table>
            <tbody>


            <td><label>Codigo:</label> </td>
            <td>
                <?php echo form_input($codigo); ?>                    
            </td>
            <td>
                <?php echo form_error('codUsuario'); ?>

            </td>
            <td>
                <div id="codigoUsuario"></div>
            </td>

            </tr>
            <tr>
                <td><label>Programa:</label> </td>
                <td>
                    <?php echo form_input($programa);
                    ?>

                </td>
                <td>
                    <?php echo form_error('programa'); ?>

                </td>
                <td>
                    <div id="mprograma"></div>
                </td>

            </tr>
            <tr>
                <td><label>Nombre Completo:</label> </td>
                <td>
                    <?php echo form_input($nombre);
                    ?>

                </td>
                <td>
                    <?php echo form_error('nombre'); ?>

                </td>
                <td>
                    <div id="mnombre"></div>
                </td>

            </tr>
            <tr>
                <td><label>Telefono:</label> </td>
                <td>
                    <?php echo form_input($telefono);
                    ?>

                </td>
                <td>
                    <?php echo form_error('telefono'); ?>

                </td>
                <td>
                    <div id="mtelefono"></div>
                </td>

            </tr>
            <tr>
                <td><label>Direccion:</label> </td>
                <td>
                    <?php echo form_input($direccion); ?>

                </td>
                <td>
                    <?php echo form_error('direccion'); ?>

                </td>
                <td>
                    <div id="mdireccion"></div>
                </td>

            </tr>
            <tr>
                <td><label>Correo:<label> </td>
                            <td>
                                <?php echo form_input($correo); ?>

                            </td>
                            <td>
                                <?php echo form_error('correo'); ?>

                            </td>
                            <td>
                                <div id="mcorreo"></div>
                            </td>

                            </tr>


                            </tbody>
                            </table>
                            <?php echo form_button($boton); ?><?php
                            echo form_close();
                            ?><div class="msjerror"><?php echo validation_errors(); ?></div>

                            </div>


                            </div>
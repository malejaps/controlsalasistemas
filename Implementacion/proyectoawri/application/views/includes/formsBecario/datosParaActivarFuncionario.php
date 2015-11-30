<div id="contenido">
    <?php
    $cedula = array(
        'name' => 'cedula',
        'id' => 'cedula',
        'value' => ''
    );
    $nombre = array(
        'name' => 'nombre',
        'id' => 'nombre',
        'value' => ''
    );
    $telefono1 = array(
        'name' => 'telefono1',
        'id' => 'telefono1',
        'value' => ''
    );
    $telefono2 = array(
        'name' => 'telefono2',
        'id' => 'telefono2',
        'value' => ''
    );
    $correo = array(
        'name' => 'correo',
        'id' => 'correo',
        'value' => ''
    );
    $boton = array(
        'name' => 'adicionarFuncionario',
        'id' => 'adicionarFuncionario',
        'content' => 'Adicionar'
    );
    $formulario = array(
        'id' => 'fomulario',
        'name' => 'formulario'
    );
    ?>
    <?php echo form_open('becarioGestion/datosAdicionarFuncionario', $formulario); ?>
    <div class="intertitulobase2">Adicionar Funcionario</div>
    <br/>
    <div id="formulario">
        <table>
            <tbody>

                <tr>
                    <td><label>Cedula:</label> </td>
                    <td>
                        <?php echo form_input($cedula); ?>

                    </td>
                    <td>
                        <?php echo form_error('cedula'); ?>

                    </td>
                    <td>
                        <div id="mcedula"></div>
                    </td>

                </tr>
                <tr>
                    <td><label>Nombre:</label> </td>
                    <td>
                        <?php echo form_input($nombre); ?>

                    </td>
                    <td>
                        <?php echo form_error('nombre'); ?>

                    </td>
                    <td>
                        <div id="mnombre"></div>
                    </td>

                </tr>
                <tr>
                    <td><label>Telefono 1:</label> </td>
                    <td>
                        <?php echo form_input($telefono1); ?>

                    </td>
                    <td>
                        <?php echo form_error('telefono1'); ?>

                    </td>
                    <td>
                        <div id="mtelefono1"></div>
                    </td>

                </tr>
                <tr>
                    <td><label>Telefono 2:</label> </td>
                    <td>
                        <?php echo form_input($telefono2); ?>

                    </td>
                    <td>
                        <?php echo form_error('telefono2'); ?>

                    </td>
                    <td>
                        <div id="mtelefono2"></div>
                    </td>

                </tr>
                <tr>
                    <td><label>Correo:</label> </td>
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
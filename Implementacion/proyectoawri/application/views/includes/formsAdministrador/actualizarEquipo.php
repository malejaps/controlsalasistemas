<div id="contenido">
    <?php
    $codigopc = array(
        'name' => 'codigopc',
        'id' => 'codigopc',
        'value' => ''
    );

    $salas_Cod_sala = array(
        'name' => 'salas_Cod_sala',
        'id' => 'salas_Cod_sala',
        'value' => ''
    );
    $ip = array(
        'name' => 'ip',
        'id' => 'ip',
        'value' => ''
    );

    $nombre_comp = array(
        'name' => 'nombre_comp',
        'id' => 'nombre_comp',
        'value' => ''
    );

    $boton = array(
        'name' => 'actualizarE',
        'id' => 'actualizarE',
        'content' => 'Actualizar'
        
    );
    $formulario = array(
        'id' => 'fomulario',
        'name' => 'formulario'
    );
    ?>
    <?php
    echo form_open('inicioAdministrador/actualizarEquipo', $formulario);
    ?>
    <div class="intertitulobase2">Actualizar equipo</div>
    <br/>
    <div id="formulario">
        <table>
            <tbody>

                <tr>
                    <td><label>Codigo pc:</label> </td>
                    <td>
                        <?php echo form_input($codigopc); ?>
                    </td>
                    <td>
                        <div id="error_Cod_pc"></div>
                    </td>
                </tr>
                <tr>
                    <td><label>Codigo de sala:</label> </td>
                    <td><div id="codigosala" name="codigosala"></div></td>
                    <td><div id="error_salas_Cod_sala"></div></td>
                </tr>
                <tr>
                    <td><label>IP:</label> </td>
                    <td><div id="ip" name="ip"></div></td>
                    <td><div id="error_ip" name="error_ip"></div></td>

                </tr>
                <tr>
                    <td><label>Nombre del computador:</label> </td>
                    <td><div id="nombrepc" name="nombrepc"></div></td>
                    <td><div id="error_nombre_comp"></div></td>
                </tr>

            </tbody>
        </table>
        <br/>
        <br/>
        <?php echo form_button($boton); ?> <?php echo form_close(); ?>
        <div class="msjerror"><?php echo validation_errors(); ?></div>

    </div>
</div>

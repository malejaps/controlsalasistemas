<div id="contenido">
    <?php
    $cedula = array(
        'name' => 'cedFuncionario',
        'id' => 'cedFuncionario',
        'value' => ''
    );
    

    $formulario = array(
        'id' => 'formulario',
        'name' => 'formulario'
    );
    $boton = array(
        'name' => 'actualizarFuncion',
        'id' => 'actualizarFuncion',
        'content' => 'Actualizar'
    );
    ?>
    <?php echo form_open('inicioAdministrador/ActualizarFuncionario', $formulario); ?>

    <div class="intertitulobase2">Actualizar Funcionario</div>
    <br/>
    <div id="formulario">
        <table>
            <tbody>

                <tr>
                    <td><label>Usuario: </label></td>
                    <td>
<?php echo form_input($cedula); ?>

                    </td>
                    <td>
                        <div id="error_cedula" ></div>
                    </td>


                </tr>

                <tr>
                    <td><label>Telefono#1:  </label></td>
                    <td><div id="telefono1" ></div></td>                
                    <td><div id="error_telefono1" ></div></td>
                </tr>

                <tr>
                    <td><label>Telefono#2: </label> </td>
                    <td><div id="telefono2" ></div></td> 
                    <td><div id="error_telefono2" ></div></td>
                </tr>
                <tr>
                    <td><label>Correo:  </label></td>
                   <td><div id="correo_fun" ></div></td>
                    <td><div id="error_correo_fun" ></div></td>
                </tr>
     

            </tbody>
        </table>
        <br/>
        <?php
       echo form_button($boton);
        echo form_close();
        echo validation_errors();
        ?>

    </div>
</div>
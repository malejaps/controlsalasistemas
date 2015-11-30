<div id="contenido">
    <?php
    $cedula = array(
        'name' => 'cedulaFun',
        'id' => 'cedulaFun', 
        'value' => ''
    );

    $asignatura = array(
        'name' => 'asignaturaFun',
        'id' => 'asignaturaFun',
        'value' => ''
    );

    $programa = array(
        'name' => 'programaFun',
        'id' => 'programaFun',
        'value' => ''
    );
    
    $contrasena = array(
        'name' => 'contrasena',
        'id' => 'contrasena',
        'value' => ''
    );
    
    $boton = array(
        'name' => 'loginFunc',
        'id' => 'loginFunc',
        'value' => 'Ingresar'
    );

    /*$practicas = array(
        'Acad&eacute;mica' => 'Académica',
        'Capacitaci&oacute;n' => 'Capacitación',
        'Extenci&oacute;n' => 'Extensión',
        'Libre' => 'Libre'
    );*/
    echo form_open('funcionario/login');
    ?>
    <div class="intertitulobase2">Iniciar sesi&oacute;n</div>
    <br/>
    <div id="formulario">
    <table>
        <tbody>
            <tr>
                <td><label>Cedula: </label></td>
                <td>
                    <?php echo form_input($cedula); ?>
                </td>
                <td>
                    <div id="Cedula"></div>
                </td>

            </tr>
            <tr>
                <td><label>Asignatura:</label> </td>
                <td><?php echo form_input($asignatura); ?></td>  
                    <td><div id="Asignatura">           
                    </div></td>
            </tr>
            <tr>
                <td><label>Programa:</label> </td>
                <td><?php echo form_input($programa); ?></td> 
                   <td> <div id="Programa">                           
                    </div></td>
            </tr>
            <tr>
                <td><label>Contrase&ntilde;a:</label> </td>
                <td><?php echo form_password($contrasena); ?></td> 
                   <td> <div id="Contrasena">                           
                    </div></td>
            </tr>
            <tr>
                <td><label>Tipo de practica:</label> </td>
                <td><select name="practicas" id="practicas">
                        <option>Acad&eacute;mica</option>
                        <option>Capacitaci&oacute;n</option>
                        <option>Extenci&oacute;n</option>
                        <option>Libre</option>
                    </select>
                </td>
            </tr>

        </tbody>
    </table>
    <?php
    echo form_submit($boton);
    echo form_close();
    ?><div class="msjerror"><?php echo validation_errors();?></div>
         </div>
</div>

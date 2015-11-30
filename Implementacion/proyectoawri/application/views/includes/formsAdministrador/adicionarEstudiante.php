<div id="contenido">
    <?php
    $estudiantes_codigo = array(
        'name' => 'estudiantes_codigo',
        'id' => 'estudiantes_codigo',
        'value' => ''
    );

    /*$programa = array(
        'name' => 'programaEst',       
        'id' => 'programeEst',
        'value' => ''
    );*/
    
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
        'name' => 'AdicionarEst',
        'id' => 'AdicionarEst',
        'value' => 'Adicionar'
    );
    
    $atributos = array('id' => 'adicionarEstudiante',
                        'name' => 'adicionarEstudiante');
    
    echo form_open('inicioAdministrador/registrarEstudiante', $atributos);
    ?>
    <div class="intertitulobase2">Adicionar Estudiante</div>
    <br/>
    <div id="formulario">
        <table>
            <tbody>

                <tr>
                    <td><label>Codigo: </label> </td>
                    <td>
                        <?php echo form_input($estudiantes_codigo); ?>

                    </td>
                    <td>
                        <div id="estudiantes_codigo"></div>
                    </td>

                </tr>
                <!--<tr>
                    <td><label>Programa:</label> </td>
                    <td>
                        <?//php echo form_input($programa); ?>

                    </td>
                    <td>
                        <div id="Programa"></div>
                    </td>
                </tr>-->
                
                <tr>
                    <td><label>Programa:</label> </td>
                    <td>                      
                        <select id ="Programa" name="Programa">
                            <?php foreach ($registros as $valor) { ?>
                                <option> <?php echo $valor['Programa'] ?> </option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td><label>Nombre:</label> </td>
                    <td>
                        <?php echo form_input($nombre); ?>

                    </td>
                    <td>
                        <div id="nombre"></div>
                    </td>
                </tr>
                <tr>
                    <td><label>Telefono:</label> </td>
                    <td>
                        <?php echo form_input($telefono); ?>

                    </td>
                    <td>
                        <div id="telefono"></div>
                    </td>
                </tr>
                <tr>
                    <td><label>Direccion:</label> </td>
                    <td>
                        <?php echo form_input($direccion); ?>

                    </td>
                    <td>
                        <div id="direccion"></div>
                    </td>
                </tr>
                <tr>
                    <td><label>Correo:</label> </td>
                    <td>
                        <?php echo form_input($correo); ?>

                    </td>
                    <td>
                        <div id="correo"></div>
                    </td>
                </tr>


            </tbody>
        </table>

            <?php echo form_submit($boton); 
            echo form_close(); ?>
        <div class="msjerror"><?php echo validation_errors(); ?></div>

    </div>
</div>
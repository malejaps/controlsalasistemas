<div id="contenido">
    <?php
   
   
 
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
        'name' => 'adicionarEquipo',
        'id'   => 'adicionarEquipo',
        'content' => 'Adicionar'
    );
    $formulario = array(
        'id' => 'formulario',
        'name' => 'formulario'
    );
    ?>
    <?php 
    
    echo form_open('inicioAdministrador/adicionarEquipo',$formulario); ?>
    <div class="intertitulobase2">Adicionar equipo</div>
    <br/>
    <div id="formulario">
    <table>
        <tbody>
           
            <tr>
               <td><label>Codigo de sala:</label> </td>
             
                     <td><select id="salas_Cod_sala" name="salas_Cod_sala" >

                            <?php foreach ($registros as $valor) { ?>

                                <option> <?php echo $valor['cod_sala'] ?> </option>

                            <?php } ?>

                        </select></td>

                <td>
                    <div id="error_sala"></div>
                </td>
            </tr>
            <tr>
               <td><label>IP:</label> </td>
                <td>
                    <?php                  
                    echo form_input($ip); ?>

                </td>
                <td>
                    <div id="error_ip"></div>
                </td>
            </tr>
              <tr>
               <td><label>Nombre del computador:</label> </td>
                <td>
                    <?php                  
                    echo form_input($nombre_comp); ?>

                </td>
                <td>
                    <div id="error_nombre_comp"></div>
                </td>
            </tr>

        </tbody>
    </table>
     <?php echo form_button($boton); ?>
      <?php echo form_close(); ?>
        <div class="msjerror"><?php echo validation_errors(); ?></div>

</div>
</div>

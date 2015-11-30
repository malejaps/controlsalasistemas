<div id="contenido">
    <?php
       
    $contrasenaAntigua = array(
        'name' => 'contrasenavieja',
        'id' => 'contrasenavieja',
        'value' => ''
    );
 
    $contrasena = array(
        'name' => 'contNueva',
        'id' => 'contNueva',
        'value' => ''
    );
   
      $contrasena1 = array(
       'name' => 'contNueva2',
        'id' => 'contNueva2',
        'value' => ''
    );
      
      $boton = array(
        'name' => 'confirmarCont',
        'id' => 'confirmarCont',
        'value' => 'Actualizar'
    );
    $formulario = array(
        'id' => 'fomularioContrasena',
        'name' => 'fomularioContrasena'
    );   
    echo form_open('funcionario/actulizarContrasena',$formulario); ?>
    <div class="intertitulobase2">Actulizacion de Contrase&ntilde;a</div>
    <br/>
    <div id="formulario">
    <table>
        <tbody>        
              <tr>
               <td><label>Contrase&ntilde;a Antigua: </label></td>
                <td>
                    <?php                  
                    echo form_password($contrasenaAntigua); ?>

                </td>
                <td>
                    <div id="contrasenaAntigua"></div>
                </td>
            </tr>
          
            <tr>
               <td><label>Contrase&ntilde;a Nueva: </label></td>
                <td>
                    <?php                  
                    echo form_password($contrasena); ?>

                </td>
                <td>
                    <div id="contrasena"></div>
                </td>
            </tr>
            <tr>
               <td><label>Repetir Contrase&ntilde;a Nueva: </label></td>
                <td>
                    <?php                  
                    echo form_password($contrasena1); ?>

                </td>
                <td>
                    <div id="contrasena1"></div>
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
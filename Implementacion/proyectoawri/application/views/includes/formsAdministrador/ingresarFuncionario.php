<div id="contenido">

 <?php
    $cedula = array(
        'name' => 'cedula',
        'id' => 'cedula',
        'value' => ''
    );
    
       
    $estado= array(
        'name' => 'estado',
        'id' => 'estado',
        'value' => ''
    );
   
    ?>
    <?php 
    $atributos = array('id' => 'ingresarFuncionario');
    echo form_open('inicioAdministrador/ingresarFuncionario',$atributos); ?>
<div class="intertitulobase2">Activar Funcionario</div>
    <br/>
    <div id="formulario">    
<table>
        <tbody>
           
            <tr>
                <td><label>Cedula Funcionario: </label></td>
               <td> <select id="cedula" name="cedula" >

                                <?php foreach ($registros as $valor) { ?>

                                <option > <?php echo $valor['cedula'] ?> </option>

                                <?php } ?>
                        </select></td>
             

            </tr>
          
        </tbody>
    </table>
    <?php
    echo form_submit('submit', 'Ingresar');
    echo form_close();
    ?>
    </div>
</div>
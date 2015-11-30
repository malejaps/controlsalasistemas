<div id="contenido">
    <?php
    $tabla= $this->table->generate($records);
   echo $tabla;
   echo $this->pagination->create_links();
    ?>
    <?php
   
   
 
    $cod_est = array(
        'name' => 'cod_est',
        'id' => 'cod_est',
        'value' => ''
    );
   
    ?>
    <?php 
    $atributos = array('id' => 'consultasInicio');
    echo form_open('becario/consultasInicio',$atributos); ?>
    <table  >
        <tbody>
            <p>consultas</p>
            
            <tr>
               <td>Codigo de Estudiante</td>
                <td>
                    <?php                  
                    echo form_input($cod_est); ?>

                </td>
                <td>
                    <div id="cod_est"></div>
                </td>
            </tr>
            

        </tbody>
    </table>
    <?php
    
    echo form_submit('submit', 'Filtrar');
    echo form_close();
    echo validation_errors();
    ?>




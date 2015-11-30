<div id="contenido">
    <div class="intertitulobase">Reporte Registros Becarios</div>
    <br/>

   
    <?php
    $fechainicio = array(
        'name' => 'fechainicio',
        'id' => 'fechainicio',
        'value' => ''
    );

    $fechafin = array(
        'name' => 'fechafin',
        'id' => 'fechafin',
        'value' => ''
    );
    
     $boton = array(
        'name' => 'reporte',
        'id' => 'reporte',
        'content' => 'Ver reporte en excel'
    );
     
       $formulario = array(
        'name' => 'formreporte',
        'id' => 'formreporte'
        
    );
    ?>


    
    <div id="formulario">

        <p style="font-size:12px">*Formato fecha: (aaaa-mm-dd)</p>
        <?php echo form_open('inicioAdministrador/descargarExcelReporteRegistrosBecarios', $formulario); ?>
        <table>
            <tbody>

                <tr>
                    <td><label>Fecha inicio:</label> </td>
                    <td>
                        <?php echo form_input($fechainicio); ?>
                    </td>
                    <td>
                        <div id="error_fecha_inicio"></div>
                    </td>
                </tr>

                <tr>
                    <td><label>Fecha fin:</label> </td>
                    <td>
                        <?php echo form_input($fechafin); ?>
                    </td>
                    <td>
                        <div id="error_fecha_fin"></div>
                    </td>
                </tr>
            </tbody>
        </table>
       <?php echo form_button($boton); ?>
        <?php echo form_close();
        ?>
        <div class="msjerror"><?php echo validation_errors(); ?></div>
    </div>
</div>









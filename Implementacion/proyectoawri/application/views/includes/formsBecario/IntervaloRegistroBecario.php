<div id="contenido">
    <div class="intertitulobase">Registros becario</div>
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
    ?>


    <div id="formulario">

        <p style="font-size:12px">*Formato fecha: (aaaa-mm-dd)</p>
        <?php echo form_open('becarioGestion/vistaRegistroBecario'); ?>
        <table>
            <tbody>

                <tr>
                    <td><label>Fecha inicio:</label> </td>
                    <td>
                        <?php echo form_input($fechainicio); ?>
                    </td>
                    <td>
                        <div id="con_san"></div>
                    </td>
                </tr>

                <tr>
                    <td><label>Fecha fin:</label> </td>
                    <td>
                        <?php echo form_input($fechafin); ?>
                    </td>
                    <td>
                        <div id="con_san"></div>
                    </td>
                </tr>
            </tbody>
        </table>
        <div id="formpazysalvo" style="margin-left: 50px">
            <?php echo form_submit('submit', 'Filtrar'); ?>
        </div>
        <?php echo form_close();
        ?>
        <div class="msjerror"><?php echo validation_errors(); ?></div>
    </div>
</div>


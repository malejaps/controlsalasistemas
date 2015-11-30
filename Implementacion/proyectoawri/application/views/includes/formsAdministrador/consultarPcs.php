<div id="contenido">
    <div class="intertitulobase">Liberar computador</div>
 <div id="tabla">
     <br/>
       
       <table border="1" id="tablagenerada" cellpadding="4" cellspacing="0">
        <thead>
        <th>Codigo de usuario</th>
        <th>Nombre computador</th>
        <th>Accion</th>
        </thead>
        <tbody>
            <?php foreach ($datos as $dato) { ?>

                <tr>
                    <td><?php echo $dato['estudiante_Codigo'] ?></td>
                    <td><?php echo $dato['nombre_comp'] ?></td>
                    <td><a href="<?php echo base_url(); ?>inicioAdministrador/liberarPC/<?php echo $dato['idRegistoestudiante'] ?>/<?php echo $dato['estudiante_Codigo'] ?>">Liberar</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>
    </div>
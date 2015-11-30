<div id="contenido">
    <?php include 'GoogChart.class.php'; ?>
    <div class="intertitulobase2" style="margin-left:100px">Estad&iacute;sticas</div>
    <br/>
    
    <table id="tablaestadisticas" border="1px">
        <thead >
            <tr>
                <th rowspan=2"">Salas</th>
                <th colspan="4"  >Horario de Servicio </th>
            </tr>
            <tr>
                <th  >Ma&ntilde;ana</th>
                <th  >Tarde</th>
                <th >Noche</th>
                <th  >Totales</th>
            </tr>
        </thead>
        <tbody>
            <?php $totalesManana=0; $totalesTarde=0; $totalesNoche=0; $totalesTotales=0;?>
            <?php for ($i = 0; $i < sizeof($manana); $i++) {
                ?>
                <tr>
                    <th ><?php echo $manana[$i]['nom_sala']; ?></th>
                    <td><?php echo $manana[$i]['total']; $totalesManana+=$manana[$i]['total'];?></td>
                    <td><?php echo $tarde[$i]['total']; $totalesTarde+=$tarde[$i]['total'];?></td>
                    <td><?php echo $noche[$i]['total']; $totalesNoche+=$noche[$i]['total'];?></td>
                    <td><?php echo ($noche[$i]['total'] + $manana[$i]['total'] + $tarde[$i]['total']); $totalesTotales+=($noche[$i]['total'] + $manana[$i]['total'] + $tarde[$i]['total']);?></td>
                </tr>
            <?php }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th >Totales</th>
                <th ><?php echo $totalesManana ?></th>
                <th ><?php echo $totalesTarde ?></th>
                <th ><?php echo $totalesNoche ?></th>
                <th ><?php echo $totalesTotales ?></th>
            </tr>
        </tfoot>
    </table>
    <br/>
    <br/>
    <?php $chart = new GoogChart( );
    $color = array( '#003399', '#990000', '##00620C',);
    $grafico = array();
    for($i=0; $i<sizeof($manana); $i++){
        $grafico['Mañana']["'".$manana[$i]['nom_sala']."'"] = $manana[$i]['total'];
        $grafico['Tarde']["'".$tarde[$i]['nom_sala']."'"] = $tarde[$i]['total'];
        $grafico['Noche']["'".$noche[$i]['nom_sala']."'"] = $noche[$i]['total'];
    }
    $chart->setChartAttrs( array(
    'type' => 'bar-vertical',
    'title' => 'Usuarios: ',
    'data' => $grafico,
    'size' => array( 550, 300 ),
    'color' => $color,
    'labelsXY' => true,
    ));
    echo $chart;
    ?>

</div>
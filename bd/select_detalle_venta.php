<?php
    include ("conexion_so.php");           
    $m_cve_vta = $_POST['cve_vta'];
    $query_dv = "EXEC sp_Consulta_detalle_venta '" . $m_cve_vta . "';";
    echo $query_dv;

    try{
        $stm = $conn_sis->prepare($query_dv);
        $stm->execute();
        $resultado_dv = $stm->fetchAll(PDO::FETCH_ASSOC);
             
        echo "<thead>
                <tr style='text-align: center;'>
                    <th>ID Producción</th>
                    <th>Pan</th>
                    <th>Precio venta</th>
                    <th>Piezas entregadas</th>
                    <th>Piezas devueltas</th>
                </tr>
            </thead>
            <tbody id='resultado_detalle'>";

        foreach ($resultado_dv as $dv) {
            echo "<tr>";
            echo "<td align='center' NOWRAP> " . $dv["id_produccion"] . "</td>";
            echo "<td align='center' NOWRAP> " . $dv["pan"] . "</td>";
            echo "<td align='center' NOWRAP>" . round($dv["precio_venta"], 2) . "</td>";
            echo "<td align='center' NOWRAP>" . $dv["piezas_entregadas"] . "</td>";
            echo "<td align='center' NOWRAP>" . $dv["piezas_devueltas"] . "</td>";
        } 
        echo " </tbody>
            <tfoot>
                <tr style='text-align: center;'>
                    <td><strong>ID Producción</strong></td>
                    <td><strong>Pan</strong></td>
                    <td><strong>Precio venta</strong></td>
                    <td><strong>Piezas entregadas</strong></td>
                    <td><strong>Piezas devueltas</strong></td>
                </tr>
            </tfoot>";
    } catch(Exception $error) {
        echo "Error: " . $error;
    }

?>
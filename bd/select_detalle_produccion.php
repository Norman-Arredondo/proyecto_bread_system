<?php
    include ("conexion_so.php");           
    $m_id_produccion = $_POST['id_produccion'];
    $query_produccion = "EXEC sp_Consulta_mp_produccion '" . $m_id_produccion . "';";

    try{
        $stm = $conn_sis->prepare($query_produccion);
        $stm->execute();
        $resultado = $stm->fetchAll(PDO::FETCH_ASSOC);

        echo "<thead>
                <tr style='text-align: center;'>
                    <th>Ingrediente</th>
                    <th>Cantidad</th>
                    <th>Unidad</th>
                    <th>Costo</th>
                </tr>
            </thead>
            <tbody id='resultado_mp_produccion'>";

        foreach ($resultado as $produccion) {
            echo "<tr>";
            echo "<td align='center' NOWRAP> " . $produccion["nombre_mp"] . "</td>";
            echo "<td align='center' NOWRAP>" . round($produccion["cantidad"], 2) . "</td>";
            echo "<td align='center' NOWRAP>" . $produccion["unidad"] . "</td>";
            echo "<td align='center' NOWRAP>" . round($produccion["costo_proporcional"], 2) . "</td>";
            echo "</tr>";
        } 
        echo " </tbody>
            <tfoot>
                <tr style='text-align: center;'>
                    <td><strong>Ingredientes</strong></td>
                    <td><strong>Cantidad</strong></td>
                    <td><strong>Unidad</strong></td>
                    <td><strong>Costo</strong></td>
                </tr>
            </tfoot>";
    } catch(Exception $error) {
        echo "Error: " . $error;
    }

?>
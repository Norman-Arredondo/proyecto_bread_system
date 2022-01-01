<?php
    include ("conexion_so.php");           
    $m_nombre_mp = $_POST['nombre_mp'];
    $query_mp = "EXEC sp_Consulta_Compras_MP '" . $m_nombre_mp . "';";

    try{
        $stm = $conn_sis->prepare($query_mp);
        $stm->execute();
        $resultado_compras = $stm->fetchAll(PDO::FETCH_ASSOC);
                        
        echo "<thead>
                <tr style='text-align: center;'>
                    <th>Acciones</th>
                    <th>Fecha</th>
                    <th>Cantidad</th>
                    <th>Unidad</th>
                    <th>Total</th>
                    <th>Estatus</th>
                </tr>
            </thead>
            <tbody id='resultado_compras'>";

        foreach ($resultado_compras as $compra) {
            echo "<tr>";
            echo "<td align='center'>";
                echo "<a href='javascript:void(0)' id='editar_cmp' name='editar_cmp' data-toggle='modal' data-target='#editar_compra'><i class='far fa-edit' style='color: darkslateblue;'></i></a>"; 
                if($compra["estatus"] == "1"){
                    echo "<a href='javascript:void(0)' id='inhabilitar_cmp' name='inhabilitar_cmp'><i class='fas fa-trash' style='color: darkslateblue;'></i></a>"; 
                } 
                if($compra["estatus"] == "0"){
                    echo "<a href='javascript:void(0)' id='habilitar_cmp' name='habilitar_cmp'><i class='fas fa-check' style='color: darkslateblue;'></i></a>";
                }      
            echo "</td>";
            echo "<td align='center' NOWRAP> " . $compra["fecha_compra"] . "</td>";
            echo "<td align='center' NOWRAP>" . round($compra["cantidad"], 2) . "</td>";
            echo "<td align='center' NOWRAP>" . $compra["unidad"] . "</td>";
            echo "<td align='center' NOWRAP>" . round($compra["precio_total"]) . "</td>";
                if($compra["estatus"] == "1"){
                    echo "<td align='center' NOWRAP>Vigente</td>"; 
                }
                if($compra["estatus"] == "0"){
                    echo "<td align='center' NOWRAP>No vigente</td>"; 
                }
                echo "</tr>";
        } 
        echo " </tbody>
            <tfoot>
                <tr style='text-align: center;'>
                    <td><strong>Acciones</strong></td>
                    <td><strong>Fecha</strong></td>
                    <td><strong>Cantidad</strong></td>
                    <td><strong>Unidad</strong></td>
                    <td><strong>Total</strong></td>
                    <td><strong>Estatus</strong></td>
                </tr>
            </tfoot>";
    } catch(Exception $error) {
        echo "Error: " . $error;
    }

?>
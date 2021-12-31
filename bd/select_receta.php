<?php
    include ("conexion_so.php");           
    $m_pan = $_POST['pan'];
    $query_pan = "EXEC sp_Consulta_Receta '" . $m_pan . "';";

    try{
        $stm = $conn_sis->prepare($query_pan);
        $stm->execute();
        $resultado_receta = $stm->fetchAll(PDO::FETCH_ASSOC);
             
        echo "<thead>
                <tr style='text-align: center;'>
                    <th>Acciones</th>
                    <th>Ingrediente</th>
                    <th>Cantidad</th>
                    <th>Unidad</th>
                    <th>Estatus</th>
                </tr>
            </thead>
            <tbody id='resultado_receta'>";

        foreach ($resultado_receta as $receta) {
            echo "<tr>";
            echo "<td align='center'>";
                    echo "<a href='javascript:void(0)' id='inhabilitar_rec' name='inhabilitar_rec'><i class='fas fa-trash' style='color: darkslateblue;'></i></a>";     
            echo "</td>";
            echo "<td align='center' NOWRAP> " . $receta["nombre_mp"] . "</td>";
            echo "<td align='center' NOWRAP>" . round($receta["cantidad"], 2) . "</td>";
            echo "<td align='center' NOWRAP>" . $receta["unidad"] . "</td>";
                if($receta["estatus"] == "1"){
                    echo "<td align='center' NOWRAP>Vigente</td>"; 
                }
                if($receta["estatus"] == "0"){
                    echo "<td align='center' NOWRAP>No vigente</td>"; 
                }
                echo "</tr>";
        } 
        echo " </tbody>
            <tfoot>
                <tr style='text-align: center;'>
                    <td><strong>Acciones</strong></td>
                    <td><strong>Ingredientes</strong></td>
                    <td><strong>Cantidad</strong></td>
                    <td><strong>Unidad</strong></td>
                    <td><strong>Estatus</strong></td>
                </tr>
            </tfoot>";
    } catch(Exception $error) {
        echo "Error: " . $error;
    }

?>
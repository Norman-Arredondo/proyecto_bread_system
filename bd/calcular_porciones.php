<?php
    include ("conexion_so.php");           
    $pan = $_POST['pan'];
    $porciones = $_POST['piezas'];
    $query = "SET NOCOUNT ON; EXEC sp_Calcular_Porciones '" . $pan . "', " . $porciones .";";

    try{
        $stm = $conn_sis->prepare($query);
        $stm->execute();
        $resultado_porciones = $stm->fetchAll(PDO::FETCH_ASSOC);
                        
        echo "<thead>
                <tr style='text-align: center;'>
                    <th>Ingrediente</th>
                    <th>Cantidad</th>
                    <th>Unidad</th>
                    <th>Costo</th>
                </tr>
            </thead>
            <tbody id='resultado_porciones'>";

        foreach ($resultado_porciones as $porcion) {
            echo "<tr>";
            echo "<td align='center' NOWRAP> " . $porcion["ingrediente"] . "</td>";
            echo "<td align='center' NOWRAP>" . round($porcion["cantidad"], 2) . "</td>";
            echo "<td align='center' NOWRAP>" . $porcion["unidad"] . "</td>";
            echo "<td align='center' NOWRAP>" . round($porcion["costo"], 2) . "</td>";
        } 
        echo " </tbody>
            <tfoot>
                <tr style='text-align: center;'>
                    <td><strong>Ingrediente</strong></td>
                    <td><strong>Cantidad</strong></td>
                    <td><strong>Unidad</strong></td>
                    <td><strong>Total</strong></td>
                </tr>
            </tfoot>";
    } catch(Exception $error) {
        echo "Error: " . $error;
    }

?>
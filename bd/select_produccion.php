<?php
    class produccion{
        function recuperar_produccion(){ 
            include ("conexion_so.php");
            $query = "EXEC sp_Consulta_produccion 2";
            //echo $query;
            try{
                $stm = $conn_sis->prepare($query);
                $stm->execute();
                $resultado = $stm->fetchAll(PDO::FETCH_ASSOC);

                foreach($resultado as $dato){
                    echo "<tr>";
                    echo "<td align='center'>";
                        echo "<a href='javascript:void(0)' id='editar_p' name='editar_p' data-toggle='modal' data-target='#editar_produccion'><i class='far fa-edit' style='color: darkslateblue;'></i></a>"; 
                        if($dato["estatus"] == "1"){
                            echo "<a href='javascript:void(0)' id='inhabilitar_p' name='inhabilitar_p'><i class='fas fa-trash' style='color: darkslateblue;'></i></a>"; 
                        } 
                        if($dato["estatus"] == "0"){
                            echo "<a href='javascript:void(0)' id='habilitar_p' name='habilitar_p'><i class='fas fa-check' style='color: darkslateblue;'></i></a>";
                        }      
                    echo "</td>";
                    echo "<td align='center' NOWRAP>" . $dato["id_produccion"] . "</td>"; 
                    echo "<td align='center' NOWRAP>" . $dato["fecha_produccion"] . "</td>";
                    echo "<td align='center' NOWRAP>" . $dato["rfc_empleado"] . "</td>";
                    echo "<td align='center' NOWRAP>" . $dato["pan"] . "</td>";
                    echo "<td align='center' NOWRAP>" . round($dato["no_piezas"], 2) . "</td>";
                    echo "<td align='center' NOWRAP>" . $dato["id_insumo"] . "</td>";
                    echo "<td align='center' NOWRAP>" . round($dato["porcentaje_ganancia"], 2) . "</td>";
                    echo "<td align='center' NOWRAP>" . round($dato["precio_venta"], 2) . "</td>";
                    if($dato["estatus"] == "1"){
                        echo "<td align='center' NOWRAP>Vigente</td>"; 
                    }
                    if($dato["estatus"] == "0"){
                        echo "<td align='center' NOWRAP>No vigente</td>"; 
                    }
                    echo "</tr>";
                }
            } catch(Exception $error) {
                
            }
        }
    } 
?>

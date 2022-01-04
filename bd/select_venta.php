<?php
    class venta{
        function recuperar_venta(){ 
            include ("conexion_so.php");
            $query = "EXEC sp_Consulta_venta 2";

            try{
                $stm = $conn_sis->prepare($query);
                $stm->execute();
                $resultado = $stm->fetchAll(PDO::FETCH_ASSOC);

                foreach($resultado as $dato){
                    echo "<tr>";
                    echo "<td align='center'>";
                        echo "<a href='javascript:void(0)' id='editar_v' name='editar_v' data-toggle='modal' data-target='#editar_venta'><i class='far fa-edit' style='color: darkslateblue;'></i></a>"; 
                        if($dato["estatus"] == "1"){
                            echo "<a href='javascript:void(0)' id='inhabilitar_v' name='inhabilitar_v'><i class='fas fa-trash' style='color: darkslateblue;'></i></a>"; 
                        } 
                        if($dato["estatus"] == "0"){
                            echo "<a href='javascript:void(0)' id='habilitar_v' name='habilitar_v'><i class='fas fa-check' style='color: darkslateblue;'></i></a>";
                        }      
                    echo "</td>";
                    echo "<td align='center' NOWRAP>" . $dato["cve_vta"] . "</td>";
                    echo "<td align='center' NOWRAP>" . $dato["pto_vta"] . "</td>";
                    echo "<td align='center' NOWRAP>" . $dato["fecha"] . "</td>";
                    echo "<td align='center' NOWRAP>" . round($dato["gastos"], 2) . "</td>"; 
                    echo "<td align='center' NOWRAP>" . round($dato["importe_venta"], 2). "</td>";
                    echo "<td align='center' NOWRAP>" . $dato["rfc_empleado"] . "</td>";
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
<?php
    class pto_vta{
        function recuperar_te(){ 
            include ("conexion_so.php");
            $query = "EXEC sp_Consulta_Tipo_Empleado 2";
            //echo $query;
            try{
                $stm = $conn_sis->prepare($query);
                $stm->execute();
                $resultado = $stm->fetchAll(PDO::FETCH_ASSOC);

                foreach($resultado as $dato){
                    echo "<tr>";
                    echo "<td align='center'>";
                        echo "<a href='javascript:void(0)' id='editar_te' name='editar_te' data-toggle='modal' data-target='#editar_puesto'><i class='far fa-edit' style='color: darkslateblue;'></i></a>"; 
                        if($dato["estatus"] == "1"){
                            echo "<a href='javascript:void(0)' id='inhabilitar_te' name='inhabilitar_te'><i class='fas fa-trash' style='color: darkslateblue;'></i></a>"; 
                        } 
                        if($dato["estatus"] == "0"){
                            echo "<a href='javascript:void(0)' id='habilitar_te' name='habilitar_te'><i class='fas fa-check' style='color: darkslateblue;'></i></a>";
                        }      
                    echo "</td>";
                    echo "<td align='center'>" . $dato["id_tipo_empleado"] . "</td>";
                    echo "<td align='center'>" . $dato["puesto"] . "</td>";
                    echo "<td align='center'>" . $dato["dias_trabajo"] . "</td>";
                    echo "<td align='center'>" . $dato["sueldo_quincenal"] . "</td>";
                    if($dato["estatus"] == "1"){
                        echo "<td align='center'>Vigente</td>"; 
                    }
                    if($dato["estatus"] == "0"){
                        echo "<td align='center'>No vigente</td>"; 
                    }
                    echo "</tr>";
                }
            } catch(Exception $error) {
                
            }
        }
    } 
?>

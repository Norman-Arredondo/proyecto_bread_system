<?php
    class pto_vta{
        function recuperar(){ 
            include ("conexion_so.php");
            $query = "EXEC sp_Consulta_ptovta 2";
            //echo $query;
            try{
                $stm = $conn_sis->prepare($query);
                $stm->execute();
                $resultado = $stm->fetchAll(PDO::FETCH_ASSOC);

                foreach($resultado as $dato){
                    echo "<tr>";
                    echo "<td align='center'>";
                        echo "<a href='javascript:void(0)' id='editar' name='editar'><i class='far fa-edit' style='color: darkslateblue;'></i></a>"; 
                        if($dato["estatus"] == "1"){
                            echo "<a href='javascript:void(0)' id='inhabilitar' name='inhabilitar'><i class='fas fa-trash' style='color: darkslateblue;'></i></a>"; 
                        } 
                        if($dato["estatus"] == "0"){
                            echo "<a href='javascript:void(0)' id='habilitar' name='habilitar'><i class='fas fa-check' style='color: darkslateblue;'></i></a>";
                        }      
                    echo "</td>";
                    echo "<td>" . $dato["cve_pto"] . "</td>";
                    echo "<td>" . $dato["pto_vta"] . "</td>";
                    echo "<td>" . $dato["calle"] . "</td>";
                    echo "<td>" . $dato["colonia"] . "</td>";
                    echo "<td>" . $dato["no_exterior"] . "</td>";
                    echo "<td>" . $dato["no_interior"] . "</td>";
                    echo "<td>" . $dato["alcaldia"] . "</td>";
                    echo "<td>" . $dato["codigo_postal"] . "</td>";
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

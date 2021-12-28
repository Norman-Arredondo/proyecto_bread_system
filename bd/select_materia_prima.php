<?php
    class materia_prima{
        function recuperar_materia_prima(){ 
            include ("conexion_so.php");           
            $query_mp = "EXEC sp_Consulta_MP;";

            try{
                $stm = $conn_sis->prepare($query_mp);
                $stm->execute();
                $resultado_mp = $stm->fetchAll(PDO::FETCH_ASSOC);
                        
                foreach ($resultado_mp as $dato) {
                    echo "<tr>";
                        echo "<td align='center'>";
                            echo "<a href='javascript:void(0)' id='editar_mp' name='editar_mp' data-toggle='modal' data-target='#editar_mp'><i class='far fa-edit' style='color: darkslateblue;'></i></a>"; 
                            if($dato["estatus"] == "1"){
                                echo "<a href='javascript:void(0)' id='inhabilitar_mp' name='inhabilitar_mp'><i class='fas fa-trash' style='color: darkslateblue;'></i></a>"; 
                            } 
                            if($dato["estatus"] == "0"){
                                echo "<a href='javascript:void(0)' id='habilitar_mp' name='habilitar_mp'><i class='fas fa-check' style='color: darkslateblue;'></i></a>";
                            }      
                        echo "</td>";
                        echo "<td align='center' NOWRAP>" . $dato["nombre_mp"] . "</td>";
                        echo "<td align='center' NOWRAP>" . $dato["existencia"] . "</td>";
                        echo "<td align='center' NOWRAP>" . $dato["stock_minimo"] . "</td>";
                        echo "<td align='center' NOWRAP>" . $dato["stock_maximo"] . "</td>";
                        if($dato["estatus"] == "1"){
                            echo "<td align='center' NOWRAP>Vigente</td>"; 
                        }
                        if($dato["estatus"] == "0"){
                            echo "<td align='center' NOWRAP>No vigente</td>"; 
                        }
                    echo "</tr>";
                }
                echo "\nEncontrado";
            } catch(Exception $error) {
                echo "Error: " . $error;
            }
        }
    }
?>
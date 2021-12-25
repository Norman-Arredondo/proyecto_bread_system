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
                        echo "<a href='javascript:void(0)' id='editar' name='editar' data-toggle='modal' data-target='#editar_punto'><i class='far fa-edit' style='color: darkslateblue;'></i></a>"; 
                        if($dato["estatus"] == "1"){
                            echo "<a href='javascript:void(0)' id='inhabilitar' name='inhabilitar'><i class='fas fa-trash' style='color: darkslateblue;'></i></a>"; 
                        } 
                        if($dato["estatus"] == "0"){
                            echo "<a href='javascript:void(0)' id='habilitar' name='habilitar'><i class='fas fa-check' style='color: darkslateblue;'></i></a>";
                        }      
                    echo "</td>";
                    echo "<td align='center' NOWRAP>" . $dato["cve_pto"] . "</td>";
                    echo "<td align='center' NOWRAP>" . $dato["pto_vta"] . "</td>";
                    echo "<td align='center' NOWRAP>" . $dato["calle"] . "</td>";
                    echo "<td align='center' NOWRAP>" . $dato["colonia"] . "</td>";
                    echo "<td align='center' NOWRAP>" . $dato["no_exterior"] . "</td>";
                    echo "<td align='center' NOWRAP>" . $dato["no_interior"] . "</td>";
                    echo "<td align='center' NOWRAP>" . $dato["alcaldia"] . "</td>";
                    echo "<td align='center'>" . $dato["codigo_postal"] . "</td>";
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

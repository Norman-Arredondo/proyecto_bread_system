<?php
    class pto_vta{
        function recuperar(){ 
            include ("Conexion_so.php");
            $query = "EXEC sp_Consulta_ptovta 2";
            //echo $query;
            try{
                $stm = $conn_sis->prepare($query);
                $stm->execute();
                $resultado = $stm->fetchAll(PDO::FETCH_ASSOC);

                foreach($resultado as $dato){
                    echo "<tr>";
                    echo "<td>
                            <a href='#'><i class='far fa-edit' style='color: darkslateblue;'></i></a> 
                            <a href='#'><i class='fas fa-trash' style='color: darkslateblue;'></i></a>
                        </td>";
                    echo "<td>" . $dato["cve_pto"] . "</td>";
                    echo "<td>" . $dato["pto_vta"] . "</td>";
                    echo "<td>" . $dato["calle"] . "</td>";
                    echo "<td>" . $dato["colonia"] . "</td>";
                    echo "<td>" . $dato["no_exterior"] . "</td>";
                    echo "<td>" . $dato["no_interior"] . "</td>";
                    echo "<td>" . $dato["alcaldia"] . "</td>";
                    echo "<td>" . $dato["codigo_postal"] . "</td>";
                    echo "</tr>";
            }
            } catch(Exception $error) {
                
            }
        }
    } 
?>

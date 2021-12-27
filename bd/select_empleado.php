<?php
    class empleado{
        function recuperar_empleado(){ 
            include ("conexion_so.php");
            $query = "EXEC sp_Consulta_Empleado 2";
 
            try{
                $stm = $conn_sis->prepare($query);
                $stm->execute();
                $resultado = $stm->fetchAll(PDO::FETCH_ASSOC);

                foreach($resultado as $dato){
                    echo "<tr>";
                    echo "<td align='center'>";
                        echo "<a href='javascript:void(0)' id='editar_e' name='editar_e' data-toggle='modal' data-target='#editar_empleado'><i class='far fa-edit' style='color: darkslateblue;'></i></a>"; 
                        if($dato["estatus"] == "1"){
                            echo "<a href='javascript:void(0)' id='inhabilitar_e' name='inhabilitar_e'><i class='fas fa-trash' style='color: darkslateblue;'></i></a>"; 
                        } 
                        if($dato["estatus"] == "0"){
                            echo "<a href='javascript:void(0)' id='habilitar_e' name='habilitar_e'><i class='fas fa-check' style='color: darkslateblue;'></i></a>";
                        }      
                    echo "</td>";
                    echo "<td align='center' NOWRAP>" . $dato["rfc_empleado"] . "</td>";
                    echo "<td align='center' NOWRAP>" . $dato["puesto"] . "</td>";
                        if($dato["contrasenia"] != "null"){
                            echo "<td align='center' NOWRAP style='-webkit-text-security: disc; '>" . $dato["contrasenia"] ."</td>";
                        } else {
                            echo "<td align='center' NOWRAP> N/A </td>";
                        }   
                    echo "<td align='center' NOWRAP>" . $dato["hora_entrada"] . "</td>";
                    echo "<td align='center' NOWRAP>" . $dato["hora_salida"] . "</td>";
                    echo "<td align='center' NOWRAP>" . $dato["nombre"] . "</td>";
                    echo "<td align='center' NOWRAP>" . $dato["apellido_p"] . "</td>";
                    echo "<td align='center' NOWRAP>" . $dato["apellido_m"] . "</td>";
                    echo "<td align='center' NOWRAP>" . $dato["telefono"] . "</td>";
                    echo "<td align='center' NOWRAP>" . $dato["edad"] . "</td>";
                    echo "<td align='center' NOWRAP>" . $dato["sexo"] . "</td>";
                    echo "<td align='center' NOWRAP>" . $dato["calle"] . "</td>";
                    echo "<td align='center' NOWRAP>" . $dato["colonia"] . "</td>";
                    echo "<td align='center' NOWRAP>" . $dato["no_interior"] . "</td>";
                    echo "<td align='center' NOWRAP>" . $dato["no_exterior"] . "</td>";
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
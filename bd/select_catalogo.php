<?php
    class catalogo{
        function recuperar_catalogo(){ 
            include ("conexion_so.php");
            $query = "EXEC sp_Consulta_pan 2";
    
            try{
                $stm = $conn_sis->prepare($query);
                $stm->execute();
                $resultado = $stm->fetchAll(PDO::FETCH_ASSOC);

                foreach($resultado as $dato){
                    echo "<tr>";
                    echo "<td align='center'>";
                        echo "<a href='javascript:void(0)' id='editar_pan' name='editar_pan' data-toggle='modal' data-target='#editar_catalogo'><i class='far fa-edit' style='color: darkslateblue;'></i></a>"; 
                        if($dato["estatus"] == "1"){
                            echo "<a href='javascript:void(0)' id='inhabilitar_pan' name='inhabilitar_pan'><i class='fas fa-trash' style='color: darkslateblue;'></i></a>"; 
                        } 
                        if($dato["estatus"] == "0"){
                            echo "<a href='javascript:void(0)' id='habilitar_pan' name='habilitar_pan'><i class='fas fa-check' style='color: darkslateblue;'></i></a>";
                        }      
                    echo "</td>";
                    echo "<td align='center' NOWRAP>" . $dato["pan"] . "</td>";
                    echo "<td align='center' NOWRAP>" . $dato["descripcion"] . "</td>";
                    echo "<td align='center' NOWRAP>" . $dato["piezas"] . "</td>";
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
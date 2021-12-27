<?php
    class tipo_empleado{
        function recuperar_puestos(){ 
            include ("conexion_so.php");
            $query = "select id_tipo_empleado, puesto from tipo_empleado";

            try{
                $stm = $conn_sis->prepare($query);
                $stm->execute();
                $resultado = $stm->fetchAll(PDO::FETCH_ASSOC);

                foreach($resultado as $dato){
                    echo "<option value='". $dato['id_tipo_empleado'] ."'>" . $dato['puesto']. "</option>";
                }
            } catch(Exception $error) {
                
            }
        }
    } 
?>

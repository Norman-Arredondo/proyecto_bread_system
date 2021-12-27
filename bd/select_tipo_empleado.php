<?php
    class tipo_empleado{
        function recuperar_puestos(){ 
            include ("conexion_so.php");
            $query = "EXEC sp_Combo_Empleado";

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

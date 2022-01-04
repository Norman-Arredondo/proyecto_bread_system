<?php
    class puntos_venta{
        function recuperar_puntos(){ 
            include ("conexion_so.php");
            $query = "EXEC sp_Combo_Puntos";

            try{
                $stm = $conn_sis->prepare($query);
                $stm->execute();
                $resultado = $stm->fetchAll(PDO::FETCH_ASSOC);

                foreach($resultado as $dato){
                    echo "<option value='". $dato['cve_pto'] ."'>" . $dato['pto_vta']. "</option>";
                }
            } catch(Exception $error) {
                
            }
        }
    } 
?>
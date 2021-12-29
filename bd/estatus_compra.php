<?php 
    include ("conexion_so.php");

    try{
        if($_POST){
            $c_nombre_mp = $_POST['nombre_mp'];
            $fecha_compra = $_POST['fecha_compra'];
            $estatus = $_POST['estatus'];
            
            try{
                $query = "EXEC sp_CamEst_CMP '".$c_nombre_mp."', '".$fecha_compra."', ".$estatus.";";
                $stmt = $conn_sis->prepare($query);
                $stmt->execute();
                $stmt = null;

                if($estatus == 1){
                    echo "CMP Vigente";
                } else if($estatus == 0){
                    echo "CMP No vigente";
                } 
            } catch(Exception $errorsql){
                echo "Error: " . $errorsql;
            }
        }
    } catch (Exception $error){
        echo "Error:" . $error;
    }
?>
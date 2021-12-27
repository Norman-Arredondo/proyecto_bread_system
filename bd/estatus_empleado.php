<?php 
    include ("conexion_so.php");

    try{
        if($_POST){
            $estatus = $_POST['estatus'];
            $rfc_empleado = $_POST['rfc_empleado'];
            
            try{
                $query = "EXEC sp_CamEst_Empleado '".$rfc_empleado."', ".$estatus.";";
                $stmt = $conn_sis->prepare($query);
                $stmt->execute();
                $stmt = null;

                if($estatus == 1){
                    echo "Vigente";
                } else if($estatus == 0){
                    echo "No vigente";
                } 
            } catch(Exception $errorsql){
                echo "Error: " . $errorsql;
            }
        }
    } catch (Exception $error){
        echo "Error:" . $error;
    }
?>
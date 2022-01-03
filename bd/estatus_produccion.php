<?php 
    include ("conexion_so.php");

    try{
        if($_POST){
            $id_produccion = $_POST['id_produccion'];
            $estatus = $_POST['estatus'];
            
            try{
                $query = "EXEC sp_CamEst_Produccion '".$id_produccion."', ".$estatus.";";
                $stmt = $conn_sis->prepare($query);
                $stmt->execute();
                $stmt = null;

                if($estatus == 1){
                    echo "Produccion Vigente";
                } else if($estatus == 0){
                    echo "Produccion No Vigente";
                } 
            } catch(Exception $errorsql){
                echo "Error: " . $errorsql;
            }
        }
    } catch (Exception $error){
        echo "Error:" . $error;
    }
?>
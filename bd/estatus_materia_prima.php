<?php 
    include ("conexion_so.php");

    try{
        if($_POST){
            $nombre_mp = $_POST['nombre_mp'];
            $estatus = $_POST['estatus'];
            
            try{
                $query = "EXEC sp_CamEst_MP '".$nombre_mp."', ".$estatus.";";
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
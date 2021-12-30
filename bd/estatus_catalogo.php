<?php 
    include ("conexion_so.php");

    try{
        if($_POST){
            $cat_pan = $_POST['pan'];
            $cat_estatus = $_POST['estatus'];
            
            try{
                $query = "EXEC sp_CamEst_Catalogo '".$cat_pan."', ".$cat_estatus.";";
                $stmt = $conn_sis->prepare($query);
                $stmt->execute();
                $stmt = null;

                if($cat_estatus == 1){
                    echo "Pan Vigente";
                } else if($cat_estatus == 0){
                    echo "Pan No vigente";
                } 
            } catch(Exception $errorsql){
                echo "Error: " . $errorsql;
            }
        }
    } catch (Exception $error){
        echo "Error:" . $error;
    }
?>
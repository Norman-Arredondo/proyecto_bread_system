<?php 
    include ("conexion_so.php");

    try{
        if($_POST){
            $estatus = $_POST['estatus'];
            $cve_pto = $_POST['cve_pto'];

            //echo "Datos recibidos: Clave: ". $cve_pto ."\nEstatus:" . $estatus;
            
            try{
                $query = "EXEC sp_CamEst_ptovta '".$cve_pto."', ".$estatus.";";
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
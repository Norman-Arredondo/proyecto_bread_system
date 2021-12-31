<?php 
    include ("conexion_so.php");

    try{
        if($_POST){
            $mr_pan = $_POST['pan'];
            $mr_ingrediente = $_POST['ingrediente'];
            
            try{
                $query = "EXEC sp_Eliminar_Ingrediente '".$mr_pan."', '".$mr_ingrediente."';";
                $stmt = $conn_sis->prepare($query);
                $stmt->execute();
                $stmt = null;

                echo "Ing eliminado";
            } catch(Exception $errorsql){
                echo "Error: " . $errorsql;
            }
        }
    } catch (Exception $error){
        echo "Error:" . $error;
    }
?>
<?php 
    include ("conexion_so.php");

    try{
        if($_POST){
            //echo "<pre>";   print_r($_POST);  echo "</pre>";
            $id_tipo_empleado = $_POST['id_tipo_empleado'];
            $puesto = $_POST['te_puesto'];
            $sueldo_quincenal = $_POST['sueldo_quincenal'];
            $dias_trabajo = $_POST['dias_trabajo'];

            try{
                $query = "sp_Registro_Tipo_Empleado '".$id_tipo_empleado."', '".$puesto."', '".$dias_trabajo."', ".$sueldo_quincenal.";";
                $stmt = $conn_sis->prepare($query);
                $stmt->execute();
                $stmt = null;
                echo "Guardado"; 
            } catch(Exception $errorsql){
                echo "Error al guardar: " . $errorsql;
            }
        }
    } catch (Exception $error){
        echo "Error:" . $error;
    }
?>
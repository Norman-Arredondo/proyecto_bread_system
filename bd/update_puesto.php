<?php 
    include ("conexion_so.php");

    try{
        if($_POST){
            $m_id_tipo_empleado = $_POST['id_tipo_empleado'];
            $m_puesto = $_POST['te_puesto'];
            $m_sueldo_quincenal = $_POST['sueldo_quincenal'];
            $m_dias_trabajo = $_POST['dias_trabajo'];

            try{
                $query = "EXEC sp_Modificar_Tipo_Empleado '".$m_id_tipo_empleado."', '".$m_puesto."', '".$m_dias_trabajo."', ".$m_sueldo_quincenal.";";
                $stmt = $conn_sis->prepare($query);
                $stmt->execute();
                $stmt = null;
                echo "Modificado";
            } catch(Exception $errorsql){
                echo "Error al modificar: " . $errorsql;
            }
        }
    } catch (Exception $error){
        echo "Error:" . $error;
    }
?>
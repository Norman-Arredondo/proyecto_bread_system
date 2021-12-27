<?php 
    include ("conexion_so.php");

    try{
        if($_POST){
            $m_rfc_empleado = $_POST['rfc_empleado'];
            $m_puesto = $_POST['e_puesto'];
            $m_contrasenia = $_POST['contrasenia'];
            $m_hora_entrada = $_POST['hora_entrada'];
            $m_hora_salida = $_POST['hora_salida'];
            $m_nombre = $_POST['nombre'];
            $m_apellido_p = $_POST['apellido_p'];
            $m_apellido_m = $_POST['apellido_m'];
            $m_telefono = $_POST['telefono'];
            $m_edad = $_POST['edad'];
            $m_sexo = $_POST['sexo'];
            $m_calle = $_POST['calle'];
            $m_colonia = $_POST['colonia'];
            $m_alcaldia = $_POST['alcaldia'];
            $m_no_interior = $_POST['no_interior'];
            $m_no_exterior = $_POST['no_exterior'];
            $m_codigo_postal = $_POST['codigo_postal'];

            try{
                $query = "EXEC sp_Modificar_Empleado '".$m_rfc_empleado."', " . 
                                                    "'".$m_puesto."', " . 
                                                    "'".$m_contrasenia."', " . 
                                                    "'".$m_hora_entrada.":00', " .
                                                    "'".$m_hora_salida.":00', " . 
                                                    "'".$m_nombre."', " . 
                                                    "'".$m_apellido_p."', " .
                                                    "'".$m_apellido_m."', " .
                                                    "".$m_telefono.", " .
                                                    "".$m_edad.", " .
                                                    "'".$m_sexo."'," . 
                                                    "'".$m_calle."', " . 
                                                    "'".$m_colonia."', " . 
                                                    "'".$m_alcaldia."', " . 
                                                    "'".$m_no_interior."', " .
                                                    "'".$m_no_exterior."', " .
                                                    "".$m_codigo_postal.";";

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
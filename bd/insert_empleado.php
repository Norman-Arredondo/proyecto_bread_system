<?php 
    include ("conexion_so.php");

    try{
        if($_POST){
            //echo "<pre>";   print_r($_POST);  echo "</pre>";
            $rfc_empleado = $_POST['rfc_empleado'];
            $puesto = $_POST['e_puesto'];
            $contrasenia = $_POST['contrasenia'];
            $hora_entrada = $_POST['hora_entrada'];
            $hora_salida = $_POST['hora_salida'];
            $nombre = $_POST['nombre'];
            $apellido_p = $_POST['apellido_p'];
            $apellido_m = $_POST['apellido_m'];
            $telefono = $_POST['telefono'];
            $edad = $_POST['edad'];
            $sexo = $_POST['sexo'];
            $calle = $_POST['calle'];
            $colonia = $_POST['colonia'];
            $alcaldia = $_POST['alcaldia'];
            $no_interior = $_POST['no_interior'];
            $no_exterior = $_POST['no_exterior'];
            $codigo_postal = $_POST['codigo_postal'];

            try{
                $query = "sp_Registro_Empleado '".$rfc_empleado."', " . 
                                               "'".$puesto."', " . 
                                               "'".$contrasenia."', " . 
                                               "'".$hora_entrada.":00', " .
                                               "'".$hora_salida.":00', " . 
                                               "'".$nombre."', " . 
                                               "'".$apellido_p."', " .
                                               "'".$apellido_m."', " .
                                               "".$telefono.", " .
                                               "".$edad.", " .
                                               "'".$sexo."'," . 
                                               "'".$calle."', " . 
                                               "'".$colonia."', " . 
                                               "'".$alcaldia."', " . 
                                               "'".$no_interior."', " .
                                               "'".$no_exterior."', " .
                                               "".$codigo_postal.";";
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
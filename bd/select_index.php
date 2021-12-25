<?php 
    include ("conexion_so.php");

    try{
        if($_POST){
            $rfc_empleado = $_POST['rfc_empleado'];
            $contrasenia = $_POST['contrasenia'];

            $query = "EXEC sp_Consulta_Contrasenia '".$rfc_empleado."', '".$contrasenia."';";

            try{
                $stm = $conn_sis->prepare($query);
                $stm->execute();
                $resultado = $stm->fetchAll(PDO::FETCH_ASSOC);

                foreach($resultado as $dato){
                    if($dato["contrasenia"] == $contrasenia and $dato["estatus"] == 1){
                        $estatus_sol = "Acceso concedido"; 
                    } else if($dato["contrasenia"] == $contrasenia and $dato["estatus"] == 0){
                        $estatus_sol = "Usuario inhabilitado"; 
                    } else if($dato["contrasenia"] != $contrasenia){
                        $estatus_sol = "Acceso denegado"; 
                    }
                    echo $estatus_sol;
                }
            } catch(Exception $error) {
                
            }
        }
    } catch (Exception $error){
        echo "Error:" . $error;
    }
?>
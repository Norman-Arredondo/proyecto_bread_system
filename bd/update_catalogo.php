<?php 
    include ("conexion_so.php");

    try{
        if($_POST){
            $m_pan = $_POST['pan'];
            $m_descripcion = $_POST['descripcion'];
            $m_piezas = $_POST['piezas'];
            $m_ingredientes = json_decode($_POST['ingredientes'], true);

            try{
                $query_pan = "EXEC sp_Modificar_Catalogo '".$m_pan."', '".$m_descripcion."', ".$m_piezas.";";
                $stmt_pan = $conn_sis->prepare($query_pan);
                $stmt_pan->execute();
                $stmt_pan = null;

                foreach ($m_ingredientes as $fila) {
                    $i_pan = $fila['pan'];
                    $i_materia_prima = $fila['nombre_mp'];
                    $i_cantidad = $fila['cantidad'];
                    $i_unidad = $fila['unidad'];
                    
                    $query_recetario = "EXEC sp_Modificar_Recetario'" . $i_pan . "', '" . $i_materia_prima . "'," . $i_cantidad . ", '" . $i_unidad."';";
                    $stmt_recetario = $conn_sis->prepare($query_recetario);
                    $stmt_recetario->execute();
                    $stmt_recetario = null;
                }

                echo "Catalogo Guardado";
            } catch(Exception $errorsql){
                echo "Error al modificar: " . $errorsql;
            }
        }
    } catch (Exception $error){
        echo "Error:" . $error;
    }
?>
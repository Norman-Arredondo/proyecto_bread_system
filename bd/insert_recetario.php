<?php 
    include ("conexion_so.php");

    try{
        if($_POST){
            $pan = $_POST['pan'];
            $piezas = $_POST['piezas'];
            $descripcion = $_POST['descripcion'];
            $ingredientes = json_decode($_POST['ingredientes'], true);

            try{
                $query_pan = "EXEC sp_Registro_pan '" . $pan . "', '" . $descripcion . "', " . $piezas . ";";
                $stmt_pan = $conn_sis->prepare($query_pan);
                $stmt_pan->execute();
                $stmt_pan = null;

                
                foreach ($ingredientes as $fila) {
                    $i_pan = $fila['pan'];
                    $i_materia_prima = $fila['materia_prima'];
                    $i_cantidad = $fila['cantidad'];
                    $i_unidad = $fila['unidad'];
                    
                    $query_recetario = "EXEC sp_Registro_receta '" . $i_pan . "', '" . $i_materia_prima . "'," . $i_cantidad . ", '" . $i_unidad."';";
                    $stmt_recetario = $conn_sis->prepare($query_recetario);
                    $stmt_recetario->execute();
                    $stmt_recetario = null;
                }

                echo "Receta guardada";
            } catch(Exception $errorsql){
                echo "Error al guardar: " . $errorsql;
            }
        }
    } catch (Exception $error){
        echo "Error:" . $error;
    }
?>
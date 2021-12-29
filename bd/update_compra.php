<?php 
    include ("conexion_so.php");

    try{
        if($_POST){
            $icm_nombre_mp = $_POST['nombre_mp'];
            $icm_fecha_compra = $_POST['fecha_compra'];
            $icm_cantidad = $_POST['cantidad'];
            $icm_unidad = $_POST['unidad'];
            $icm_contenido_neto = $_POST['contenido_neto'];
            $icm_precio_unitario = $_POST['precio_unitario'];
            $icm_precio_total = $_POST['precio_total'];

            try{
                $query = "EXEC sp_Modificar_CompraMP '".$icm_nombre_mp."', '".
                                                        $icm_fecha_compra."', ".
                                                        $icm_cantidad.", '".
                                                        $icm_unidad."', ".
                                                        $icm_contenido_neto.", ".
                                                        $icm_precio_unitario.",".
                                                        $icm_precio_total.";";
                $stmt = $conn_sis->prepare($query);
                $stmt->execute();
                $stmt = null;
                echo "Compra guardada";
            } catch(Exception $errorsql){
                echo "Error al modificar: " . $errorsql;
            }
        }
    } catch (Exception $error){
        echo "Error:" . $error;
    }
?>
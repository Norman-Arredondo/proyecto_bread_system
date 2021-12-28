<?php 
    include ("conexion_so.php");

    try{
        if($_POST){
            $nombre_mp = $_POST['nombre_mp'];
            $existencia = $_POST['cantidad'];
            $stock_minimo = $_POST['cantidad'];
            $stock_maximo = $_POST['cantidad'];
            $fecha_compra = $_POST['fecha_compra'];
            $cantidad = $_POST['cantidad'];
            $unidad = $_POST['unidad'];
            $contenido_neto = $_POST['contenido_neto'];
            $precio_unitario = $_POST['precio_unitario'];
            $precio_total = $_POST['precio_total'];
            
            try{
                $query = "EXEC sp_Registro_MateriaPrima  '".$nombre_mp."', ".
                                                            $existencia.", ".
                                                            $stock_minimo.", ".
                                                            $stock_maximo.", '".
                                                            $fecha_compra."', ".
                                                            $cantidad.", '".
                                                            $unidad."', ".
                                                            $contenido_neto.", ".
                                                            $precio_unitario . ", ".
                                                            $precio_total.";";
                
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
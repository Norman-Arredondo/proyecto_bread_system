<?php 
    include ("conexion_so.php");

    try{
        if($_POST){
            $cve_vta = $_POST['cve_vta'];
            $pto_vta = $_POST['pto_vta'];
            $fecha = $_POST['fecha'];
            $gastos = $_POST['gastos'];
            $importe_venta = $_POST['importe_venta'];
            $rfc_empleado = $_POST['rfc_empleado'];
            $detalle_venta = json_decode($_POST['detalle_venta'], true);

            try{
                $query_venta = "EXEC sp_Registro_venta '" . $cve_vta . "', '" . 
                                                            $pto_vta . "', '" . 
                                                            $fecha . "', " .
                                                            $gastos . ", " . 
                                                            $importe_venta . ",'".
                                                            $rfc_empleado ."';";
                $stmt_venta = $conn_sis->prepare($query_venta);
                $stmt_venta->execute();
                $stmt_venta = null; 
                
                foreach ($detalle_venta as $fila) {
                    $i_cve_vta = $fila['cve_vta'];
                    $i_punto = $fila['pto_vta'];
                    $i_id_produccion = $fila['id_produccion'];
                    $i_piezas_entregadas = $fila['piezas_entregadas'];
                    $i_piezas_devueltas = $fila['piezas_devueltas'];
                    
                    $query_detalle = "EXEC sp_Registro_detalle_venta '" . $i_cve_vta . "', '" . 
                                                                          $i_punto . "', '" .
                                                                          $i_id_produccion . "', " .
                                                                          $i_piezas_entregadas . ", " .
                                                                          $i_piezas_devueltas . ";";
                    $stmt_detalle = $conn_sis->prepare($query_detalle);
                    $stmt_detalle->execute();
                    $stmt_detalle = null;
                }

                echo "Venta guardada";
            } catch(Exception $errorsql){
                echo "Error al guardar: " . $errorsql;
            }
        }
    } catch (Exception $error){
        echo "Error:" . $error;
    }
?>
<?php 
    include ("conexion_so.php");

    try{
        if($_POST){
            $id_insumo = $_POST['id_insumo'];
            $fecha = $_POST['fecha'];
            $importe_gas = $_POST['importe_gas'];
            $importe_luz = $_POST['importe_luz'];
            $importe_gasolina = $_POST['importe_gasolina'];
            $importe_total = $_POST['total_insumos'];
            $id_produccion = $_POST['id_produccion'];
            $rfc_empleado = $_POST['rfc_empleado'];
            $pan = $_POST['pan'];
            $no_piezas = $_POST['piezas'];
            $ganancia = $_POST['ganancia'];
            $precio_venta = $_POST['precio_venta'];
            $mp_produccion = json_decode($_POST['cantidades'], true);

            try{
                $query_insumos = "EXEC sp_Registro_insumos '" . $id_insumo . "', '" . 
                                                                $fecha . "', " . 
                                                                $importe_gas . ", " .
                                                                $importe_luz . ", " .
                                                                $importe_gasolina . ", " .
                                                                $importe_total . ";";
                $stmt_insumos = $conn_sis->prepare($query_insumos);
                $stmt_insumos->execute();
                $stmt_insumos = null;

                $query_produccion = "EXEC sp_Registro_produccion '" . $id_produccion . "', '" . 
                                                                      $fecha . "', '" . 
                                                                      $rfc_empleado . "', '" .
                                                                      $pan. "', " .
                                                                      $no_piezas . ", '" .
                                                                      $id_insumo . "', " .
                                                                      $ganancia . ", " .
                                                                      $precio_venta .";";
                $stmt_produccion = $conn_sis->prepare($query_produccion);
                $stmt_produccion->execute();
                $stmt_produccion = null;
                
                foreach ($mp_produccion as $fila) {
                    $mpp_id_produccion = $fila['mpp_id_produccion'];
                    $mpp_id_mp_produccion = $fila['mpp_id_mp_produccion'];
                    $mpp_nombre_mp = $fila['nombre_mp'];
                    $mpp_cantidad = $fila['cantidad'];
                    $mpp_unidad = $fila['unidad'];
                    $mpp_costo = $fila['costo_mp'];
                    
                    $query_mpp = "EXEC sp_Registro_mp_produccion '" . $mpp_id_produccion . "', '" .
                                                                      $mpp_id_mp_produccion . "', '" .
                                                                      $mpp_nombre_mp . "', " . 
                                                                      $mpp_cantidad . ", '" .
                                                                      $mpp_unidad . "', " .
                                                                      $mpp_costo . ";";
                    $stmt_mpp = $conn_sis->prepare($query_mpp);
                    $stmt_mpp->execute();
                    $stmt_mpp = null;
                }

                echo "Orden guardada";
            } catch(Exception $errorsql){
                echo "Error al guardar: " . $errorsql;
            }
        }
    } catch (Exception $error){
        echo "Error:" . $error;
    }
?>
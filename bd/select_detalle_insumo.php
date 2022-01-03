<?php
    include ("conexion_so.php");           
    $m_id_insumo = $_POST['id_insumo'];
    $query_produccion = "EXEC sp_Consulta_insumo '" . $m_id_insumo . "';";
    $datos_insumo = array();

    try{
        $stm = $conn_sis->prepare($query_produccion);
        $stm->execute();
        $resultado = $stm->fetchAll(PDO::FETCH_ASSOC);

        foreach ($resultado as $insumo) {
            $datos_insumo[] = $insumo["importe_gas"];
            $datos_insumo[] = $insumo["importe_luz"];
            $datos_insumo[] = $insumo["importe_gasolina"];
            $datos_insumo[] = $insumo["importe_total"];
        }

        echo json_encode($datos_insumo);        
    } catch(Exception $error) {
        echo "Error: " . $error;
    }

?>
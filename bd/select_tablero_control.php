<?php 
class tablero {
    // Ingreso total anual
	function recuperar_IngresoTotalAnual(){
        include("conexion_dw.php");

        $query = "EXEC sp_TotalVentasAnio";
        $stm = $conn_sis->prepare($query);
        $stm->execute();
        $resultado = $stm->fetchAll(PDO::FETCH_ASSOC);
            
        foreach($resultado as $dato){
            echo "$ ". round($dato['monto_total'], 2) . "";
        }

        $stm = null;
    }

    // Punto de venta con más vents
    function recuperar_PuntoMasVentas(){
        include("conexion_dw.php");

        $query = "EXEC sp_PuntoMasVentas"; 
        $stm = $conn_sis->prepare($query);
        $stm->execute();
        $resultado = $stm->fetchAll(PDO::FETCH_ASSOC);
            
        foreach($resultado as $dato){
            echo "". $dato['pto_vta']. "";
        }

        $stm = null;
    }

    // Punto de venta con más vents
    function recuperar_PanMasVendido(){
        include("conexion_dw.php");

        $query = "EXEC sp_PanMasVendido"; 
        $stm = $conn_sis->prepare($query);
        $stm->execute();
        $resultado = $stm->fetchAll(PDO::FETCH_ASSOC);
            
        foreach($resultado as $dato){
            echo "". $dato['pan']. "";
        }

        $stm = null;
    }

    //grafica ventas mensual total 
	function recuperar_IngresosMes(){
        include("conexion_dw.php");

        $ingresos = array();
        $cont = 1;

        while ($cont <= 12) {
            $query = "EXEC sp_IngresosMes " . $cont;
            $stm = $conn_sis->prepare($query);
            $stm->execute();
            $resultado = $stm->fetchAll(PDO::FETCH_ASSOC);
                
            foreach($resultado as $dato){
                if(is_null($dato['Total'])){
                    $ingresos[$cont] = '0'; 
                } else {
                    $ingresos[$cont] = $dato['Total']; 
                }
            }
            $cont++;
        }

        $data = implode(',',$ingresos);

        echo "<canvas id='ingresos_mes';> </canvas>";
        echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js'></script>";

        echo "<script>                    
                var grafica = document.getElementById('ingresos_mes').getContext('2d');
                var ingresos_mes = new Chart( grafica, {
                    type: 'bar',
                    data: {
                        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                        datasets: [{
                            label: 'Ingresos por mes',
                            data: [" . $data . "],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    }
                }); 
            ";
        echo "</script>";
        $stm = null;
    }

    function recuperar_PanTienda($punto_venta){
        include("conexion_dw.php");

        $query_productos = "EXEC sp_PanTienda '". $punto_venta . "'";
        $stm = $conn_sis->prepare($query_productos);
        $stm->execute();
        $resultado = $stm->fetchAll(PDO::FETCH_ASSOC);
        $productos = array();
        $cont = 1;
                  
        foreach($resultado as $dato){
            $productos[$cont] = $dato['Pan']; 
            $cont++;
        }

        $array_productos = implode("', '",$productos);

        $no_ventas = array();
        $i = 1;
        while ($i <= sizeof($productos)) {
            $query_cantidad = "EXEC sp_VentasProductoTienda '" . $punto_venta . "', '". $productos[$i] . "'";
            $stm_cantidad = $conn_sis->prepare($query_cantidad);
            $stm_cantidad->execute();
            $resultado_cantidad = $stm_cantidad->fetchAll(PDO::FETCH_ASSOC);

            foreach($resultado_cantidad as $dato_c){
                $no_ventas[$i] = $dato_c['Cantidad'];
            }
            $i++;
        }

        $array_cantidad = implode(',',$no_ventas);

        echo "<canvas id='ventas_".$punto_venta."';> </canvas>";
        echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js'></script>";

        echo "<script>                          
            var grafica = document.getElementById('ventas_".$punto_venta."').getContext('2d');
            var ingresos_mes = new Chart( grafica, {
                type: 'doughnut',
                data: {
                    labels: ['" . $array_productos . "'],
                    datasets: [{
                        label: 'Productos',
                        data: [" . $array_cantidad . "],
                        backgroundColor: [
                            'rgb(221, 160, 221)',
                            'rgb(255, 192, 203)',
                            'rgb(75, 192, 192)',
                            'rgb(175, 238, 238)',
                            'rgb(255, 205, 86)',
                            'rgb(201, 203, 207)',
                            'rgb(54, 162, 235)'
                        ],
                        hoverOffset: 4
                    }]
                }
            }); 
        ";
        echo "</script>";
        $stm = null;
    }  
}

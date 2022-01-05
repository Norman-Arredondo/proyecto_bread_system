<?php 
class historico {
	function recuperar_HechosVentas(){
		include("conexion_dw.php");

		$query = "EXEC sp_HechosVentas";
		$stm = $conn_sis->prepare($query);
        $stm->execute();
        $resultado = $stm->fetchAll(PDO::FETCH_ASSOC);

		foreach($resultado as $dato){
			echo "<tr>";
			echo "<td align='center' NOWRAP>" . $dato["cve_vta"] . "</td>";
			echo "<td align='center' NOWRAP>" . $dato["cve_pto"] . "</td>";
			echo "<td align='center' NOWRAP>" . $dato["id_produccion"] . "</td>";
			echo "<td align='center' NOWRAP>" . $dato["fecha"] . "</td>";
			echo "<td align='center' NOWRAP>" . $dato["rfc_empleado"] . "</td>";
			echo "<td align='center' NOWRAP>" . $dato["piezas_vendidas"] . "</td>";
			echo "<td align='center' NOWRAP>" . round($dato["precio_unitario"], 2) . "</td>";
			echo "<td align='center' NOWRAP>" . round($dato["importe_vta"], 2) . "</td>";
			echo "</tr>";
		}

		$stm = null;
	}
}
?>
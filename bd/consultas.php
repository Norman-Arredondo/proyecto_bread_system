<?php 
class consultas {

	
	//Historico
	function recuperar_HechosVentas(){
		include("conexion_dw.php");

		$query = "exec sp_HechosVentas";
		$resultado = sqlsrv_query($conn_sis, $query);

		while ($fila = sqlsrv_fetch_array($resultado)){
			echo "<tr>";
			echo "<td> $fila[cve_vta] </td>";
			echo "<td> $fila[cve_pto] </td>";
			echo "<td> $fila[id_produccion] </td>";
			echo "<td> $fila[fecha] </td>";
			echo "<td> $fila[rfc_empleado] </td>";
			echo "<td> $fila[piezas_vendidas] </td>";
			echo "<td> $fila[precio_unitario] </td>";
			echo "<td> $fila[importe_vta] </td>";
			echo "</tr>";
		}    
		sqlsrv_close($conn_sis);
	}

	

}

?>
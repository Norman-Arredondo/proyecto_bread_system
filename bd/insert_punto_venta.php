<?php 
    include ("conexion_so.php");
    include("bd/select_punto_venta.php");

    try{
        if($_POST){
            $cve_pto = $_POST['cve_pto'];
            $pto_vta = $_POST['pto_vta'];
            $calle = $_POST['calle'];
            $colonia = $_POST['colonia'];
            $no_interior = $_POST['no_interior'];
            $no_exterior = $_POST['no_exterior'];
            $alcaldia = $_POST['alcaldia'];
            $codigo_postal= $_POST['codigo_postal'];

            try{
                $query = "EXEC sp_Registro_ptovta '".$cve_pto."', '".$pto_vta."', '".$calle."', '".$colonia."', '".$no_interior."', '".$no_exterior."', '".$alcaldia . "', ".$codigo_postal.";";
                $stmt = $conn_sis->prepare($query);
                $stmt->execute();
                $stmt = null;
                echo "Guardado";
            } catch(Exception $errorsql){
                echo "Error al guardar: " . $errorsql;
            }
            //$opc = new pto_vta();
            //$opc->recuperar(1);
        }
    } catch (Exception $error){
        echo "Error:" . $error;
    }
?>
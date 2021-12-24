<?php 
    include ("conexion_so.php");

    try{
        if($_POST){
            $m_cve_pto = $_POST['cve_pto'];
            $m_pto_vta = $_POST['pto_vta'];
            $m_calle = $_POST['calle'];
            $m_colonia = $_POST['colonia'];
            $m_no_interior = $_POST['no_interior'];
            $m_no_exterior = $_POST['no_exterior'];
            $m_alcaldia = $_POST['alcaldia'];
            $m_codigo_postal= $_POST['codigo_postal'];

            try{
                $query = "EXEC sp_Modificar_ptovta '".$m_cve_pto."', '".$m_pto_vta."', '".$m_calle."', '".$m_colonia."', '".$m_no_interior."', '".$m_no_exterior."', '".$m_alcaldia . "', ".$m_codigo_postal.";";
                $stmt = $conn_sis->prepare($query);
                $stmt->execute();
                $stmt = null;
                echo "Modificado";
            } catch(Exception $errorsql){
                echo "Error al modificar: " . $errorsql;
            }
        }
    } catch (Exception $error){
        echo "Error:" . $error;
    }
?>
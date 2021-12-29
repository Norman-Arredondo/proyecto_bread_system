<?php 
    include ("conexion_so.php");

    try{
        if($_POST){
            $m_nombre_mp = $_POST['nombre_mp'];
            $m_stock_minimo = $_POST['stock_minimo'];
            $m_stock_maximo = $_POST['stock_maximo'];

            try{
                $query = "EXEC sp_Modificar_Materia_Prima '".$m_nombre_mp."', ".$m_stock_minimo.", ".$m_stock_maximo.";";
                $stmt = $conn_sis->prepare($query);
                $stmt->execute();
                $stmt = null;
                echo "MP Guardada";
            } catch(Exception $errorsql){
                echo "Error al modificar: " . $errorsql;
            }
        }
    } catch (Exception $error){
        echo "Error:" . $error;
    }
?>
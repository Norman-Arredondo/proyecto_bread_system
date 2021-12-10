<?php
    //configurar datos de acceso a la BD
    $dbuser ="";
    $userpass = "";
    $connectionInfo = "sqlsrv:Server=localhost;Database=so_bs"; $dbuser; $userpass;//Cadea de conexión

    try {       
        $conn_sis = new PDO($connectionInfo); //Crear conexión a SQL Server
        
        if ($conn_sis) { //Mensaje si la conexión es correcta
            //echo '<script type="text/javascript"> alert("Conexión establecida"); </script>';
        }
    } catch (PDOException $e) {
        echo $e->getMessage();//Si hay error en la conexión
    }
    
?>
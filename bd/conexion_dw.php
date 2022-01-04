<?php
    $serverName = "HP1";
    $connectionInfo = array("Database" => "dwh_bs", "UID" => "sa", "PWD" => "elena", "CharacterSet" => "UTF-8");
    $conn_sis = sqlsrv_connect($serverName, $connectionInfo);

    if(!$conn_sis){
        die(print_r(sqlsrv_errors(), true));
    } else {
        /*echo'<script type="text/javascript"> alert("Conexión establecida"); </script>';*/
    }
?>
<?php 

    if(!isset($_SESSION['correo'])){
        header("Location:../../../index.html");
    }

    $sqlall= "SELECT id,nombre,apellido,correo FROM usuario ORDER BY id";
    $result = pg_query ($sqlall) or die('La consulta fallo: ' . pg_last_error()); 
    $line = pg_fetch_all($result)
?> 
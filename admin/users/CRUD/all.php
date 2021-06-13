<?php 
    #Si la sessión no está iniciada redireccionar
    if(!isset($_SESSION['id'])){
        header("Location:../../../index.html");
    }
    #Query guardada en $line
    $sqlall= "SELECT id,nombre,apellido,correo FROM usuario ORDER BY id";
    $result = pg_query ($sqlall) or die('La consulta fallo: ' . pg_last_error()); 
    $line = pg_fetch_all($result)
?> 
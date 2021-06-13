<?php 
    $id_actual = $_SESSION['id'];
    $sql_read =  "SELECT id,nombre,apellido,correo,pais,fecha_registro,contraseña,admin FROM usuario WHERE id=$id_actual";
    $result_read = pg_query ($sql_read) or die('La consulta fallo: ' . pg_last_error());
    $Datos= pg_fetch_array($result_read);
    $esadmin = $Datos['admin'];


    #Si la sesión no está iniciada redireccionar
    if(!isset($_SESSION['id']) || ($esadmin=='f')){
        header("Location:../../../index.html");
    }

    #Query guardada en $line
    $sqlall= "SELECT id,nombre,apellido,correo FROM usuario ORDER BY id";
    $result = pg_query ($sqlall) or die('La consulta fallo: ' . pg_last_error()); 
    $line = pg_fetch_all($result);
?> 
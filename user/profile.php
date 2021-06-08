<?php

    if(!isset($_SESSION['correo'])){
        header("Location:../index.html");
    }

    $correo = $_SESSION['correo'];
    $sql_read = "SELECT id,nombre,apellido,correo,pais,fecha_registro,contraseña FROM usuario WHERE correo='$correo'";
    $result_read = pg_query ($sql_read) or die('La consulta fallo: ' . pg_last_error());
    $Datos= pg_fetch_array($result_read);
    $pais_actual= $Datos['pais'];
    $fecha_show= substr($Datos['fecha_registro'], 0, -9);
    $sql_pais= "SELECT cod_pais,nombre FROM pais WHERE cod_pais = $pais_actual";
    $result_pais= pg_query ($sql_pais) or die('La consulta fallo: ' . pg_last_error());
    $pais_select= pg_fetch_array($result_pais);
?>
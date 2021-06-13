<?php
    
    if(!isset($_SESSION['id'])){
        header("Location:../index.html");
    }

    $id_usuario = $_SESSION['id'];
    $sql_read =  "SELECT id,nombre,apellido,correo,pais,fecha_registro,contraseña,admin FROM usuario WHERE id=$id_usuario";
    $result_read = pg_query ($sql_read) or die('La consulta fallo: ' . pg_last_error());
    $Datos= pg_fetch_array($result_read);
    $esadmin = $Datos['admin'];

    
    // Verifica si es que es admin, en ese caso, no tiene billetera.
    // (esto se hace por si se introduce directamente el link de la wallet)
    if($esadmin=='t'){
        header("Location:../index.html");
    }


    $sqlall='SELECT sigla, nombre, balance, valor, (balance*valor) AS "total" FROM (SELECT *
        FROM (SELECT * FROM usuario_tiene_moneda WHERE id_usuario = '.$id_usuario.') AS xd JOIN moneda ON moneda.id = xd.id_moneda) AS coin
        JOIN precio_moneda ON coin.id_moneda = precio_moneda.id_moneda WHERE (coin.id_moneda, fecha) IN (SELECT id_moneda, MAX(fecha) as "fecha" FROM precio_moneda GROUP BY id_moneda)';
    
    $result = pg_query ($sqlall) or die('La consulta fallo: ' . pg_last_error()); 
    $line = pg_fetch_all($result);

?>
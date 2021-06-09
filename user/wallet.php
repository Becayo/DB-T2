<?php
    if(!isset($_SESSION['correo'])){
        header("Location:../index.html");
    }

    $id_usuario = $_SESSION['id'];

    $sqlall='SELECT sigla, nombre, balance, valor, (balance*valor) AS "total" FROM (SELECT *
        FROM (SELECT * FROM usuario_tiene_moneda WHERE id_usuario = '.$id_usuario.') AS xd JOIN moneda ON moneda.id = xd.id_moneda) AS coin
        JOIN precio_moneda ON coin.id_moneda = precio_moneda.id_moneda WHERE (coin.id_moneda, fecha) IN (SELECT id_moneda, MAX(fecha) as "fecha" FROM precio_moneda GROUP BY id_moneda)';
    
    $result = pg_query ($sqlall) or die('La consulta fallo: ' . pg_last_error()); 
    $line = pg_fetch_all($result);

?>
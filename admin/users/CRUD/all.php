<?php 
$sqlall="SELECT id,nombre,apellido,correo FROM usuario";
$result = pg_query ($sqlall) or die('La consulta fallo: ' . pg_last_error()); 
$line = pg_fetch_all($result)
?> 
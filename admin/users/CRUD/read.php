<?php $id_actual= $_GET['id'] ;    #ID
#Consulta para mostrar lo actual   
$sql_read =  "SELECT id,nombre,apellido,correo,pais,fecha_registro,contraseña,admin FROM usuario WHERE id=$id_actual";
$result_read = pg_query ($sql_read) or die('La consulta fallo: ' . pg_last_error());
#Array con datos
$Datos= pg_fetch_array($result_read);
#Variable del pais
$pais_actual= $Datos['pais'];
#Modificación para mostrar fecha
$fecha_show= substr($Datos['fecha_registro'], 0, -9);
#Estado Admin
$es_admin= $Datos['admin'];
#Mostrar nombre pais según id
$sql_pais= "SELECT cod_pais,nombre FROM pais WHERE cod_pais = $pais_actual";
$result_pais= pg_query ($sql_pais) or die('La consulta fallo: ' . pg_last_error());
$pais_select= pg_fetch_array($result_pais);
?>
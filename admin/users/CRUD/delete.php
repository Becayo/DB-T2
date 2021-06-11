<?php
include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';

$id= $_GET['id'];
$sql_delete="DELETE FROM usuario WHERE id=$id";
$result_delete= pg_query ($sql_delete) or die('La consulta fallo: ' . pg_last_error());
header("location:../all.html");
?>
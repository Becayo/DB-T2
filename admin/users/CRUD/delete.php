<?php
include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';

#Ver cual id hay que eliminar 
$id= $_GET['id'];
if ($_SESSION['id']!=$id){
    # Solo 1 query debido a que es en cascada
    $sql_delete="DELETE FROM usuario WHERE id=$id";
    $result_delete= pg_query ($sql_delete) or die('La consulta fallo: ' . pg_last_error());
    #Devolver a all.
}
header("location:../all.html");
?>
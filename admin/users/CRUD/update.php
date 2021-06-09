<?php
    include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';
    include 'read.php';

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $nombre = pg_escape_string($dbconn, $_POST['name']);
        $apellido = pg_escape_string($dbconn, $_POST['surname']);
        $correo = pg_escape_string($dbconn, $_POST['email']);
        $pass1 = pg_escape_string($dbconn, $_POST['pwd']);
        $pais = pg_escape_string($dbconn, $_POST['country']);

        $buscar_usuario = "SELECT * FROM usuario WHERE correo = '$correo'";
        $resultado = pg_query($dbconn, $buscar_usuario);
        $contador = pg_num_rows($resultado);

        if(($contador == 1 and $correo==$Datos['correo']) or ($contador == 0 and $correo!=$Datos['correo']) ){
            $sql_update = 
            "UPDATE usuario 
            SET nombre='$nombre',apellido='$apellido',correo='$correo',contraseña='$pass1',pais='$pais' WHERE id=$id_actual";
            pg_query($dbconn, $sql_update);
            header("location:../all.html");
        }else{
            echo "Ya existe un usuario con este correo";
        }
    }
    pg_close();
?>
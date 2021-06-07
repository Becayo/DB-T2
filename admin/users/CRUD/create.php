<?php
    include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';
        
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        $nombre = pg_escape_string($dbconn, $_POST['name']);
        $apellido = pg_escape_string($dbconn, $_POST['surname']);
        $correo = pg_escape_string($dbconn, $_POST['email']);
        $pass1 = pg_escape_string($dbconn, $_POST['pwd']);
        $pais = pg_escape_string($dbconn, $_POST['country']);
        date_default_timezone_set('America/Santiago');
        $fecha = pg_escape_string($dbconn, date("Y-m-d H:i:s", time()));
    
        $buscar_usuario = "SELECT * FROM usuario WHERE correo = '$correo'";
        $resultado = pg_query($dbconn, $buscar_usuario);
        $contador = pg_num_rows($resultado);

        if($contador == 0){

            $query = "INSERT INTO usuario (nombre, apellido, correo, contraseña, pais, fecha_registro) VALUES ('$nombre', '$apellido', '$correo', '$pass1', '$pais', '$fecha')";
            pg_query($dbconn, $query);

        }else{
            echo "Ya existe un usuario con este correo";
        }
    }
    pg_close();
?>
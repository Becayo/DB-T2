<?php
    include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';
        
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        #Recoger toda la información del forms mediantes POST
        $nombre = pg_escape_string($dbconn, $_POST['name']);
        $apellido = pg_escape_string($dbconn, $_POST['surname']);
        $correo = pg_escape_string($dbconn, $_POST['email']);
        $pass1 = pg_escape_string($dbconn, $_POST['pwd']);
        $pais = pg_escape_string($dbconn, $_POST['country']);
        date_default_timezone_set('America/Santiago');
        $fecha = pg_escape_string($dbconn, date("Y-m-d H:i:s", time()));
        $admin = pg_escape_string($dbconn, $_POST['admin']);

        #Revisar cuantas veces aparece el correo en la base
        $buscar_usuario = "SELECT * FROM usuario WHERE correo = '$correo'";
        $resultado = pg_query($dbconn, $buscar_usuario);
        $contador = pg_num_rows($resultado);

        #Si no existe, Se agrega
        if($contador == 0){
            $pass1=md5($pass1);
            # If para ingresar valor true o false dependiendo de la opción de admin.
            if ($admin=='2'){
                $query = "INSERT INTO usuario (nombre, apellido, correo, contraseña, pais, fecha_registro, admin) VALUES ('$nombre', '$apellido', '$correo', '$pass1', '$pais', '$fecha', 'TRUE')";
                pg_query($dbconn, $query);
                header("location:../all.html");
            }else{
                $query = "INSERT INTO usuario (nombre, apellido, correo, contraseña, pais, fecha_registro, admin) VALUES ('$nombre', '$apellido', '$correo', '$pass1', '$pais', '$fecha', 'FALSE')";
                pg_query($dbconn, $query);
                header("location:../all.html");
            }
        }else{
            header("location:../create.html?rep_correo");
        }
    }
    pg_close();
?>
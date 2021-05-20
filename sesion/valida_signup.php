<?php
/* Este archivo debe validar los datos de registro y manejar la lógica de crear un usuario desde el formulario de registro */

    include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';

    if(!dbconn){
        echo "Error al conectarse a la base de datos";
    }else{
        
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            
            $nombre = pg_escape_string($_POST['name']);
            $apellido = pg_escape_string($_POST['surname']);
            $correo = pg_escape_string($_POST['email']);
            $pass1 = pg_escape_string($_POST['pwd']);
            $pass2 = pg_escape_string($_POST['pwd2']);
            $pais = pg_escape_string($_POST['country']);
            
            date_default_timezone_set('America/Santiago');
            
            $fecha = date("Y-m-d H:i:s");
            
            $query = "INSERT INTO usuario(nombre, apellido, email, contraseña, pais, fecha_registro) VALUES('" . $nombre . "', '" . $apellido . "', '" . $correo . "', '" . $pass1 . "', '" . $pais . "', '" . $fecha . "')";
            
            if(pg_query_params($dbconn, $query, array($nombre,$apellido,$correo,$pass1,$pass2,$pais)) !== FALSE){
                echo "Los siguientes datos fueron ingresados con exito ".$correo;
            }
        }
    }
    pg_close();


?>
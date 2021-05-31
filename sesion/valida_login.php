<?php 
/* Este archivo debe manejar la lógica de iniciar sesión */
    include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';
    if($_SERVER['REQUEST_METHOD'] == "POST"){
    
        $correo = pg_escape_string($dbconn, $_POST['email']);
        $pass = pg_escape_string($dbconn, $_POST['pwd']);

        $buscar_usuario = "SELECT * FROM usuario WHERE correo = '$correo' and contraseña = '$pass'";
        $resultado = pg_query($dbconn, $buscar_usuario);
        $contador = pg_num_rows($resultado);
        if($contador > 0){
            header("location:../index.html");
        }else{
            echo "inicio de sesion incorrecto";
        }
        pg_close();
    
    }
?>
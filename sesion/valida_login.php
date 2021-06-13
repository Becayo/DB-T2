<?php 

    include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';
    session_start();
    if(isset($_SESSION['id'])){
        header("Location:../index.html");
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $correo = pg_escape_string($dbconn, $_POST['email']);
        $pass = pg_escape_string($dbconn, $_POST['pwd']);
        $encrypted_pass = md5($pass);  #se encripta la pass

        $buscar_usuario = "SELECT id,correo,contraseña FROM usuario WHERE correo = '$correo' and contraseña = '$encrypted_pass'";
        $resultado = pg_query($dbconn, $buscar_usuario);
        $Datos= pg_fetch_array($resultado);
        $id = $Datos['id'];
        $contador = pg_num_rows($resultado);
        if($contador > 0){             #si es que coinciden la contraseña con el correo, se inicia sesion
            $_SESSION['correo'] = $correo; #se guardan los valores para la sesion.
            $_SESSION['id'] = $id;
            header("location:../index.html");
        }else{
            header("location:log-in.html?signup=empty"); #se redirige al login si es que no coinciden.
        }
    pg_close();
    }
?>
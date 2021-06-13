<?php
    include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';    #Incluir dbconn, la conexión
    include 'read.php';                                    #Incluir los datos actuales.

    if($_SERVER['REQUEST_METHOD'] == "POST"){                           #Obtención de todos los datos del formulario
        $nombre = pg_escape_string($dbconn, $_POST['name']);
        $apellido = pg_escape_string($dbconn, $_POST['surname']);
        $correo = pg_escape_string($dbconn, $_POST['email']);
        $pass1 = pg_escape_string($dbconn, $_POST['pwd']);
        $pais = pg_escape_string($dbconn, $_POST['country']);

        $buscar_usuario = "SELECT * FROM usuario WHERE correo = '$correo'"; #Query para revisar cuantas veces está el correo
        $resultado = pg_query($dbconn, $buscar_usuario);
        $contador = pg_num_rows($resultado);

        #Primer if es para la condición de existencia de 1 solo correo, Si está modificando el propio o está modificando el de alguien
        if(($contador == 1 and $correo==$Datos['correo']) or ($contador == 0 and $correo!=$Datos['correo']) ){
            #Segundo if es para restringir modificar la constraseña de otro admin, esto por si acaso.
            if (($_SESSION['id']==$id_actual) or ($es_admin==FALSE)){
                $pass1=md5($pass1);           #Encriptar la contraseña
                $sql_update =                 #Query update, y luego redirigir
                "UPDATE usuario 
                SET nombre='$nombre',apellido='$apellido',correo='$correo',contraseña='$pass1',pais='$pais' WHERE id=$id_actual";
                pg_query($dbconn, $sql_update);
                header("location:../all.html?update");      #Redirección + mensaje update
            }else{
                header("location:../all.html?mod_admin");   #Redirección + mensaje mod_admin
            }
        }else{
            header("location:../update.html?id=$id_actual&a=rep_correo"); #Mantener la pagina y mostrar mensaje error por correo repetido
        }
    }
    pg_close();
?>
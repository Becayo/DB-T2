<?php
/* Este archivo debe validar los datos de registro y manejar la lógica de crear un usuario desde el formulario de registro */

    include("db_config.php");
    session_start();

    $usuario = $_SESSION['email'];

?>
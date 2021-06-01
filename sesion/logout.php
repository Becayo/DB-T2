<?php
/* Este archivo debe manejar la lógica de cerrar una sesión */
    include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';
    session_start();
    session_destroy();
    header("location:../index.html")
?>
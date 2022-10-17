<?php
    //Cierra la sesión
    session_start();
    include_once "consultas_conexiones.php";
    $con = new Conexion();
    $cliente = $_SESSION['usuario']['email'];
    vaciar_carro($con, $cliente);
    session_destroy();
    header('Location: pantalla_inicio.php');
    exit;
?>
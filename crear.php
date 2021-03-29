<?php

include "db.php";

if (isset($_POST['enviar'])) {
    $nombre = $_POST['nombre'];
    $propietario = $_POST['propietario'];
    $sucursal = $_POST['sucursal'];

    $query = "INSERT INTO clientes (nombre, propietario, sucursal) VALUES ('$nombre', '$propietario', '$sucursal')";
    $res = mysqli_query($connect, $query);

    if (!$res) {
        die("Query Failed");
    } 

    $_SESSION['message'] = 'Guardado satisfactoriamente';
    $_SESSION['message_type'] = 'success';

    # Redirigiendo a la página de clientes
    header("Location: clientes.php");
}

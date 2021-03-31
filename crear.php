<?php

include "db.php";

if (isset($_POST['enviar'])) {
    $nombre = $_POST['nombre'];
    $propietario = $_POST['propietario'];
    $sucursal = $_POST['sucursal'];
    $gastos = $_POST['gasto'];
    $gastosIVA = ($gastos * 0.16) + $gastos;
    $years = $_POST['añosServicios'];

    $query = "INSERT INTO registro (nombre, propietario, sucursal, gastosAnuales, gastosAnualesIVA, añosServicios) VALUES ('$nombre', '$propietario', '$sucursal', '$gastos', '$gastosIVA', '$years')";
    $res = mysqli_query($connect, $query);

    if (!$res) {
        die("Query Failed");
    }

    # Redirigiendo a la página de clientes
    header("Location: registro.php");
}

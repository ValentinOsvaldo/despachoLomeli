<?php 

include "db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM registro WHERE id = '$id'";
    $res = mysqli_query($connect, $query);

    if (!$res) {
        die("Query failed");
    }

    header("Location: registro.php");
}
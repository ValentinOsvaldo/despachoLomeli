<?php 

include "db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM clientes WHERE id = '$id'";
    $res = mysqli_query($connect, $query);

    if (mysqli_num_rows($res) == 1) {
        $row = mysqli_fetch_array($res);
        $nombre = $row['nombre'];
        $propietario = $row['propietario'];
        $sucursal = $row['sucursal'];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $nombre = $_POST['nombre'];
    $propietario = $_POST['propietario'];
    $sucursal = $_POST['sucursal'];
    $query = "UPDATE clientes set nombre = '$nombre', propietario = '$propietario', sucursal = '$sucursal' WHERE id = '$id'";
    mysqli_query($connect, $query);
    header("Location: clientes.php");
}

?>

<?php include "templates/header.php"; ?>

<div class="container center">
    <form action="editar.php?id=<?php echo $_GET['id'] ?>" method="POST" 
    class="add-card w-100">
        <legend class="title">Editar</legend>
        <div class="form-block">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" value="<?php echo $nombre ?>">
        </div>
        <div class="form-block">
            <label for="propietario">Propietario</label>
            <input type="text" name="propietario" value="<?php echo $propietario ?>">
        </div>
        <div class="form-block">
            <label for="sucursal">Sucursal</label>
            <input type="text" name="sucursal" value="<?php echo $sucursal ?>">
        </div>
        <input type="submit" name="update" value="Actualizar" class="btn w-100 m-0">
    </form>
</div>

<?php include "templates/footer.php"; ?>
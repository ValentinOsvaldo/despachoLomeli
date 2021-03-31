<?php 

include "db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM registro WHERE id = '$id'";
    $res = mysqli_query($connect, $query);

    if (mysqli_num_rows($res) == 1) {
        $row = mysqli_fetch_array($res);
        $nombre = $row['nombre'];
        $propietario = $row['propietario'];
        $sucursal = $row['sucursal'];
        $gastos = $row['gastosAnuales'];
        $years = $row['añosServicios'];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $nombre = $_POST['nombre'];
    $propietario = $_POST['propietario'];
    $sucursal = $_POST['sucursal'];
    $gastos = $_POST['gasto'];
    $gastosIVA = ($gastos * 0.16) + $gasto;
    $years = $_POST['añosServicios'];
    $query = "UPDATE registro set nombre = '$nombre', propietario = '$propietario', sucursal = '$sucursal', gastosAnuales = '$gastos', gastosAnualesIVA = '$gastosIVA', añosServicios = '$years' WHERE id = '$id'";
    mysqli_query($connect, $query);
    header("Location: registro.php");
}

?>

<?php include "templates/header.php"; ?>

<div class="container center">
    <form action="editar.php?id=<?php echo $_GET['id'] ?>" method="POST" 
    class="add-card w-100">
        <legend class="title">Editar</legend>
        <div class="form-block">
            <label for="nombre">Nombre Empresa:</label>
            <input type="text" name="nombre" value="<?php echo $nombre; ?>" required>
        </div>
        <div class="form-block">
            <label for="propietario">Propietario:</label>
            <input type="text" name="propietario" value="<?php echo $propietario; ?>" required>
        </div>
        <div class="form-block">
            <label for="sucursal">Sucursal:</label>
            <input type="text" name="sucursal" value="<?php echo $sucursal; ?>" required>
        </div>
        <div class="form-block">
            <label for="gasto">Gasto Anuales:</label>
            <input type="number" name="gasto" value="<?php echo $gastos; ?>" required>
        </div>
        <div class="form-block">
            <label for="añosServicios">Años de servicio</label>
            <input type="number" name="añosServicios" value="<?php echo $years; ?>" required>
        </div>
        <input type="submit" name="update" value="Actualizar" class="btn w-100 m-0">
    </form>
</div>

<?php include "templates/footer.php"; ?>
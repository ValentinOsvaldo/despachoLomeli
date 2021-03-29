<?php include "db.php" ?>
<?php include "templates/header.php" ?>

<section class="container flex-row">
    <form action="crear.php" method="POST" class="add-card">
        <legend class="title">Agregar cliente</legend>
        <div class="form-block">
            <label for="nombre">Nombre Empresa:</label>
            <input type="text" name="nombre" required>
        </div>
        <div class="form-block">
            <label for="propietario">Propietario:</label>
            <input type="text" name="propietario" required>
        </div>
        <div class="form-block">
            <label for="sucursal">Sucursal:</label>
            <input type="text" name="sucursal" required>
        </div>
        <input type="submit" name="enviar" value="Enviar" class="btn w-100 m-0">
    </form>
    <table class="table clientes">
        <thead>
            <tr>
                <th>ID</td>
                <th>Nombre Empresa</td>
                <th>Propietario</td>
                <th>Sucursal</td>
                <th>Acciones</td>
            </tr>
        </thead>
        <tbody>
            <?php 
                $query = "SELECT * FROM clientes";
                $res = mysqli_query($connect ,$query);
                while ($row = mysqli_fetch_array($res)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['propietario']; ?></td>
                        <td><?php echo $row['sucursal']; ?></td>
                        <td class="center">
                            <a href="editar.php?id=<?php echo $row['id']; ?>" class="btn">
                                <span>
                                    <i class='bx bxs-pencil'></i>
                                </span>
                            </a>
                            <a href="eliminar.php?id=<?php echo $row['id']; ?>" class="eliminar btn">
                                <span>
                                    <i class='bx bxs-trash-alt' ></i>
                                </span>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
        </tbody>
    </table>
</section>

<?php include "templates/footer.php"; ?>
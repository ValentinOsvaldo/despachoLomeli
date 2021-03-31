<?php include "db.php" ?>
<?php include "templates/header.php" ?>

<section class="container">
    <h2 class="title">Gastos</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre de la Empresa</th>
                <th>Propietario</th>
                <th>Sucursal</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $query = "SELECT * FROM registro";
                $res = mysqli_query($connect ,$query);
                while ($row = mysqli_fetch_array($res)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['gastosAnuales']; ?></td>
                        <td><?php echo $row['gastosAnualesIVA']; ?></td>
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

<?php include "templates/footer.php" ?>
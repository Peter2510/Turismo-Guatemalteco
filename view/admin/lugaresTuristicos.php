<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../view/css/styles.css">
    <title>Turismo Guatemalteco</title>
</head>

<body>

    <?php
    if (isset($_SESSION["usuario"])) :
    ?>

        <nav class="navbar">
            <div class="user-info">
                <span>Bienvenido, <?php echo $_SESSION["usuario"];  ?></span>
            </div>
            <ul class="nav-links">
                <li><a href="../../controller/logout.php" class="logout">Cerrar Sesión</a></li>
            </ul>
        </nav>

        <div class="sidebar">
            <h1>Admin</h1>
            <br>
            <a href="dashboard.php">Volver al inicio</a>
            <div class="div-sidebar">
                <h3 class="title-sidebar">Lugares</h3>
                <ul>
                <li><a href="index.php?o=add">Agregar</a></li>
                <li><a href="index.php?o=edit">Editar</a></li>
                </ul>
            </div>

            <div class="div-sidebar">
                <h3 class="title-sidebar">Usuarios</h3>
                <ul>
                    <li>Listar</li>
                </ul>
            </div>
        </div>

        <div class="content">
            <p style="text-align: center;">Lugares registrados dentro de la web Turismo Guatemalteco</p><br>
            <table>
                <tr>
                    <td>NOMBRE</td>
                    <td>ACCIÓN</td>
                </tr>
                <tbody>
                    <?php
                    if (isset($lugares)):
                        foreach ($lugares as $key => $lugar)
                            foreach ($lugar as $lug) : ?>
                            <tr>
                                <td><?php echo $lug['nombre'] ?></td>
                                <td></td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <td colspan="2">No se han agregado lugares turísticos a la base de datos. </td>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    <?php else : ?>
        <?php header("Location: ../../controller/logout.php"); ?>
    <?php endif ?>
</body>

</html>
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
    if (isset($_SESSION["admin_sesion"])) :
    ?>

        <?php 
            include("../templates/admin/navbar.php");
            include("../templates/admin/sidebar.php");       
        ?> 

        <div class="content">
            <p style="text-align: center;">Lugares registrados dentro de la web Turismo Guatemalteco</p><br>
            <table>
                <tr>
                    <td style="text-align: center; padding: 7px;">NOMBRE</td>
                    <td style="text-align: center; padding: 7px;">ACCIÓN</td>
                </tr>
                <tbody>
                    <?php
                    if (isset($lugares)&&!empty($lugares)) :
                        foreach ($lugares as $key => $lugar)
                            foreach ($lugar as $lug) : ?>
                            <tr>
                                <td class="content__table"><?php echo $lug['nombre'] ?></td>
                                <td>
                                    <div>
                                    <a class="options__edit__update" href="index.php?o=update&id=<?php echo $lug['id'] ?>">Editar</a>
                                        <a class="options__edit__delete" onclick="return confirm('¿Estás seguro de que deseas eliminar <?php echo $lug['nombre']; ?>?')" href="index.php?o=delete&id=<?php echo $lug['id'] ?>">Eliminar</a>
                                    </div>
                                </td>
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
    <script src="../js/scripts.js"></script>
</body>

</html>
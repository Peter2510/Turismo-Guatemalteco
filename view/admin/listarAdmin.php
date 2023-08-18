<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../view/css/styles.css">
    <title>Lugares Turísticos</title>
</head>

<?php
    if (isset($_SESSION["admin_sesion"])) :
    ?>

        <?php 
            include("../templates/admin/navbar.php");
            include("../templates/admin/sidebar.php");       
        ?> 

        <div class="content">
            <p style="text-align: center;">Administradores registrados dentro de la web Turismo Guatemalteco</p><br>
            <table>
                <tr>
                    <td style="text-align: center; padding: 7px;">USUARIO</td>
                    <td style="text-align: center; padding: 7px;">CORREO</td>
                </tr>
                <tbody>
                    <?php
                    if (isset($admins)&&!empty($admins)) :
                        foreach ($admins as $key => $admin)
                            foreach ($admin as $ad) : ?>
                            <tr>
                                <td class="content__table"><?php echo $ad['usuario'] ?></td>
                                <td class="content__table"><?php echo $ad['correo'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <td colspan="2">No se han agregado administradores a la base de datos. </td>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    <?php else : ?>
        <?php header("Location: ../../controller/logout.php"); ?>
    <?php endif ?>
</body>

</html>
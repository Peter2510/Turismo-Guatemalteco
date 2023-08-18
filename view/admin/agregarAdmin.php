<?php
session_start();
?>

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

            <form method="POST" action="index.php" class="form" enctype="multipart/form-data">
                <h2 class="form__title">Agregar Administrador</h2>
                <input type="hidden" name="action" value="add_admin">

                <div class="form__container">

                    <div class="form__group">
                        <input type="text" id="user" name="user" class="form__input" placeholder=" " require>
                        <label for="user" class="form__label">Usuario:</label>
                        <span class="form__line"></span>
                    </div>

                    <div class="form__group">
                        <input type="email" id="email" name="email" class="form__input" placeholder=" " require>
                        <label for="email" class="form__label">Correo:</label>
                        <span class="form__line"></span>
                    </div>
                    <div class="form__group">
                        <input type="password" id="password" name="password" class="form__input" placeholder=" " require>
                        <label for="password" class="form__label">Contraseña:</label>
                        <span class="form__line"></span>
                    </div>

                    <input type="submit" class="form__submit" value="Registar">
                </div>

            </form>



        </div>

    <?php else : ?>
        <?php header("Location: ../../controller/logout.php"); ?>
    <?php endif ?>

</body>

</html>
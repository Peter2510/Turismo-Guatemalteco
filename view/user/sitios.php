<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../view/css/styles.css">
    <title>Document</title>
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


            <div class="div-sidebar">
                <h3 class="title-sidebar">¿Que deseas realizar?</h3>
                <ul>
                    <li><a href="user.php">Volver al inicio</a></li>
                    <li><a href="#">Ver centros turísticos</a></li>
                </ul>
            </div>

        </div>

        <div class="content">

            <?php

        if(!empty($lugares)):

            foreach ($lugares as $key => $lugar)
                foreach ($lugar as $lug) : ?>

                <div class="info__place">
                    <p class="info__title"><?php echo $lug['nombre'] ?></p>
                    <img class="img" src=" <?php echo '../img/places/'.$lug['foto']?>" alt="<?php echo $lug['nombre']?>"><br>
                    <p class="info__general"><b>Departamento:</b> <?php echo $lug['departamento']?></p>
                    <p class="info__general"><b>Municipio:</b> <?php echo $lug['municipio']?></p><br>
                    <p class="info__general"><?php echo $lug['descripcion'] ?></p>
                </div>

            <?php endforeach ?>
            <?php else: ?>
                <br>
                <p style="text-align: center;" >Lo sentimos, aún no hemos agregado sitios turísicos al sistema, pronto agregaremos lugares para que conozcas lo hermoso que es Guatemala.</p>
            <?php endif; ?>
        </div>
    <?php else : ?>
        <?php header("Location: ../../controller/logout.php"); ?>
    <?php endif ?>






</body>

</html>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../view/css/styles.css" >
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
                <li><a href="index.php">Ver centros turísticos</a></li>
            </ul>
        </div>

    </div>

    <div class="content">
        <h2 style="text-align: center;">Guatemala</h2>
        <br>
        <p class="p-content">
            Guatemala es un país con gran riqueza cultural. Su naturaleza exuberante, variada y deslumbrante, desde las majestuosas montañas hasta los exuberantes bosques y playas vírgenes, cautiva a los visitantes.
        </p>
        <p class="p-content">
            En cada rincón de Guatemala se encuentran experiencias únicas y auténticas que capturan la esencia de su cultura y paisajes. Las vibrantes festividades y celebraciones junto con la cálida hospitalidad de su gente, el país se revela como un lugar inolvidable y lleno de maravillas por descubrir.
        </p>
        <p class="p-content">
            Por todas estas razones, Guatemala se convierte en un destino turístico que no se puede dejar de visitar, prometiendo una experiencia enriquecedora y llena de emociones para quienes tienen la oportunidad de explorar y apreciar su belleza y diversidad cultural.
        </p>
        <img class="img" src="../img/Turismo Guatemalteco.png" alt="turismo_guatemalteco">
    </div>

    <?php else : ?>
        <?php header("Location: ../../controller/logout.php"); ?>
    <?php endif ?>

</body>
</html>
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

<body>
    <?php
    if (isset($_SESSION["user_sesion"])) :
    ?>
    
        <?php 
        include("../templates/user/navbar.php");
        include("../templates/user/sidebar.php");       
        ?> 

        <div class="content">

        <div class="div__audio">
            <audio controls controlsList="nodownload" autoplay class="audio__player" id="mediaPlayer">
                        <source src="../sound/Canto_a_mi_Huehuetenango.m4a" type="audio/m4a">
                        <source src="../sound/Turismo_Guatemalteco.mp3" type="audio/mp3">
                        <source src="../sound/Noche_de_luna_entre_ruinas.mp3" type="audio/mp3">
            </audio>
        </div>
        


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

   <script src="../js/scripts.js"></script>

</body>

</html>
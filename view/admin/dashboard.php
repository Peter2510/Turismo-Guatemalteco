<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../view/css/styles.css" >
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
  <h2 style="text-align: center;" >Turismo Guatemalteco</h2><br>
  <p style="text-align: justify;" >Página para ver, agregar y eliminar los sitios turisticos que se muestran en la web de <u>Turismo Guatemalteco</u>, así como visualizar el nombre de usuario y correo de los visitantes registrados.</p>

</div>

    <?php else : ?>
        <?php header("Location: ../../controller/logout.php"); ?>
    <?php endif ?>

</body>
</html>
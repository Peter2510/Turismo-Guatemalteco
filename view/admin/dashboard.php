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


    <nav class="navbar">
        <div class="user-info">
            <span>Bienvenido, <?php echo $_SESSION["admin_sesion"];  ?></span>
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
      <li><a href="#">Listar</a></li>
      </ul>
    </div>

  </div>

    <div class="content">
  <h2 style="text-align: center;" >Turismo Guatemalteco</h2><br>
  <p style="text-align: justify;" >Página para ver, agregar y eliminar los sitios turisticos que se muestran en la web de <u>Turismo Guatemalteco</u>, así como visualizar el nombre de usuario y correo de los visitantes registrados.</p>

</div>

    <?php else : ?>
        <?php header("Location: ../../controller/logout.php"); ?>
    <?php endif ?>

</body>
</html>
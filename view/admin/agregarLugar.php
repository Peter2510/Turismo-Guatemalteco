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
      <li><a href="#">Listar</a></li>
      </ul>
    </div>

  </div>

    <div class="content">
  
    <form method="POST" action="index.php" class="form" enctype="multipart/form-data">
    <h2 class="form__title" >Agregar Lugar</h2>

    <div class="form__container">
        <div class="form__group">
            <input type="text" name="name" id="name" class="form__input" placeholder=" " required >
            <label for="name" class="form__label">Nombre del lugar turistico:</label>
            <span class="form__line"></span>
        </div>
        <div class="form__group">
            <input type="text" name="department" id="department" class="form__input" placeholder=" " required >
            <label for="department" class="form__label">Departamento donde se ubica:</label>
            <span class="form__line"></span>
        </div>

        <div class="form__group">
            <input type="text" name="municipality" id="municipality" class="form__input" placeholder=" " required >
            <label for="municipality" class="form__label">Municipio donde se ubica:</label>
            <span class="form__line"></span>
        </div>

        <div class="form__group">
            <textarea type="text" name="description" id="description" class="form__input" placeholder=" " required ></textarea>
            <label for="description" class="form__label">Descripción:</label>
            <span class="form__line"></span>
        </div>

        <div class="form__group">
        <input name="photo" id="photo" class="form__input__file" type="file" required/>
        </div>
        
        <input type="submit"  class="form__submit" name="login" value="Agregar">
    </div>

</form>



</div>

    <?php else : ?>
        <?php header("Location: ../../controller/logout.php"); ?>
    <?php endif ?>

</body>
</html>
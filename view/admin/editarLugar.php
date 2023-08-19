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
  
    <form method="POST" action="index.php" class="form" enctype="multipart/form-data">
    <h2 class="form__title" >Editar Lugar</h2>
    <input type="hidden" name="action" value="update">
    <input type="hidden" name="id" value="<?php echo $lugar[0][0]['id']?>">
    <div class="form__container">
        <div class="form__group">
            <input type="text" name="name" id="name" class="form__input" placeholder=" " value="<?php echo $lugar[0][0]['nombre']?>" required >
            <label for="name" class="form__label">Nombre del lugar turistico:</label>
            <span class="form__line"></span>
        </div>
        <div class="form__group">
            <input type="text" name="department" id="department" class="form__input" placeholder=" " value="<?php echo $lugar[0][0]['departamento']?>" required >
            <label for="department" class="form__label">Departamento donde se ubica:</label>
            <span class="form__line"></span>
        </div>

        <div class="form__group">
            <input type="text" name="municipality" id="municipality" class="form__input" placeholder=" " value="<?php echo $lugar[0][0]['municipio']?>" required >
            <label for="municipality" class="form__label">Municipio donde se ubica:</label>
            <span class="form__line"></span>
        </div>

        <div class="form__group">
            <textarea type="text" name="description" id="description" class="form__input" placeholder=" " required><?php echo str_replace(array("<br/>"), "\n", $lugar[0][0]['descripcion']);  ?></textarea>
            <label for="description" class="form__label">Descripción:</label>
            <span class="form__line"></span>
        </div>

        <div class="form__group">
            <img src="<?php echo "../img/places/".$lugar[0][0]['foto']?>">
        </div>

        <div class="form__group">
        <input name="photo" id="photo" class="form__input__file" type="file"/>
        </div>
        
        <input type="submit"  class="form__submit" name="login" value="Actualizar">
    </div>

</form>



</div>

    <?php else : ?>
        <?php header("Location: ../../controller/logout.php"); ?>
    <?php endif ?>

</body>
</html>
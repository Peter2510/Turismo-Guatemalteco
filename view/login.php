<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/css/styles.css" >
    <title>Turismo Guatemalteco</title>
</head>
<body id="body_form">

<form method="POST" action="index.php" class="form">
    <h2 class="form__title" >Iniciar Sesión</h2>

    <div class="form__container">
        <div class="form__group">
            <input type="text" name="email" id="email" class="form__input" placeholder=" " required >
            <label for="email" class="form__label">Correo:</label>
            <span class="form__line"></span>
        </div>
        <div class="form__group">
            <input type="password" name="password" id="password" class="form__input" placeholder=" " required>
            <label for="password" class="form__label">Contraseña:</label>
            <span class="form__line"></span>
        </div>
        
        <input type="submit"  class="form__submit" name="login" value="Iniciar Sesión">
        <p class="form__paragraph">¿Aún no tienes usuario? <a href="view/registro.php" class="form__link">Crear Usuario </a> </p>
    </div>

</form>
<!--<footer> Copyright &copy; Pedro Gordillo - TS1 </footer> -->
</body>
</html>

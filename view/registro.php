<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Turismo Guatemalteco</title>
</head>

<body id="body_form">

    <form method="POST" action="../controller/controller.php" class="form">
        <h2 class="form__title">Crear Usuario</h2>
        <p class="form__paragraph">¿Ya tienes usuario? <a href="../index.php" class="form__link">Iniciar Sesión</a> </p>

        <div class="form__container">

            <div class="form__group">
                <input type="text" id="name" class="form__input" placeholder=" ">
                <label for="name" class="form__label">Nombre:</label>
                <span class="form__line"></span>
            </div>

            <div class="form__group">
                <input type="text" id="user" class="form__input" placeholder=" ">
                <label for="user" class="form__label">Usuario:</label>
                <span class="form__line"></span>
            </div>

            <div class="form__group">
                <input type="email" id="email" class="form__input" placeholder=" ">
                <label for="email" class="form__label">Correo:</label>
                <span class="form__line"></span>
            </div>
            <div class="form__group">
                <input type="password" id="password" class="form__input" placeholder=" ">
                <label for="password" class="form__label">Contraseña:</label>
                <span class="form__line"></span>
            </div>

            <input type="submit" class="form__submit" name="registro" value="Crear Usuario">
        </div>

    </form>
    <!--<footer> Copyright &copy; Pedro Gordillo - TS1 </footer> -->
</body>

</html>
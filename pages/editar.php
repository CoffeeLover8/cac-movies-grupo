<?php

$id= $_GET['id'];

?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link de CSS -->
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/css/style_admin.css">
    <!-- Link a fav icon -->
    <link rel="shortcut icon" href="../public/img/favicon.png" type="image/x-icon">
    <!-- Link a iconos -->
    <script src="https://kit.fontawesome.com/31640eb81d.js" crossorigin="anonymous"></script>
    <!-- Link de fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <title>CAC-MOVIES</title>

</head>


<body class="bg-popcorn">
    <!-- Comienza header -->
    <!-- <header class="header-register"> -->

        <!-- Logo CAC-Movies -->
        <!-- <a href="/index.html" class="logo">
            <i class="fa-solid fa-film"></i>
            <span>CAC-Movies</span>
        </a> -->

    <!-- </header> -->

    <!-- Comienzo de header -->
    <header class="bg-red header-index">

        <nav class="nav-bar">

            <!-- Logo de CAC-Movies -->
            <a href="../index.html" class="logo">
                <i class="fa-solid fa-film"></i>
                <span>CAC-Movies</span>
            </a>

            <ul>
                <li><a href="../pages/catApi.html">CatApi</a></li>
                <li><a href="#" class="nav-button">Tendencias</a></li>
                <li><a href="../pages/register.html" class="nav-button">Registrarse</a></li>
                <li><a href="../pages/login.html" class="black-button nav-button">Iniciar Sesión</a></li>
            </ul>

        </nav>

    </header>

    <!-- Comienza main -->
    <main>

        <section class="bg-grey admin">

            <!-- Form de registro -->
            <form method="POST" action="create.php" class="content">

                <h1>Registro de película</h1>

                <div>
                    <input type="text" placeholder="Título" class="register-input">
                </div>

                <div>
                    <input type="text" placeholder="Descripción" class="register-input">
                </div>


                <div>
                    <input type="text" placeholder="Director" class="register-input">
                </div>

                <div>
                    <select name="#" id="#" class="register-input">
                        <option value="">Género</option>
                        <option value="#">Argentina</option>
                        <option value="#">Bolivia</option>
                        <option value="#">Brasil</option>
                        <option value="#">Chile</option>
                        <option value="#">Colombia</option>
                        <option value="#">Ecuador</option>
                        <option value="#">Paraguay</option>
                        <option value="#">Perú</option>
                        <option value="#">Uruguay</option>
                        <option value="#">Venezuela</option>
                    </select>
                </div>

                <div class="row">
                    <input type="text" placeholder="Año" class="register-input">
                    <input type="text" placeholder="Estrellas" class="register-input">
                </div>

                <div>
                    <input type="submit" class="bg-red register-button new-button" value="Registrar">
                </div>

            </form>

        </section>

    </main>

    <!-- Comienzo de footer -->
    <footer class="bg-red">

        <!-- Navegación del footer -->
        <nav>

            <ul>

                <li><a href="#">Términos y condiciones</a></li>

                <li><a href="#">Preguntas frecuentes</a></li>

                <li><a href="#">Ayuda</a></li>

                <li><a href="./index-peliculas.php" class="black-button">Administrador Peliculas</a></li>

            </ul>

        </nav>

    </footer>
    
</body>

</html>
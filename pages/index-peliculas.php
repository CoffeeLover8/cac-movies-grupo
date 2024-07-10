<?php
/* * * * * * * * * * * * *
 * FUNCIONES AUXILIARES  *
 * * * * * * * * * * * * */

/* Representación de las estrellas
 * de una película.
 * Recibe entero.
 * Devuelve una cadena de caracteres.
 */
function get_estrellas($cantidad) {
    $estrellas = "($cantidad) ";
    for( $i=0; $i < $cantidad; $i++ ) { 
        $estrellas .= "*";
    }
    return $estrellas;
}

/*
 * Configuración que evita que errores de MySQLi
 * lancen excepciones.
 * Requerido para PHP > 8.1
 * Documentación:
 * https://www.php.net/manual/es/mysqli-driver.report-mode.php
 */
mysqli_report(MYSQLI_REPORT_ERROR);

/* * * * * * * * * * * * * * * * *
 * AUTENTICACIÓN Y AUTORIZACIÓN  *
 * * * * * * * * * * * * * * * * */
# TODO: Validar Autenticación y Autorización

/* * * * * * * * * * * * * *
 * CONEXION BASE DE DATOS  *
 * * * * * * * * * * * * * */
# Datos de Desarrollo
$DB_HOST = "localhost";
$DB_USER = "root";
$DB_PASS = "";
$DB_NAME = "proyecto";

$conexion = @mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
$db_errno = mysqli_connect_errno();


if ($db_errno) {
    $db_errmsg = mysqli_connect_error();
    $db_msg_alert = "Error al conectar con la Base de Datos - Se muestran datos de desarrollo. - Error No. $db_errno: $db_errmsg";

    $peliculas = [
        [
            "id_movie" => "1",
            "nombre" => "Película Sin Base de Datos",
            "director" => "Director A",
            "genero" => "Terror",
            "ano" => "1992",
            "estrellas" => "2"
        ],
        [
            "id_movie" => "9",
            "nombre" => "Película de Prueba",
            "director" => "Director B",
            "genero" => "SQL",
            "ano" => "????",
            "estrellas" => "3"
        ],
    ];

} else {

/* * * * * * * * * * * * * *
 * CONSULTA BASE DE DATOS  *
 * * * * * * * * * * * * * */
$DB_TABLE_PELICULAS = "peliculas";
$consulta = mysqli_query($conexion, "SELECT * FROM $DB_TABLE_PELICULAS");
$peliculas = mysqli_fetch_all($consulta, MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link de CSS -->
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/style_admin.css">
    <!-- Link a fav icon -->
    <link rel="shortcut icon" href="/public/img/favicon.png" type="image/x-icon">
    <!-- Link a iconos -->
    <script src="https://kit.fontawesome.com/31640eb81d.js" crossorigin="anonymous"></script>
    <!-- Link de fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <title>CAC-MOVIES</title>

</head>

<body class="bg-popcorn">

    <!-- Comienzo de header -->
    <header class="bg-red header-index">

        <nav class="nav-bar">

            <!-- Logo de CAC-Movies -->
            <a href="/index.html" class="logo">
                <i class="fa-solid fa-film"></i>
                <span>CAC-Movies</span>
            </a>

            <ul>
                <li><a href="/pages/catApi.html">CatApi</a></li>
                <li><a href="#" class="nav-button">Tendencias</a></li>
                <li><a href="/pages/register.html" class="nav-button">Registrarse</a></li>
                <li><a href="/pages/login.html" class="black-button nav-button">Iniciar Sesión</a></li>
            </ul>

        </nav>

    </header>

    <!-- Comienzo de main -->
    <main>

        <!-- Listado de peliculas creadas -->
        <section class="bg-grey admin">

            <!-- Form de registro -->
            <div class="content">

                <div class="content-header">
                    <h1>Películas</h1>
                    <!-- Botón de registrar pelicula -->
                    <a href="adm-peliculas.html" class="bg-red register-button-index white-shadow new-button">+ Nueva</a>
                </div>
                
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Director</th>
                            <th>Género</th>
                            <th>Año</th>
                            <th>Estrellas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach( $peliculas as $pelicula ) { ?>
                            <tr>
                                <td><?php echo $pelicula["id_movie"] ?></td>
                                <td><?php echo $pelicula["nombre"] ?></td>
                                <td><?php echo $pelicula["descripcion"] ?></td>
                                <td><?php echo $pelicula["director"] ?></td>
                                <td><?php echo $pelicula["genero"] ?></td>
                                <td><?php echo $pelicula["ano"] ?></td>
                                <td><?php echo get_estrellas(intval($pelicula["estrellas"])) ?></td>
                            </tr>
                        <?php } ?>   
                    </tbody>
                </table>
                
                <?php if($db_errno) { 
                echo "<p class=\"msg-error\">$db_msg_alert</p>";
                } ?>

            </div>

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

                <li><a href="/pages/admin/" class="black-button">Administrador Peliculas</a></li>

            </ul>

        </nav>

        <!-- Flecha hacia arriba -->
        <div class="arrow-up">

            <a href="#">
                <img src="/public/img/flecha-hacia-arriba.png" alt="Flecha hacia arriba">
            </a>

        </div>

    </footer>

</body>

</html>
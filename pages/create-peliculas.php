<?php

include "index-peliculas.php";

$titulo = $_POST[ "titulo" ];
$descripcion = $_POST[ "descripcion" ];
$director = $_POST[ "director" ];
$genero = $_POST[ "genero" ];
$anio = $_POST[ "anio" ];
$estrellas = $_POST[ "estrellas" ];

$insertarPelicula = "INSERT INTO $DB_TABLE_PELICULAS( nombre, descripcion, genero, estrellas, director, ano ) VALUES( '$titulo', '$descripcion', '$genero', '$estrellas', '$director', '$anio' )";

$create = mysqli_query( $conexion, $insertarPelicula );


// Verificamos si la creación salió bien y redirecciona a la página correspondiente.
if( $create ) {

    // echo "Se guardo correctamente";
    echo "<script>
    location.href='index-peliculas.php';
    </script>";

} else {

    // echo "Ocurrio un error";
    echo "<script>
    alert('Ocurrió un error al registrar la película');
    location.href='index-peliculas.php';
    </script>";
}

?>
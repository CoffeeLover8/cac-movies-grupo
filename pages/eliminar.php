<?php
// Incluir el archivo de conexión a la base de datos
include('conexion.php');

//obtener id con método get
$id= $_GET['id'];

//eliminar el registro a partir del id que obtenemos en la línea anterior
$eliminar =  "DELETE FROM peliculas WHERE id_movie = '$id'";

//función para mandar la consulta
$eliminarQuery = mysqli_query($conexion,$eliminar);

var_dump($eliminarQuery);

//alert para notificar al usuario si se pudo eliminar lo deseado de forma exitosa o no
if(!$eliminarQuery){
    echo "<script>alert('Ha ocurrido un ERROR: " . $conexion->error . "');</script>";

}else{
    echo "<script>alert('Registro eliminado exitosamente.');</script>";
}

?>
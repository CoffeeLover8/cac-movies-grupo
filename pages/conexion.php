<?php
session_start(); // Iniciar sesión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn = mysqli_connect("localhost", "root", "", "proyecto");
    if (mysqli_connect_errno()) {
        die("Error de conexión: " . mysqli_connect_errno());
    }

    // Consulta preparada para buscar el usuario por correo electrónico
    $stmt = $conn->prepare("SELECT id, password FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $storedPassword = $row['password']; // Contraseña almacenada en texto plano
    
        if ($password === $storedPassword) { // Comparación directa
            $_SESSION['user_id'] = $row['id'];
            header("Location: /PaginasWeb/cac-movies-grupo/pages/registrarpelicula.php"); // Redirige al éxito
            exit();
        } else {
            $error = "Contraseña incorrecta";
        }
    } else {
        $error = "Correo electrónico no encontrado";
    }


    $stmt->close();
    $conn->close();

    // Mostrar mensaje de error (si existe)
    if (isset($error)) {
        echo "<p style='color:red'>$error</p>"; // O usa una función para mostrar el error de manera más adecuada
    }
}
?>
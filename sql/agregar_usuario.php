<?php
// Debido a que no hay usuarios per se para la pagina, este codigo se ha hecho para añadir, primero correr en el servidor con XAMPP para luego usar la aplicación. Todo siendo usuarios creados desde la base de datos, para el personal autorizado de APADEM

// Contraseña per se
$password_plana = "ejemplo3003";

// Cifrar contraseña
$password_cifrada = password_hash($password_plana, PASSWORD_BCRYPT);

$conexion = mysqli_connect("localhost", "root", "", "nombre_de_tu_bd");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

$usuario = "user123";

$sql = "INSERT INTO usuarios (usuario, password) VALUES ('$usuario', '$password_cifrada')";

if (mysqli_query($conexion, $sql)) {
    echo "Usuario creado correctamente.";
} else {
    echo "Error: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>
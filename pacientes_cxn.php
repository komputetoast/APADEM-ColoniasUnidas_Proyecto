<?php
function connection(){
    // Cambiar por la IP del servidor y credenciales, esta vez son locales
    $host = "127.0.0.1";
    $user = "root";
    $pass = "";

    $bd = "pacientes.php";
    $connect = mysqli_connect($nombre, $cedula, $descripcion, $medicamento, $resuelto);
    mysqli_select_db($connect, $bd);

    return $connect;
};
?>
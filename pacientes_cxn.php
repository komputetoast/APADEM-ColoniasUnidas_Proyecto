<?php
function connection() {
    $host = "127.0.0.1";
    $user = "root";
    $pass = "";
    $bd   = "datosmedicos";

    $connect = mysqli_connect($host, $user, $pass, $bd);

    if (!$connect) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    return $connect;
}
?>
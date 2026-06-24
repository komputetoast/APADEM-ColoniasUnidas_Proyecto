<?php
session_start();

if (isset($_POST['icnSesion'])) {

    $correo   = $_POST['email'];
    $password = $_POST['password'];

    require "pacientes_cxn2.php";

    // Buscar usuario su correo
    $sql  = $pdo->prepare("SELECT * FROM usuarios WHERE correo = ?");
    $sql->execute([$correo]);
    $usuario = $sql->fetch(PDO::FETCH_ASSOC);

    // Verificar que existe el usuario y contraseña correctos
    if ($usuario && password_verify($password, $usuario['password'])) {

        // Verificar que es administrador
        if ($usuario['admin'] == 1) {
            $_SESSION['admin']  = true;
            $_SESSION['correo'] = $usuario['correo'];

            header("Location: pacientes.php");
            exit();
        } else {
            // Usuario existe pero tiene permisos de administrador
            header("Location: pacientes_sesion.php?noadmin=1");
            exit();
        }

    } else {
        // Error
        header("Location: pacientes_sesion.php?error=1");
        exit();
    }
}
?>
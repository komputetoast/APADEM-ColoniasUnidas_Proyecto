<?php
require('pacientes_sesion1.php');
// Si ya está logueado, redirigir directo
if (isset($_SESSION['admin'])) {
    header("Location: pacientes.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/x-icon" href="/img/favicon.ico" />
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/mdb.min.css" />
  <script type="text/javascript" src="js/mdb.umd.min.js"></script>
  <link rel="stylesheet" href="styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <title>Iniciar Sesión</title>
</head>
<body>

  <h2>Iniciar Sesión</h2>

  <?php if (isset($_GET['error'])): ?>
    <p style="color:red;">Correo o contraseña incorrectos.</p>
  <?php endif; ?>

  <?php if (isset($_GET['noadmin'])): ?>
    <p style="color:red;">No tenés permisos de administrador.</p>
  <?php endif; ?>

  <form action="pacientes_sesion1.php" method="POST">
    <label>Correo electrónico</label>
    <input type="email" name="email" required>

    <label>Contraseña</label>
    <input type="password" name="password" required>

    <button type="submit" name="icnSesion">Iniciar sesión</button>
  </form>

</body>
</html>
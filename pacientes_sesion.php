<?php
session_start();
require('pacientes_cxn2.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Verificar si el usuario existe
  $sql = "SELECT * FROM users WHERE username = ?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$username]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($user && password_verify($password, $user['password'])) {
    // Inicio de sesión exitoso
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role']; // Guardamos el rol

    // Redirección
    if ($user['role'] == 'admin') {
      header("Location: pacientes.php");
    } else {
      header("Location: pacientes_sesion.php");
    }
    exit;
  } else {
    // Credenciales incorrectas
    echo "Usuario o contraseña incorrectos.";
  }
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
  <title>Pacientes</title>
</head>

<!-- Configuracion visual de la pagina -->
<style>
  html,
  body {
    height: 100%;
  }

  body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    font-family: 'IBM Plex Sans', sans-serif;
  }

  .content-wrap {
    flex: 1;
  }

  .dropdown-icon {
    width: 20px;
    height: auto;
    margin-left: 8px;
  }

  .dropdown-item img {
    width: 18px;
    height: auto;
    margin-left: 8px;
  }

  h2.title {
    text-align: center;
    color: #2e6fcf;
    font-size: 28px;
    font-weight: 500;
    margin-bottom: 2rem;
  }

  .servicios-wrapper {
    text-align: center;
  }

  .listado_atenciones {
    display: inline-block;
    text-align: left;
    columns: 2;
    -webkit-columns: 2;
    -moz-columns: 2;
    column-gap: 2rem;
    padding: 0;
    margin: 0 auto;
    max-width: 800px;
    list-style-position: inside;
  }

  .listado_atenciones li {
    margin-bottom: 0.5rem;
  }

  .navbar {
    padding-left: 1rem;
    padding-right: 1rem;
  }

  .btn-donaciones {
    color: #fff;
    background-color: #0d6efd;
    border-color: #0d6efd;
  }

  .btn-pacientes {
    color: #fff;
    background-color: #0d6efd;
    border-color: #0d6efd;
  }

  .btn-donaciones:hover,
  .btn-donaciones:focus {
    color: #000;
    background-color: #ffc107;
    border-color: #ffc107;
  }

  .btn-pacientes:hover,
  .btn-pacientes:focus {
    color: #fff;
    background-color: #198754;
    border-color: #198754;
  }
</style>

<body>
      <!-- ENCABEZADO O BARRA DE NAVEGACIÓN -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="inicio.html">
            <img src="APADEMLogo.png" class="img-thumbnail" alt="APADEM Colonias Unidas" style="width: 50px; height: auto" />
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mx-auto text-center">
                <li class="nav-item active">
                    <a class="nav-link" data-key="inicio" href="inicio.html">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-key="nosotros" href="nosotros.html">Sobre
                        Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-key="transparencia" href="logros.html">Transparencia</a>
                </li>
            </ul>
            <a class="btn btn-pacientes my-2 my-sm-0 ms-2" role="button" data-key="pacientes" href="inicio.html">
                Regresar
            </a>
        </div>
    </nav>
    
  <div class="content-wrap">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-8 col-md-6 col-lg-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <h5 class="card-title text-center mb-4">Iniciar sesión</h5>
            <form method="post">
              <div class="mb-3">
                <label for="username" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Ingrese su usuario" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña" required>
              </div>
              <div class="d-grid">
                <button type="submit" class="btn btn-primary">Ingresar</button>
              </div>
            </form>
          </div>
          <div class="card-footer text-center small text-muted">
            ¿Olvidó su contraseña? Contacte al administrador.
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

    <!-- Parte de abajo -->
  <footer class="bg-light text-center text-lg-start">
    <!-- Grid container -->
    <div class="container p-4">
    <!-- Texto y Contacto -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
      Est. 1982-2026:
      <a class="text-dark" data-key="contacto">APADEM Colonias Unidas.
        Est. 1982 - Base de Datos para Pacientes</a>
    </div>
    <!-- Texto y Contacto -->
  </footer>
  <!-- Footer -->
</body>

</html>
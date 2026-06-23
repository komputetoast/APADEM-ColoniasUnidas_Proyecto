<?php
require('pacientes_cxn.php');
$con = connection();

$sql   = "SELECT * FROM pacientemedico";
$query = mysqli_query($con, $sql);

session_start();
if (!isset($_SESSION['admin'])){
    header("Location:pacientes_sesion.php");
    exit();
}
header("Location:pacientes.php");
exit();
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

    body {
        font-family: 'IBM Plex Sans', sans-serif;
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

<body class="bg-light">

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
            <a class="btn btn-pacientes my-2 my-sm-0 ms-2" role="button" data-key="pacientes" href="pacientes.php">
                Cerrar Sesión
            </a>
        </div>
    </nav>

    <h1 class="text-center text-primary fw-bold mb-4">APADEM: Pacientes</h1>

    <!-- FORMULARIO AGREGAR -->
    <div class="row mb-5">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">
                    <h5 class="card-title mb-4 text-primary">Agregar Nuevo Paciente</h5>
                    <form action="crear_paciente.php" method="POST">
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-lg rounded-3" name="nombre" placeholder="Nombre" required>
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control form-control-lg rounded-3" name="cedula" placeholder="Cédula" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-lg rounded-3" name="descripcion" placeholder="Descripción">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-lg rounded-3" name="medicamento" placeholder="Medicamento">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="resuelto" name="resuelto" value="1">
                            <label class="form-check-label" for="resuelto">
                                Resuelto
                            </label>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg rounded-3 fw-bold">Agregar Paciente</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- TABLA -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-primary">
                            <tr>
                                <th class="fw-bold">ID</th>
                                <th class="fw-bold">Nombre</th>
                                <th class="fw-bold">Cédula</th>
                                <th class="fw-bold">Descripción</th>
                                <th class="fw-bold">Medicamento</th>
                                <th class="fw-bold">Resuelto</th>
                                <th class="fw-bold">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($query): ?>
                                <?php while ($row = mysqli_fetch_assoc($query)): ?>
                                    <tr>
                                        <td><?= $row['id'] ?></td>
                                        <td><?= $row['nombre'] ?></td>
                                        <td><?= $row['cedula'] ?></td>
                                        <td><?= $row['descripcion'] ?></td>
                                        <td><?= $row['medicamento'] ?></td>
                                        <td>
                                            <span class="badge <?= $row['resuelto'] ? 'bg-success' : 'bg-warning' ?>">
                                                <?= $row['resuelto'] ? 'Sí' : 'No' ?>
                                            </span>
                                        </td>
                                        <td>
                                            <a href="editar_paciente.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-primary rounded-2 me-2">
                                                <i class="fas fa-edit"></i> Editar
                                            </a>
                                            <a href="eliminar_paciente.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger rounded-2"
                                                onclick="return confirm('¿Eliminar este paciente?')">
                                                <i class="fas fa-trash"></i> Eliminar
                                            </a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
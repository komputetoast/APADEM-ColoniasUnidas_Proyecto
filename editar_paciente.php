<?php
require('pacientes_cxn.php');
$con = connection();

$id = (int) $_GET['id'];

// Si se envió el formulario, actualizar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nombre      = mysqli_real_escape_string($con, $_POST['nombre']);
  $cedula      = mysqli_real_escape_string($con, $_POST['cedula']);
  $descripcion = mysqli_real_escape_string($con, $_POST['descripcion']);
  $medicamento = mysqli_real_escape_string($con, $_POST['medicamento']);
  $resuelto    = isset($_POST['resuelto']) ? 1 : 0;

  $sql = "UPDATE pacientes SET
                nombre      = '$nombre',
                cedula      = '$cedula',
                descripcion = '$descripcion',
                medicamento = '$medicamento',
                resuelto    = '$resuelto'
            WHERE id = $id";

  mysqli_query($con, $sql);

  header("Location: pacientes.php");
  exit();
}

// Cargar datos actuales del paciente
$sql      = "SELECT * FROM pacientemedico WHERE id = $id";
$query    = mysqli_query($con, $sql);
$paciente = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar paciente</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
  <link rel="icon" type="image/x-icon" href="/img/favicon.ico" />
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/mdb.min.css" />
  <script type="text/javascript" src="js/mdb.umd.min.js"></script>
  <link rel="stylesheet" href="styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<style>
  body {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    background-color: #f8f9fa;
  }

  .container-form {
    background-color: white;
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 500px;
  }

  h1 {
    text-align: center;
    margin-bottom: 2rem;
    color: #333;
  }

  .form-group {
    margin-bottom: 1.5rem;
  }

  .form-control {
    border-radius: 4px;
  }

  .form-check {
    margin-bottom: 1.5rem;
  }

  .btn-container {
    display: flex;
    gap: 1rem;
    justify-content: center;
  }

  .btn-container button,
  .btn-container a {
    flex: 1;
  }
</style>
</head>

<body>

  <div class="container-form">
    <h1>Editar paciente</h1>

    <form action="editar_paciente.php?id=<?= $id ?>" method="POST">

      <div class="form-group">
        <input type="text" class="form-control" name="nombre"
          value="<?= $paciente['nombre'] ?>" placeholder="Nombre" required>
      </div>

      <div class="form-group">
        <input type="number" class="form-control" name="cedula"
          value="<?= $paciente['cedula'] ?>" placeholder="Cédula" required>
      </div>

      <div class="form-group">
        <input type="text" class="form-control" name="descripcion"
          value="<?= $paciente['descripcion'] ?>" placeholder="Descripción">
      </div>

      <div class="form-group">
        <input type="text" class="form-control" name="medicamento"
          value="<?= $paciente['medicamento'] ?>" placeholder="Medicamento">
      </div>

      <div class="form-check form-group">
        <input type="checkbox" class="form-check-input" id="resuelto" name="resuelto" value="1"
          <?= $paciente['resuelto'] ? 'checked' : '' ?>>
        <label class="form-check-label" for="resuelto">
          Resuelto
        </label>
      </div>

      <div class="btn-container">
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
        <a href="pacientes.php" class="btn btn-secondary">Cancelar</a>
      </div>

    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
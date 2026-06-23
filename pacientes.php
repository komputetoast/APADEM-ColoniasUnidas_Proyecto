<?php
require('pacientes_cxn.php');
$con = connection();

$sql = "SELECT * FROM nombre";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es>
<head>
  <link rel="icon" type="image/x-icon" href="/img/favicon.ico" />
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/mdb.min.css" />
  <script type="text/javascript" src="js/mdb.umd.min.js"></script>
  <link rel="stylesheet" href="styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <title>Pacientes</title>
</head>

<body>
    <h1>Aplicacion para pacientes de APADEM, se agregara pronto</h1>
    <div class="form-group">
        <form action="">
            <input type="text" name="nombre" placeholder="Nombre">
            <input type="text" name="cedula" placeholder="Cedula">
            <input type="text" name="descripcion" placeholder="Descripcion">
            <input type="text" name="medicamento" placeholder="Medicamento">
            <input type="checkbox" name="resuelto">
            <input type="submit" value="Agregar paciente">
        </form>
    </div>
    
    <div class="table">
    <table>
        <thread>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Cedula</th>
                <th>Descripcion</th>
                <th>Medicamento</th>
                <th>Resuelto</th>
            </tr>
            <tbody>
                <?php while($row = mysqli_fetch_array($query)): ?>
                <tr>
                    <th><?= $row['id'] ?> ?></th>
                    <th><?= $row['nombre'] ?> ?></th>
                    <th><?= $row['cedula'] ?> ?></th>
                    <th><?= $row['descripcion'] ?> ?></th>
                    <th><?= $row['medicamento'] ?> ?></th>
                    <th><?= $row['resuelto'] ?> ?></th>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </thread>
    </table>
    </div>
</body>

</html>
<?php
require('pacientes_cxn.php');
$con = connection();

$nombre      = mysqli_real_escape_string($con, $_POST['nombre']);
$cedula      = mysqli_real_escape_string($con, $_POST['cedula']);
$descripcion = mysqli_real_escape_string($con, $_POST['descripcion']);
$medicamento = mysqli_real_escape_string($con, $_POST['medicamento']);
$resuelto    = isset($_POST['resuelto']) ? 1 : 0;

$sql = "INSERT INTO pacientemedico (nombre, cedula, descripcion, medicamento, resuelto)
        VALUES ('$nombre', '$cedula', '$descripcion', '$medicamento', '$resuelto')";

mysqli_query($con, $sql);

header("Location: pacientes.php");
exit();
?>
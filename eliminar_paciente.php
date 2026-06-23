<?php
require('pacientes_cxn.php');
$con = connection();

$id = (int) $_GET['id'];

$sql = "DELETE FROM pacientemedico WHERE id = $id";
mysqli_query($con, $sql);

header("Location: pacientes.php");
exit();
?>
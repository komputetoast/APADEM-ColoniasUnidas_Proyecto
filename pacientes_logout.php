<?php
session_start();
session_destroy();
header("Location: pacientes_sesion.php");
exit();
?>
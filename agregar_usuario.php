<?php
//Programa temporal para agregar usuario designado para acceder al sistema, ejecutar solamente una vez
require('pacientes_cxn2.php');

$servername = "127.0.0.1";
$username   = "root";
$password   = "";
$dbname     = "personalapadem";

$correo   = "ejemploadmin@apadem.com";
$password = password_hash("ejemplo3003", PASSWORD_BCRYPT);
$admin    = 1;

$sql  = $pdo->prepare("INSERT INTO usuarios (correo, password, admin) VALUES (?, ?, ?)");
$sql->execute([$correo, $password, $admin]);

echo "Usuario creado correctamente.";
?>
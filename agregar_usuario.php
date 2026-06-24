<?php
require('pacientes_cxn2.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $role = $_POST['role']; // Si quieres permitir que el admin lo elija

    // Hash de la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insertar en la base de datos
    $sql = "INSERT INTO users (username, password, email, role) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $hashed_password, $email, $role]);

    echo "Usuario registrado con éxito.";
}
?>

<form method="post">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="email" name="email" placeholder="Email" required>
    <select name="role">
        <option value="user">Usuario</option>
        <option value="admin">Administrador</option>
    </select>
    <button type="submit">Register</button>
</form>
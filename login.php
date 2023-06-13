<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <form method="post" action="login.php">
        <label for="username">Nome de usuário:</label>
        <input type="text" name="username" id="username" required><br><br>
        <label for="password">Senha:</label>
        <input type="password" name="password" id="password" required><br><br>
        <input type="submit" value="Entrar">
    </form>
</body>

</html>
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $usuarios = json_decode(file_get_contents('usuarios.json'), true);

    $autenticado = false;

    foreach ($usuarios as $usuario) {
        if ($usuario['username'] === $username && $usuario['password'] === $password) {
            $autenticado = true;
            break;
        }
    }

    if ($autenticado) {
        $_SESSION['username'] = $username;
        header("Location: https://github.com/MarcusViny");
        exit();
    } else {
        // Se chegou até aqui, significa que as credenciais são inválidas
        echo "Nome de usuário ou senha inválidos.";
    }
}
?>
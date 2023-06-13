<!DOCTYPE html>
<html lang="Pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="stylo.css">
    <title>Login</title>
</head>

<body>
    <div class="teste">
        <div class="containner">
    <h2>Login</h2>
    <form method="post" action="login.php">
        <label for="username">Nome de usuário:<span class="required">*</span></label>
        <input type="text" name="username" id="username" required><br><br>
        <label for="password">Senha:</label>
        <input type="password" name="password" id="password" required><br><br>
        <input class="btn btn-primary" type="submit" value="Entrar">
    </form>
    </div>
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
        echo "Nome de usuário ou senha inválidos.";
    }
}
?>
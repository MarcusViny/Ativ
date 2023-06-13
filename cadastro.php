<!DOCTYPE html>
<html lang="Pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Cadastro de Usuário</h2>
    <form method="post" action="cadastro.php">
        <label for="username">Nome de usuário:</label>
        <input type="text" name="username" id="username" required><br><br>
        <label for="password">Senha:</label>
        <input type="password" name="password" id="password" required><br><br>
        <label for="confirm_password">Confirme a senha:</label>
        <input type="password" name="confirm_password" id="confirm_password" required><br><br>
        <input type="submit" value="Cadastrar">

</body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = md5($_POST["password"]); // Gera o hash md5 da senha

    $usuarios = json_decode(file_get_contents('usuarios.json'), true);

    $usuarios[] = ["username" => $username, "password" => $password];

    file_put_contents('usuarios.json', json_encode($usuarios));

    header("Location: login.php");
    exit();
}
?>

</html>
<!DOCTYPE html>
<html lang="Pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="stylo.css">
    <title>Document</title>
</head>

<body class="p-3 m-0 border-0 bd-example m-0 border-0">
    <div class="teste">
        <h1>Cadastro de Usuário</h1>
        <form method="post" action="cadastro.php">
            <label for="username">Nome de usuário:<span class="required">*</span></label>
            <input type="text" name="username" id="username" required><br><br>
            <label for="password">Senha:<span class="required">*</span></label>
            <input type="password" name="password" id="password" required><br><br>
            <label for="confirm_password">Confirme a senha:<span class="required">*</span></label>
            <input type="password" name="confirm_password" id="confirm_password" required><br><br>
            <input class="btn btn-primary" type="submit" value="Cadastrar">
        </form>
    </div>
</body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    $usuarios = json_decode(file_get_contents('usuarios.json'), true);
    $usuarios[] = ["username" => $username, "password" => $password];

    file_put_contents('usuarios.json', json_encode($usuarios));

    header("Location: login.php");
    exit();
}
?>
</html>
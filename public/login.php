<?php
session_start();

require_once "C:/Turma2/xampp/htdocs/lanchonete/db/database.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link rel="stylesheet" href="css/login.css">
</head>

<body>

    <div class="login">

        <h2>Login</h2>

        <form method="POST">

            <input class="input" type="email" name="email" placeholder="Email" required><br><br>

            <input class="input" type="password" name="senha" placeholder="Senha" required><br><br>

            <button class="btn btn-primary" type="submit">Entrar</button>
            

        </form>

        <p class="login-link">
            Não tem conta? <a href="cadastro.php">Cadastrar</a>
        </p>

    </div>

</body>

</html>

<?php

require_once "C:/Turma2/xampp/htdocs/lanchonete/controller/UsuarioController.php";

$usuarioController = new UsuarioController($pdo);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuarioController->login($email, $senha);
}
?>
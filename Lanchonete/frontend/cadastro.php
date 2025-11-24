<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cadastro</h1>

    <form method="POST">
        <label for="nome">Nome:</label>
    <input type="text" name="nome" placeholder="Nome" required>

    <label for="email">Email:</label>
    <input type="email" name="email" placeholder="Email" required>

    <label for="senha">Senha:</label>
    <input type="password" name="senha" placeholder="Senha" required>

    <label for="telefone">Telefone:</label>
    <input type="text" name="telefone" placeholder="Telefone">

    <button type="submit">Cadastrar</button>
</form>
</body>
</html>

<?php

require_once "C:/Turma1/xampp/htdocs/lanchonete/Lanchonete/backend/Controller/UsuarioController.php";
require_once "C:/Turma1/xampp/htdocs/lanchonete/Lanchonete/backend/DB/database.php";

$usuarioController = new UsuarioController($pdo);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];

    $usuarioController->cadastrar($nome, $email, $senha, $telefone);
    header('Location: login.php');
}



?>
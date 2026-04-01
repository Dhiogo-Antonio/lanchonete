<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro do Produto</title>
</head>
<body>
    <form method="POST">

<input type="text" name="nome" placeholder="Nome" required>

<input type="email" name="email" placeholder="Email">

<input type="text" name="telefone" placeholder="Telefone">

<input type="password" name="senha" placeholder="Senha" required><br><br>

<button type="submit">Cadastrar</button>



</form>

</body>
</html>

<?php

require_once "C:/Turma2/xampp/htdocs/lanchonete/controller/UsuarioController.php";
require_once "C:/Turma2/xampp/htdocs/lanchonete/db/database.php";

$usuarioController = new UsuarioController($pdo);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];

     $participanteController->cadastrar($nome, $email, $telefone, $senha);
    header('Location: ../../admin/index.php');

}

?>
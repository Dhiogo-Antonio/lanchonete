

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="senha" placeholder="Senha" required>
    <button type="submit">Entrar</button>
</form>
</body>
</html>
<?php

require_once "C:/Turma1/xampp/htdocs/lanchonete/Lanchonete/backend/Controller/UsuarioController.php";
require_once "C:/Turma1/xampp/htdocs/lanchonete/Lanchonete/backend/DB/database.php";

$usuarioController = new UsuarioController($pdo);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    $usuarioController->login($email, $senha);
    header('Location: index.php');
    
}



?>
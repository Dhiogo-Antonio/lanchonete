<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/tables.css">

</head>
<body>
    <nav>
    <div><strong>Painel Admin</strong></div>

    <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="usuarios.php">Usuários</a></li>
        <li><a href="produtos.php">Produtos</a></li>
        <li><a href="logout.php">Sair</a></li>
    </ul>
</nav>
</body>
</html>
<?php

session_start();
require_once "C:/Turma2/xampp/htdocs/lanchonete/db/database.php";
require_once "C:/Turma2/xampp/htdocs/lanchonete/controller/UsuarioController.php";

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}


$usuario = $_SESSION['usuario'];
$usuarioController = new UsuarioController($pdo);

$usuarios = $usuarioController->listar();


?>

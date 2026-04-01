<?php
session_start();
require_once "C:/Turma2/xampp/htdocs/lanchonete/db/database.php";
require_once "C:/Turma2/xampp/htdocs/lanchonete/controller/ProdutoController.php";

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$usuario = $_SESSION['usuario'];

$produtoController = new ProdutoController($pdo);
$produtos = $produtoController->listarTodosProdutos();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
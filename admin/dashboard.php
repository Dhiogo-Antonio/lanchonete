<?php
session_start();
require_once "C:/Turma2/xampp/htdocs/lanchonete/db/database.php";

if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['tipo'] != 'admin') {
    header("Location: ../login.php");
    exit;
}

$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/dashboard.css">
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

<div class="container">

    <h2>Dashboard</h2>

    <div class="grid">

        <div class="card metric">
            <h3>120</h3>
            <p>Pedidos</p>
        </div>

        <div class="card metric">
            <h3>R$ 2.500</h3>
            <p>Faturamento</p>
        </div>

        <div class="card metric">
            <h3>35</h3>
            <p>Produtos</p>
        </div>

    </div>
</div>

</body>
</html>


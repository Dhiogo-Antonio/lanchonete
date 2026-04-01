<?php
session_start();

require_once "C:/Turma2/xampp/htdocs/lanchonete/db/database.php";
require_once "C:/Turma2/xampp/htdocs/lanchonete/controller/CarrinhoController.php";

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$usuario_id = $_SESSION['usuario']['id'];
$produto_id = $_POST['produto_id'];

$carrinhoController = new CarrinhoController($pdo);
$carrinhoController->adicionar($usuario_id, $produto_id);

header("Location: ../index.php");
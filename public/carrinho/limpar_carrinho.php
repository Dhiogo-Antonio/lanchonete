<?php
session_start();

require_once "C:/Turma2/xampp/htdocs/lanchonete/db/database.php";
require_once "C:/Turma2/xampp/htdocs/lanchonete/controller/CarrinhoController.php";

$usuario_id = $_SESSION['usuario']['id'];

$carrinhoController = new CarrinhoController($pdo);
$carrinhoController->limpar($usuario_id);

header("Location: carrinho.php");
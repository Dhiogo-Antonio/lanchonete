<?php
require_once "C:/Turma2/xampp/htdocs/lanchonete/db/database.php";
require_once "C:/Turma2/xampp/htdocs/lanchonete/controller/CarrinhoController.php";

$id = $_GET['id'];

$carrinhoController = new CarrinhoController($pdo);
$carrinhoController->remover($id);

header("Location: carrinho.php");
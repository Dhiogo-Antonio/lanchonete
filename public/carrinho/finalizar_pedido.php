<?php
session_start();

require_once "C:/Turma2/xampp/htdocs/lanchonete/db/database.php";
require_once "C:/Turma2/xampp/htdocs/lanchonete/controller/CarrinhoController.php";

if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.php");
    exit;
}

$usuario = $_SESSION['usuario'];
$usuario_id = $usuario['id'];

$carrinhoController = new CarrinhoController($pdo);
$itens = $carrinhoController->listar($usuario_id);

if (empty($itens)) {
    echo "Carrinho vazio!";
    exit;
}

$mensagem = "Pedido - Brutal Lanches %0A%0A";

$total = 0;

foreach ($itens as $item) {
    $subtotal = $item['preco'] * $item['quantidade'];
    $total += $subtotal;

    $mensagem .= "• {$item['nome']} %0A";
    $mensagem .= "Qtd: {$item['quantidade']} %0A";
    $mensagem .= "Subtotal: R$ " . number_format($subtotal, 2, ',', '.') . " %0A%0A";
}

$mensagem .= "Total: R$ " . number_format($total, 2, ',', '.') . "* %0A%0A";
$mensagem .= "Cliente: {$usuario['nome']}";


// SEU NÚMERO (coloque com DDD, sem espaços ou traços)
$numero = "5599999999999";

// LINK WHATSAPP
// LIMPA O CARRINHO
$carrinhoController->limpar($usuario_id);

// LINK WHATSAPP
$link = "https://wa.me/$numero?text=$mensagem";

// Redireciona
header("Location: $link");
exit;

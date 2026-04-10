<?php
session_start();

require_once "C:/Turma2/xampp/htdocs/lanchonete/db/database.php";
require_once "C:/Turma2/xampp/htdocs/lanchonete/controller/CarrinhoController.php";

$usuario_id = $_SESSION['usuario']['id'];

$carrinhoController = new CarrinhoController($pdo);
$itens = $carrinhoController->listar($usuario_id);

$total = 0;
?>
<link rel="stylesheet" href="../css/carrinho.css">
<h2>Seu Carrinho</h2>

<?php foreach ($itens as $item): 
    $subtotal = $item['preco'] * $item['quantidade'];
    $total += $subtotal;
?>

<div class="item-carrinho">

    <img src="../<?= $item['imagem'] ?>" alt="">

    <div class="info">
        <h3><?= $item['nome'] ?></h3>
        <p>Quantidade: <?= $item['quantidade'] ?></p>
        <p>Subtotal: R$ <?= number_format($subtotal, 2, ',', '.') ?></p>
    </div>

    <a class="remover" href="remover_item.php?id=<?= $item['id'] ?>">Remover</a>

</div>

<?php endforeach; ?>

<div class="total">
    Total: R$ <?= number_format($total, 2, ',', '.') ?>
</div>

<div class="botoes">
<form method="POST" action="finalizar_pedido.php">
    <button class="finalizar" type="submit">Fazer Pedido</button>
</form>

<a href="../index.php">Voltar ao Cardápio</a>
</div>
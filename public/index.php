<?php
session_start();
require_once "C:/Turma2/xampp/htdocs/lanchonete/db/database.php";
require_once "C:/Turma2/xampp/htdocs/lanchonete/controller/ProdutoController.php";
require_once "C:/Turma2/xampp/htdocs/lanchonete/controller/CarrinhoController.php";

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$usuario = $_SESSION['usuario'];

$produtoController = new ProdutoController($pdo);
$produtos = $produtoController->listarTodosProdutos();


$carrinhoController = new CarrinhoController($pdo);
$totalCarrinho = $carrinhoController->contarItens($usuario['id']);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Início</a></li>
                <li><a href="produtos.php">Cardápio</a></li>
                <li><a href="contato.php">Contato</a></li>
            </ul>


            <div class="actions">


                <div style="position: relative;">
                    <a href="carrinho/carrinho.php">
                        <img src="img/shopping_cart_24dp_000000_FILL0_wght400_GRAD0_opsz24.png" width="30">

                        <?php if ($totalCarrinho > 0): ?>
                            <span class='span'>
                                <?= $totalCarrinho ?>
                            </span>
                        <?php endif; ?>
                    </a>
                </div>


                <?php if ($usuario['tipo'] == 'admin'): ?>
                    <a class="btn btn-success" href="../admin/dashboard.php">Admin</a>
                <?php endif; ?>

                <a class="btn btn-danger" href="logout.php">Sair</a>
            </div>
        </nav>
    </header>

    <section>
        <h2>Cardápio</h2>

        <div class="produtos">

            <?php foreach ($produtos as $produto): ?>

             <div class="produto" onclick="abrirModal(
    '<?= addslashes($produto['nome']) ?>',
    '<?= addslashes($produto['descricao']) ?>',
    '<?= $produto['preco'] ?>',
    '<?= $produto['imagem'] ?>',
    '<?= $produto['id'] ?>'
)">

                    <img src="<?= $produto['imagem'] ?>" width="150">

                    <h3><?= $produto['nome'] ?></h3>

                    <p><?= $produto['descricao'] ?></p>

                    <p><strong>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></strong></p>

                    <form method="POST" action="carrinho/adicionar_carrinho.php">
                        <input type="hidden" name="produto_id" value="<?= $produto['id'] ?>">
                        <button type="submit">Adicionar ao carrinho</button>
                    </form>

                </div>

            <?php endforeach; ?>

        </div>
    </section>

<div id="modal" class="modal">
    <div class="modal-content">

        <span class="fechar" onclick="fecharModal()">&times;</span>

        <img id="modal-img" src="">

        <div class="modal-info">
            <h2 id="modal-nome"></h2>

            <p id="modal-desc"></p>

            <p class="modal-preco" id="modal-preco"></p>

            <div class="modal-actions">
                <form method="POST" action="carrinho/adicionar_carrinho.php">
                    <input type="hidden" name="produto_id" id="modal-produto-id">
                    <button class="btn-add" type="submit">Adicionar ao carrinho</button>
                </form>

                <button class="btn-voltar" onclick="fecharModal()">Voltar</button>
            </div>
        </div>

    </div>
</div>
<script src="js/script.js"></script>
</body>
</html>

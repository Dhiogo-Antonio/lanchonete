<?php
session_start();

require_once  "C:/Turma2/xampp/htdocs/lanchonete/db/database.php";
require_once  "C:/Turma2/xampp/htdocs/lanchonete/controller/ProdutoController.php";
require_once  "C:/Turma2/xampp/htdocs/lanchonete/controller/CarrinhoController.php";

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$usuario = $_SESSION['usuario'];

if (!isset($usuario['id'], $usuario['tipo'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}

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
    <title>Brutal Lanches</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- HEADER -->
    <header>
        <nav>

            <div class="logo">
                <h1>Brutal <span>Lanches</span></h1>
            </div>

            <ul>
                <li><a href="#inicio">Início</a></li>
                <li><a href="#cardapio">Cardápio</a></li>
                <li><a href="#contato">Contato</a></li>
            </ul>

            <div class="actions">

                <div style="position: relative;">
                    <a href="carrinho/carrinho.php">
                        <img src="img/shopping_cart_24dp_000000_FILL0_wght400_GRAD0_opsz24.png"
                             width="30" alt="Carrinho">
                        <?php if ($totalCarrinho > 0): ?>
                            <span class="span"><?= (int) $totalCarrinho ?></span>
                        <?php endif; ?>
                    </a>
                </div>

                <?php if ($usuario['tipo'] === 'admin'): ?>
                    <a class="btn btn-success" href="admin/dashboard.php">Admin</a>
                <?php endif; ?>

                <a class="btn btn-danger" href="logout.php">Sair</a>

            </div>
        </nav>
    </header>

    <!-- HERO -->
    <section class="main" id="inicio">
        <div class="main-content">
            <h1>Bem-vindo à Brutal Lanches!</h1>
            <p>Os melhores lanches da cidade, feitos na hora</p>
            <a href="#cardapio" class="btn-main">Ver Cardápio</a>
        </div>
    </section>

    <!-- CARDÁPIO -->
    <section class="cardapio" id="cardapio">
        <h2>Cardápio</h2>

        <div class="produtos">
            <?php if (empty($produtos)): ?>
                <p style="text-align:center; color:#aaa; grid-column:1/-1;">
                    Nenhum produto disponível no momento.
                </p>
            <?php else: ?>
                <?php foreach ($produtos as $produto): ?>
                    <div class="produto" onclick="abrirModal(
                        '<?= htmlspecialchars(addslashes($produto['nome']),    ENT_QUOTES) ?>',
                        '<?= htmlspecialchars(addslashes($produto['descricao']), ENT_QUOTES) ?>',
                        '<?= number_format($produto['preco'], 2, ',', '.') ?>',
                        '<?= htmlspecialchars($produto['imagem'], ENT_QUOTES) ?>',
                        '<?= (int) $produto['id'] ?>'
                    )">
                        <img src="<?= htmlspecialchars($produto['imagem']) ?>"
                             alt="<?= htmlspecialchars($produto['nome']) ?>">

                        <h3><?= htmlspecialchars($produto['nome']) ?></h3>
                        <p><?= htmlspecialchars($produto['descricao']) ?></p>
                        <p><strong>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></strong></p>

                        <!-- stopPropagation impede que o clique no form abra o modal -->
                        <form method="POST" action="carrinho/adicionar_carrinho.php"
                              onclick="event.stopPropagation()">
                            <input type="hidden" name="produto_id" value="<?= (int) $produto['id'] ?>">
                            <button type="submit">Adicionar ao carrinho</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>

    <!-- CONTATO -->
<section class="contato" id="contato">
    <div class="contato-container">

        <div class="contato-info">
            <h2>Fale <span>Conosco</span></h2>
            <p>Tem alguma dúvida, sugestão ou quer fazer um pedido especial? Entre em contato!</p>

            <ul class="contato-lista">
                <li>
                    <img src="img/icons/location.png" alt="Endereço">
                    <span>Rua dos Lanches, 42 — Centro, São Paulo/SP</span>
                </li>
                <li>
                    <img src="img/icons/phone.png" alt="Telefone">
                    <span>(11) 99999-9999</span>
                </li>
                <li>
                    <img src="img/icons/email.png" alt="E-mail">
                    <span>contato@brutallanches.com.br</span>
                </li>
                <li>
                    <img src="img/icons/clock.png" alt="Horário">
                    <span>Seg–Sex: 11h às 23h &nbsp;|&nbsp; Sáb–Dom: 11h às 00h</span>
                </li>
            </ul>
        </div>

        <form class="contato-form" onsubmit="enviarContato(event)">
            <h3>Envie uma mensagem</h3>

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" id="nome" placeholder="Seu nome" required>
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" placeholder="seu@email.com" required>
            </div>

            <div class="form-group">
                <label for="mensagem">Mensagem</label>
                <textarea id="mensagem" rows="4" placeholder="Escreva sua mensagem..." required></textarea>
            </div>

            <button type="submit" class="btn-contato">Enviar mensagem</button>
            <p id="contato-feedback" class="contato-feedback"></p>
        </form>

    </div>
</section>

    <!-- MODAL -->
    <div id="modal" class="modal" onclick="fecharModalFora(event)">
        <div class="modal-content">

            <span class="fechar" onclick="fecharModal()">&times;</span>

            <img id="modal-img" src="" alt="Imagem do produto">

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
    <script>
        function abrirModal(nome, descricao, preco, imagem, id) {
            document.getElementById('modal-nome').textContent  = nome;
            document.getElementById('modal-desc').textContent  = descricao;
            document.getElementById('modal-preco').textContent = 'R$ ' + preco;
            document.getElementById('modal-img').src           = imagem;
            document.getElementById('modal-produto-id').value  = id;
            document.getElementById('modal').style.display     = 'flex';
            document.body.style.overflow                       = 'hidden';
        }

        function enviarContato(e) {
    e.preventDefault();
    const feedback = document.getElementById('contato-feedback');
    feedback.textContent = '✔ Mensagem enviada! Entraremos em contato em breve.';
    feedback.style.color = '#ffd700';
    e.target.reset();
    setTimeout(() => feedback.textContent = '', 4000);
}

        function fecharModal() {
            document.getElementById('modal').style.display = 'none';
            document.body.style.overflow = '';
        }

        // Fecha ao clicar no fundo escuro
        function fecharModalFora(event) {
            if (event.target === document.getElementById('modal')) {
                fecharModal();
            }
        }

        // Fecha com a tecla ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') fecharModal();
        });
    </script>

</body>
</html>
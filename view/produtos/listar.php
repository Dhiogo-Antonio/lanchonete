<?php
echo "<section id='tables' class='secao-tables'>";

echo "<h1 class='titulo'>Gerenciamento de Produtos</h1>";
echo "<a href='dashboard.php' class='btn-voltar'>Voltar</a>";

if(empty($produtos)){
    echo "<div class='links area-vazia'>";
    echo "<p class='mensagem-vazia'>Nenhum produto encontrado!</p>";
    echo "<br>
<a href='../view/produtos/cadastro.php' class='cadastro btn-cadastro'>Cadastrar novo produto</a>";
    echo "</div>";
    return;
}

echo "<tr><td><a href='../view/produtos/cadastro.php' class='btn-cadastro'>Cadastrar</a></td></tr>";

echo "<table class='tabela'>";
echo "<thead class='tabela-cabecalho'>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Estoque</th>
            <th>Imagem</th>
            <th>Ações</th>
        </tr>
      </thead>
      <tbody class='tabela-corpo'>";

foreach($produtos as $produto){
    $id = $produto['id'];

    echo "<tr class='linha'>";
    echo "<td>{$id}</td>";
    echo "<td>{$produto['nome']}</td>";
    echo "<td>{$produto['descricao']}</td>";
    echo "<td>{$produto['preco']}</td>";
    echo "<td>{$produto['estoque']}</td>";
    echo "<td>{$produto['imagem']}</td>";
    echo "<td class='acoes'>
            <a href='../view/produtos/editar.php?id={$id}' class='btn btn-editar'>Editar</a> |
            <a href='../view/produtos/deletar.php?id={$id}' class='btn btn-deletar'
               onclick=\"return confirm('Tem certeza que deseja excluir este produto?')\">
               Deletar
            </a>
          </td>";
    echo "</tr>";
}

echo "</tbody></table>";
echo "</section>";
?>
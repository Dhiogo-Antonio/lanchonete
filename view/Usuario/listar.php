<?php
echo "<section id='tables' class='secao-tables'>";

echo "<h1 class='titulo'>Gerenciamento de Usuários</h1>";
echo "<a href='dashboard.php' class='btn-voltar'>Voltar</a>";

if(empty($usuarios)){
    echo "<div class='links area-vazia'>";
    echo "<p class='mensagem-vazia'>Nenhum usuário encontrado!</p>";
    echo "<br>
<a href='../view/usuarios/cadastro.php' class='cadastro btn-cadastro'>Cadastrar novo usuário</a>";
    echo "</div>";
    return;
}

echo "<tr><td><a href='../view/usuarios/cadastro.php' class='btn-cadastro'>Cadastrar</a></td></tr>";

echo "<table class='tabela'>";
echo "<thead class='tabela-cabecalho'>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Tipo</th>
            <th>Ações</th>
        </tr>
      </thead>
      <tbody class='tabela-corpo'>";

foreach($usuarios as $usuario){
    $id = $usuario['id'];

    echo "<tr class='linha'>";
    echo "<td>{$id}</td>";
    echo "<td>{$usuario['nome']}</td>";
    echo "<td>{$usuario['email']}</td>";
    echo "<td>{$usuario['telefone']}</td>";
    echo "<td>{$usuario['tipo']}</td>";
    echo "<td class='acoes'>
            <a href='../view/usuario/editar.php?id={$id}' class='btn btn-editar'>Editar</a> |
            <a href='../view/usuario/deletar.php?id={$id}' class='btn btn-deletar' 
               onclick=\"return confirm('Tem certeza que deseja excluir este usuário?')\">
               Deletar
            </a>
          </td>";
    echo "</tr>";
}

echo "</tbody></table>";
echo "</section>";
?>
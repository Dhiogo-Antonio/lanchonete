<?php
require_once "C:/Turma2/xampp/htdocs/lanchonete/controller/UsuarioController.php";
require_once "C:/Turma2/xampp/htdocs/lanchonete/db/database.php";

$usuarioController = new UsuarioController($pdo);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $usuarios = $usuarioController->buscarUsuario($id);



?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuario</title>
</head>
<body>
    <form method="post">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" value="<?=$usuarios['nome'];?>" required><br>

    <label for="email">Email:</label>
    <input type="text" name="email" value="<?=$usuarios['email'];?>" required><br>

    <label for="telefone">Telefone:</label>
    <input type="text" name="telefone" value="<?=$usuarios['telefone'];?>" required><br>

    <label for="senha">Senha:</label>
    <input type="password" name="senha" value="<?=$usuarios['senha'];?>" required><br>

    <input type="submit">
    </form>
</body>
</html>

<?php
} else{
    header('Location: listar.php');
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];

    $usuarioController->editar($nome, $email, $telefone, $senha, $id);

    header('Location: ../../admin/index.php');

}

?>

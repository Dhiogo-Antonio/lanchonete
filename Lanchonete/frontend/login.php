<?php
session_start();
require_once "C:/Turma1/xampp/htdocs/lanchonete/Lanchonete/backend/Controller/UsuarioController.php";
require_once "C:/Turma1/xampp/htdocs/lanchonete/Lanchonete/backend/DB/database.php";

$usuarioController = new UsuarioController($pdo);

$msgErro = "";

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuario = $usuarioController->login($email, $senha);

    if($usuario){
        
        $_SESSION['usuario_id']   = $usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['nome'];
        $_SESSION['usuario_email'] = $usuario['email'];

        header("Location: index.php");
        exit;
    } else {
        $msgErro = "Email ou senha incorretos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

<h1>Login</h1>

<?php if($msgErro): ?>
    <p style="color:red"><?= $msgErro ?></p>
<?php endif; ?>

<form method="POST">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="senha" placeholder="Senha" required>
    <button type="submit">Entrar</button>
</form>

</body>
</html>

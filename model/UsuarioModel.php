<?php

class UsuarioModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

        public function buscarTodos(){
        $stmt = $this->pdo->query('SELECT * FROM usuarios');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

     public function listar(){
        $usuarios = $this->buscarTodos();
        include_once "C:/Turma2/xampp/htdocs/gerenciamento-eventos/view/usuarios/listar.php";
        return;
    }

    public function buscarUsuario($id) {
        $stmt = $this->pdo->query("SELECT * FROM usuarios WHERE id = $id");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function cadastrar($nome, $email, $telefone, $senha) {
        $stmt = $this->pdo->prepare("INSERT INTO usuarios (nome, email, telefone, senha) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$nome, $email, $telefone, $senha]);
    }

    public function login($email, $senha){
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
        $stmt->execute([$email, $senha]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario['email'] && $usuario['senha']) {

        $_SESSION['usuario'] = [
            'id' => $usuario['id'],
            'nome' => $usuario['nome'],
            'email' => $usuario['email'],
            'tipo' => $usuario['tipo']
        ];

     if ($usuario['tipo'] == 'admin') {

            header("Location: ../admin/dashboard.php");

        } else {

            header("Location: ../public/index.php");
        }
        exit;

    } else {
        echo "Email ou senha inválidos!";
    }
   }

      public function editar($nome, $email, $telefone, $senha, $id){
        $sql = "UPDATE usuarios SET nome=?, email=?, telefone=?, senha=? WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nome, $email, $telefone, $senha, $id]); 
    }

       public function deletar($id){
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }

}




?>
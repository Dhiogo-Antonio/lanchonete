<?php

class UsuarioModel {
    private $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;

    }

    public function buscarTodos(){
        $stmt = $this->pdo->query('SELECT * FROM usuarios');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

     public function cadastrar($nome, $email, $senha, $telefone){
        $sql = "INSERT INTO usuarios (nome, email, senha, telefone) VALUES (:nome, :email, :senha, :telefone)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':senha' => $senha,
            ':telefone' => $telefone

        ]);
    }
     public function buscarUsuario($id) {
        $stmt = $this->pdo->query("SELECT * FROM usuarios WHERE id = $id");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
     public function buscarPorEmaileSenha($email, $senha) {
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = ?, senha = ?");
        $sql->execute([$email, $senha]);

        return $sql->fetch(PDO::FETCH_ASSOC);
    }

     public function login($email, $senha) {

        $usuario = $this->buscarPorEmaileSenha($email, $senha);
         if (!$usuario) {
            return false; // usuário não encontrado
        }

        if($usuario['email'] && $usuario['senha']) {
            return $usuario; // login válido
        } else {
            return false; // senha incorreta
        }
     }
}
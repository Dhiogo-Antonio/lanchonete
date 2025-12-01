<?php

class UsuarioModel {
    private $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function buscarTodos(){
        $stmt = $this->pdo->query("SELECT * FROM usuarios");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cadastrar($nome, $email, $senha, $telefone){
        $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nome, email, senha, telefone) 
                VALUES (:nome, :email, :senha, :telefone)";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':senha' => $senhaCriptografada,
            ':telefone' => $telefone
        ]);
    }

    public function buscarPorEmail($email){
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
        $sql->execute([$email]);

        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function login($email, $senha){
        $usuario = $this->buscarPorEmail($email);

        if(!$usuario){
            return false; // usuário não existe
        }

        // Verifica senha criptografada
        if(password_verify($senha, $usuario['senha'])){
            return $usuario; // login ok
        }

        return false; // senha errada
    }

    public function buscarUsuario($id){
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

<?php

require_once "C:/Turma1/xampp/htdocs/lanchonete/Lanchonete/backend/Model/UsuarioModel.php";

class UsuarioController{
    private $usuarioModel;

    public function __construct($pdo){
        $this->usuarioModel = new UsuarioModel($pdo);
    }

    public function listar(){
        return $this->usuarioModel->buscarTodos();
    }

    public function cadastrar($nome, $email, $senha, $telefone){
        return $this->usuarioModel->cadastrar($nome, $email, $senha, $telefone);
    }

    public function login($email, $senha){
        return $this->usuarioModel->login($email, $senha);
    }

    public function buscarUsuario($id){
        return $this->usuarioModel->buscarUsuario($id);
    }
}

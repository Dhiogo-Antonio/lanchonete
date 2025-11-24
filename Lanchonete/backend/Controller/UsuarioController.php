<?php

require_once "C:/Turma1/xampp/htdocs/lanchonete/Lanchonete/backend/Model/UsuarioModel.php";

class UsuarioController{
    private $usuarioModel;

    public function __construct($pdo){
        $this->usuarioModel = new UsuarioModel($pdo);
    }

     public function listar(){
        $usuarios = $this->usuarioModel->buscarTodos();
       include_once "C:/Turma1/xampp/htdocs/lanchonete/Lanchonete/backend/DB/database.php";
       return;
    }

     public function cadastrar($nome, $email, $senha, $telefone){
        return $this->usuarioModel->cadastrar($nome, $email, $senha, $telefone);
    }

    public function login($email, $senha){
        return $this->usuarioModel->Login($email, $senha);
    }

    public function buscarUsuario($id){
        $usuario = $this->usuarioModel->buscarUsuario($id);
        return $usuario;
    }
    
}
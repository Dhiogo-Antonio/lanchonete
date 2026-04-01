<?php
require_once "C:/Turma2/xampp/htdocs/lanchonete/model/UsuarioModel.php";

class UsuarioController {
    private $usuarioModel;

    public function __construct($pdo) {
        $this->usuarioModel = new UsuarioModel($pdo);
    }

    public function listar(){
        $usuarios = $this->usuarioModel->buscarTodos();
       include_once "C:/Turma2/xampp/htdocs/lanchonete/view/usuario/listar.php";
       return;
    }

     public function buscarUsuario($id){
        $usuarios = $this->usuarioModel->buscarUsuario($id);
        return $usuarios;
    }


    public function cadastrar($nome, $email, $telefone, $senha) {
        return $this->usuarioModel->cadastrar($nome, $email, $telefone, $senha);
    }

    public function login($email, $senha){
    return $this->usuarioModel->login($email, $senha);
    
    }

    public function editar($nome, $email, $telefone, $senha, $id){
        $this->usuarioModel->editar($nome, $email, $telefone, $senha, $id);
    }

    public function deletar($id){
        $usuario = $this->usuarioModel->deletar($id);
        return $usuario;
    }


}



?>
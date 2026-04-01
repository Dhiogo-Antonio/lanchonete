<?php

require_once "C:/Turma2/xampp/htdocs/lanchonete/model/CarrinhoModel.php";

class CarrinhoController {
    private $carrinhoModel;

    public function __construct($pdo) {
        $this->carrinhoModel = new CarrinhoModel($pdo);
    }

    public function adicionar($usuario_id, $produto_id) {
        return $this->carrinhoModel->adicionar($usuario_id, $produto_id);
    }

    public function listar($usuario_id) {
        return $this->carrinhoModel->listar($usuario_id);
    }

    public function remover($id) {
        return $this->carrinhoModel->remover($id);
    }

    public function limpar($usuario_id) {
        return $this->carrinhoModel->limpar($usuario_id);
    }

    public function contarItens($usuario_id) {
    return $this->carrinhoModel->contarItens($usuario_id);
}
}
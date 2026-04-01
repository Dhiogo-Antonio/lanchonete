<?php

require_once "C:/Turma2/xampp/htdocs/lanchonete/model/ProdutoModel.php";

class ProdutoController {
    private $produtoModel;

    public function __construct($pdo) {
        $this->produtoModel = new ProdutoModel($pdo);
    }

    public function listarTodosProdutos() {
        return $this->produtoModel->listarTodosProdutos();
    }
}
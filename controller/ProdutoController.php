<?php

require_once "C:/Turma2/xampp/htdocs/lanchonete/model/ProdutoModel.php";

class ProdutoController {
    private $produtoModel;

    public function __construct($pdo) {
        $this->produtoModel = new ProdutoModel($pdo);
    }

    public function listar(){
        $produtos = $this->produtoModel->listarTodosProdutos();
        include_once "C:/Turma2/xampp/htdocs/lanchonete/view/produtos/listar.php";
        return;
    }

     public function buscarProduto($id){
        $produtos = $this->produtoModel->buscarProduto($id);
        return $produtos;
    }

    public function listarTodosProdutos() {
        return $this->produtoModel->listarTodosProdutos();
    }

    
}
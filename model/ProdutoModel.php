<?php

class ProdutoModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function listarTodosProdutos() {
        $stmt = $this->pdo->query("SELECT * FROM produtos ORDER BY data ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
<?php

class ProdutoModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }


    public function buscarTodos()
    {
        $stmt = $this->pdo->query('SELECT * FROM produtos');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function listarTodosProdutos()
    {
        $stmt = $this->pdo->query("SELECT * FROM produtos ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function buscarProduto($id)
    {
        $stmt = $this->pdo->query("SELECT * FROM produtos WHERE id = $id");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function editar($nome, $descricao, $data, $horario, $local, $max_participantes, $id)
    {
        $sql = "UPDATE produtos SET nome=?, descricao=?, data=?, horario=?, local=?, max_participantes=? WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nome, $descricao, $data, $horario, $local, $max_participantes, $id]);
    }

    public function deletar($id)
    {
        $sql = "DELETE FROM produtos WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }
}

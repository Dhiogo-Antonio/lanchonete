<?php

class CarrinhoModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Adicionar produto
    public function adicionar($usuario_id, $produto_id)
    {


        $stmt = $this->pdo->prepare("
            SELECT * FROM carrinho 
            WHERE usuario_id = ? AND produto_id = ?
        ");
        $stmt->execute([$usuario_id, $produto_id]);
        $item = $stmt->fetch();

        if ($item) {

            $stmt = $this->pdo->prepare("
                UPDATE carrinho 
                SET quantidade = quantidade + 1 
                WHERE id = ?
            ");
            return $stmt->execute([$item['id']]);
        } else {

            $stmt = $this->pdo->prepare("
                INSERT INTO carrinho (usuario_id, produto_id, quantidade)
                VALUES (?, ?, 1)
            ");
            return $stmt->execute([$usuario_id, $produto_id]);
        }
    }


    public function listar($usuario_id)
    {
        $stmt = $this->pdo->prepare("
       SELECT 
    c.id,
    c.produto_id,
    c.quantidade,
    p.nome,
    p.preco,
    p.imagem
    FROM carrinho c
    JOIN produtos p ON c.produto_id = p.id
    WHERE c.usuario_id = ?
    ");
        $stmt->execute([$usuario_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function remover($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM carrinho WHERE id = ?");
        return $stmt->execute([$id]);
    }


    public function limpar($usuario_id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM carrinho WHERE usuario_id = ?");
        return $stmt->execute([$usuario_id]);
    }

    public function contarItens($usuario_id)
    {
        $stmt = $this->pdo->prepare("
        SELECT SUM(quantidade) as total 
        FROM carrinho 
        WHERE usuario_id = ?
    ");
        $stmt->execute([$usuario_id]);
        $resultado = $stmt->fetch();

        return $resultado['total'] ?? 0;
    }
}

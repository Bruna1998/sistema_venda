<?php

require_once('class_model_cadastro_produto.php');
/**
 * Model de Venda
 */
class ModelVenda{
    private $produtos = [];
    private $total = 0;

    public function adicionarProduto(ModelProduto $produto, $quantidade){
        $this->produtos[] = [
            'produto' => $produto,
            'quantidade' => $quantidade
        ];
        $this->total += $produto->getPreco() * $quantidade;
    }

    public function getProdutos(){
        return $this->produtos;
    }

    public function getTotal(){
        return $this->total;
    }
}
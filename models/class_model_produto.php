<?php

require_once('class_persistencia_produto.php');

/**
 * Model de Produto
 */
class ModelProduto{

    private $codigo;
    private $descricao;
    private $preco;
    private $quantidade;

    public function getCodigo(){
        return $this->codigo;
    }

    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getPreco(){
        return $this->preco;
    }

    public function setPreco($preco){
        $this->preco = $preco;
    }

    public function getQuantidade(){
        return $this->quantidade;
    }

    public function setQuantidade($quantidade){
        $this->quantidade = $quantidade;
    }

     /**
     * Método para cadastrar um produto
     */
    public function cadastrarProduto(){
        $oPersistenciaProduto = new PersistenciaProduto();

        $oPersistenciaProduto->inserir(
            ['descricao', 'preco', 'quantidade'],
            [$this->descricao,
             $this->preco,
             $this->quantidade
            ]
        );
    }

    /**
     * Método para alterar um produto
     * @param number $codigo
     */
    public function alterarProduto($codigo){
        $oPersistenciaProduto = new PersistenciaProduto();

        $aProduto = $oPersistenciaProduto->consultar(
            null,
            'codigo = ' . $codigo
        );

        if (count($aProduto) == 0) {
            throw new Exception('Produto não encontrado.');
        }

        $oPersistenciaProduto->alterar(
            ['descricao', 'preco', 'quantidade'],
            [
                $this->descricao,
                $this->preco,
                $this->quantidade
            ],
            'codigo = ' . $codigo
        );
    }

     /**
     * Método para excluir um produto
     * @param number $codigo
     */
    public function excluirProduto($codigo){
        $oPersistenciaProduto = new PersistenciaProduto();

        $aProduto = $oPersistenciaProduto->consultar(
            null,
            'codigo = ' . $codigo
        );

        if (count($aProduto) == 0) {
            throw new Exception('Produto não encontrado.');
        }

        $oPersistenciaProduto->excluir(
            'codigo = ' . $codigo
        );
    }

     /**
     * Método para consultar um produto
     * @param number $codigo
     * @return array
     */
    public function consultarProduto($codigo = null){
        $oPersistenciaProduto = new PersistenciaProduto();

        if ($codigo !== null) {
            return $oPersistenciaProduto->consultar(
                ['codigo', 'descricao', 'preco', 'quantidade'],
                'codigo = ' . $codigo
            );
        }

        return $oPersistenciaProduto->consultar(
            ['codigo', 'descricao', 'preco', 'quantidade']
        );
    }
}
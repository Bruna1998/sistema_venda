<?php

require_once('class_model_produto.php');

class ControllerProduto{

    public function processaAcoes(){
        $iAcao = $_POST['acao'] ?? null;

        switch ($iAcao) {
            case '1':
                $this->cadastrarProduto();
                break;

            case '2':
                $this->editarProduto();
                break;

            case '3':
                $this->excluirProduto();
                break;
            case '4':
                $this->consultarProduto();
                break;    
        }
    }

    public function cadastrarProduto(){
        $oModel = new ModelProduto();

        $oModel->setDescricao($_POST['descricao']);
        $oModel->setPreco($_POST['preco']);
        $oModel->setQuantidade($_POST['quantidade']);

        $oModel->cadastrarProduto();
    }

    public function editarProduto(){
        $oModel = new ModelProduto();

        $oModel->setDescricao($_POST['descricao']);
        $oModel->setPreco($_POST['preco']);
        $oModel->setQuantidade($_POST['quantidade']);

        $codigo = $_POST['codigo'];

        $oModel->alterarProduto($codigo);
    }

    public function excluirProduto(){
        $oModel = new ModelProduto();

        $codigo = $_POST['codigo'];

        $oModel->excluirProduto($codigo);
    }

    public function consultarProduto(){
       $oModel = new ModelProduto();

       $aProdutos = $oModel->consultarProduto();

       require_once('class_view_consultar_produtos.php');
    }
}

$oController = new ControllerProduto();
$oController->processaAcoes();
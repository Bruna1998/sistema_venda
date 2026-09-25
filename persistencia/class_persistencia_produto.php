<?php

require_once('class_persistencia_padrao.php');

/**
 * Persistência de Produto
 */
class PersistenciaProduto extends PersistenciaPadrao{

    public function __construct(){
        parent::__construct();
        $this->setTabela('tbproduto');
    }
}
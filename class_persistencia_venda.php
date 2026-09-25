<?php

/**
 * Persistência de Vendas
 */
class PersistenciaVenda extends PersistenciaPadrao{

    public function __construct(){
        parent::__construct();
        $this->setTabela('tbvenda');
    }
}
<?php


class PersistenciaPadrao{

    private $conexao;
    private $tabela;

    public function __construct(){
        $host = 'localhost';
        $port = 5432;
        $dbname = 'sistema_vendas';
        $user = 'postgres';
        $password = 'admin';

        $this->conexao = new PDO("pgsql:host=$host;port=$port;dbname=$dbname",$user,$password);

         $this->conexao->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION
        );
    }

    public function getConexao(){
        return $this->conexao;
    }

    public function getTabela(){
        return $this->tabela;
    }

    public function setTabela($tabela){
        $this->tabela = $tabela;
    }

    /**
     * Inseri um registro na tabela
     * @param string|array $xCampos
     * @param string|array $xValores
     */
    public function inserir($xCampos, $xValores){
        if (is_array($xCampos) && is_array($xValores)) {
    
            $sParametros = implode(
                ', ',
                array_fill(0, count($xValores), '?')
            );
    
            $sSql = "INSERT INTO {$this->tabela} (" .
                    implode(', ', $xCampos) .
                    ") VALUES ($sParametros)";
    
        } else {
        
            $sSql = "INSERT INTO {$this->tabela} ($xCampos) VALUES (?)";
    
            $xValores = [$xValores];
        }
    
        $stmt = $this->conexao->prepare($sSql);
        $stmt->execute($xValores);
    }

    /**
     * Realiza a alteração do valor de um campo da tabela
     * @param string|array $xCampos
     * @param string|array $xValores
     * @param string|array $xCondicao
     * @param string $sOperador
     */
    public function alterar($xCampos, $xValores, $xCondicao, $sOperador = 'and'){
        $aParametros = [];

        if (is_array($xCampos) && is_array($xValores)) {

            $aCampos = [];

            foreach ($xCampos as $i => $campo) {
                $aCampos[] = $campo . ' = ?';
                $aParametros[] = $xValores[$i];
            }

            $sCampos = implode(', ', $aCampos);

        } else {

            $sCampos = $xCampos . ' = ?';
            $aParametros[] = $xValores;
        }

        if (is_array($xCondicao) && count($xCondicao)) {
            $sCondicao = implode(" $sOperador ", $xCondicao);
        } else {
            $sCondicao = $xCondicao;
        }

        $sSql = "UPDATE {$this->tabela}
                 SET $sCampos
                 WHERE $sCondicao";

        $stmt = $this->conexao->prepare($sSql);
        $stmt->execute($aParametros);
    }

    /**
     * Realiza a exclusão de dados de uma tabela
     * @param string|array $xCondicao
     * @param string $sOperador
     */
    public function excluir($xCondicao, $sOperador = 'and'){
        
        if(is_array($xCondicao) && count($xCondicao)){
            $sCondicao = implode(" $sOperador ", $xCondicao);
        }else{
            $sCondicao = $xCondicao;
        }

        $sSql = " DELETE FROM {$this->tabela} where $sCondicao";

        $stmt = $this->conexao->prepare($sSql);
        $stmt->execute();
    }    

    /**
     * Retorna os dados da consulta de acordo com as condições informadas ou retorna todos os registros
     * @param string|array $xCampos
     * @param string|array $xCondicao
     * @param string $sOperador
     * @return array
     */
    public function consultar($xCampos = null, $xCondicao = null, $sOperador = 'and'){
        
        if(is_array($xCampos) && count($xCampos)){
            $sCampos = implode(', ', $xCampos);
        }else{
            $sCampos = $xCampos;
        }

        if(is_array($xCondicao) && count($xCondicao)){
            $sCondicao = implode(" $sOperador ", $xCondicao);
        }else if(isset($xCondicao) && $xCondicao != ''){
            $sCondicao = $xCondicao;
        }

        $sSql = '';
        if(isset($sCampos) && $sCampos != ""){
            $sSql.= " select  $sCampos from {$this->tabela} ";
        }else{
            $sSql.= " select * from {$this->tabela} ";
        }

        if(isset($sCondicao) && $sCondicao != ""){
            $sSql.= " where $sCondicao ";
        }

        
        $stmt = $this->conexao->prepare($sSql);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


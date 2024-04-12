<?php

class Produto {

    private $id;
    private $nome;
    private $precoFornecedor;
    private $precoVenda;
    private $quantidadeEstoque;
    private $idCategoria;

    function getIdCategoria() {
        return $this->idCategoria;
    }

    function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getPrecoFornecedor() {
        return $this->precoFornecedor;
    }

    function getPrecoVenda() {
        return $this->precoVenda;
    }

    function getQuantidadeEstoque() {
        return $this->quantidadeEstoque;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setPrecoFornecedor($precoFornecedor) {
        $this->precoFornecedor = $precoFornecedor;
    }

    function setPrecoVenda($precoVenda) {
        $this->precoVenda = $precoVenda;
    }

    function setQuantidadeEstoque($quantidadeEstoque) {
        $this->quantidadeEstoque = $quantidadeEstoque;
    }

    function toString() {
        return $this->nome;
    }

}

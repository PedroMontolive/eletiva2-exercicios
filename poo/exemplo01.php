<?php 

class Produto {
    public $nome;
    public $preco;
    public $descricao;
    public $categoria;
    public $usado;

    public function __construct($nome, $preco, $descricao, $categoria, $usado) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->descricao = $descricao;
        $this->categoria = $categoria;
        $this->usado = $usado;
    }

    public function precoComDesconto($valor = 0.1) {
        if ($valor > 0 && $valor <= 0.5) {
            $this->preco -= $this->preco * $valor;
        }
        return $this->preco;
    }


    public function getNome() {
        return $this->nome;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function getUsado() {
        return $this->usado;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function setUsado($usado) {
        $this->usado = $usado;
    }

    public function calculaImposto() {
        return $this->preco * 0.195;
    }
}
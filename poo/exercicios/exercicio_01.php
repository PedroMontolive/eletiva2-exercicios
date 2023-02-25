<?php

class Teste {
    public $a;
    public $b;

    public function __construct($a, $b) {
        $this->a = $a;
        $this->b = $b;
    }

    public function soma($c) {
        return $this->a + $this->b + $c;
    }
}

$teste = new Teste(1, 2);

echo $teste->soma(3);
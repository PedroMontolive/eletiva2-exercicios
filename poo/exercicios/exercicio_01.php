<?php
include('../debug.php');
class Teste {
    public int $a;
    public int $b;

    public function __construct(int $a, int $b) {
        $this->a = $a;
        $this->b = $b;
    }

    public function soma(int $c) {
        return $this->a + $this->b + $c;
    }
}

$teste = new Teste(2, 2);

echo $teste->soma(3);

Debug::dd($teste);
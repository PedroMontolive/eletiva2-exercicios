<?php

abstract class Telefone
{
    public string $ddd;
    public string $numero;

    public function __construct(string $ddd, string $numero)
    {
        $this->ddd = $ddd;
        $this->numero = $numero;
    }

    abstract public function calculaCusto(float $tempo): float;

    public function __toString()
    {
        return "DDD: {$this->ddd} | Número: {$this->numero}";
    }
}

class Fixo extends Telefone
{
    public float $custoPorMinuto;

    public function __construct(string $ddd, string $numero, float $custoPorMinuto)
    {
        parent::__construct($ddd, $numero);
        $this->custoPorMinuto = $custoPorMinuto;
    }

    public function calculaCusto(float $tempo): float
    {
        return $this->custoPorMinuto * $tempo;
    }
}

abstract class Celular extends Telefone
{
    public float $custoMinutoBase;
    public string $operadora;

    public function __construct(string $ddd, string $numero, float $custoMinutoBase, string $operadora)
    {
        parent::__construct($ddd, $numero);
        $this->custoMinutoBase = $custoMinutoBase;
        $this->operadora = $operadora;
    }

    public function __toString()
    {
        return parent::__toString() . " | Operadora: {$this->operadora}";
    }
}

class PrePago extends Celular
{
    public function __construct(string $ddd, string $numero, float $custoMinutoBase, string $operadora)
    {
        parent::__construct($ddd, $numero, $custoMinutoBase, $operadora);
    }

    public function calculaCusto(float $tempo): float
    {
        return ($this->custoMinutoBase * 1.40) * $tempo;
    }
}

class PosPago extends Celular
{

    public function __construct(string $ddd, string $numero, float $custoMinutoBase, string $operadora)
    {
        parent::__construct($ddd, $numero, $custoMinutoBase, $operadora);
    }

    public function calculaCusto(float $tempo): float
    {
        return ($this->custoMinutoBase * 0.90) * $tempo;
    }
}

$fixo = new Fixo("11", "999999999", 0.50);
$prepago = new PrePago("11", "999999999", 0.50, "Vivo");
$pospago = new PosPago("11", "999999999", 0.50, "Vivo");

echo "Fixo: " . $fixo->__toString() . " | Custo: " . $fixo->calculaCusto(10);
echo "<hr/>";
echo "PrePago: " . $prepago->__toString() . " | Custo: " . $prepago->calculaCusto(10);
echo "<hr/>";
echo "PosPago: " . $pospago->__toString() . " | Custo: " . $pospago->calculaCusto(10);



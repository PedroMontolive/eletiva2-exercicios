<?php

Class funcionario
{

    private string $nome;
    private int $codigo;
    private float $salarioBase;

    public function __construct(string $nome, int $codigo, float $salarioBase)
    {
        $this->nome = $nome;
        $this->codigo = $codigo;
        $this->salarioBase = $salarioBase;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getCodigo(): int
    {
        return $this->codigo;
    }

    public function getSalarioBase(): float
    {
        return $this->salarioBase;
    }

    public function setSalarioBase(float $salarioBase): void
    {
        $this->salarioBase = $salarioBase;
    }

    public function getSalarioLiquido(): float
    {
        $inss = $this->salarioBase * 0.11;
        $ir = 0.0;

        if($this->salarioBase > 2000.00) {
            $ir = ($this->salarioBase-2000.00) * 0.12;
        }

        return $this->salarioBase - $inss - $ir;
    }

    public function __toString()
    {
        return "Nome: {$this->nome} | Código: {$this->codigo} | Salário Base: {$this->salarioBase} | Salário Líquido: {$this->getSalarioLiquido()}";
    }

}

Class servente extends funcionario
{

    public function __construct(string $nome, int $codigo, float $salarioBase)
    {
        parent::__construct($nome, $codigo, $salarioBase);
    }

    public function getSalarioLiquido(): float
    {
        $inss = $this->getSalarioBase() * 0.11;
        $ir = 0.0;

        if($this->getSalarioBase() > 2000.00) {
            $ir = ($this->getSalarioBase()-2000.00) * 0.12;
        }

        return $this->getSalarioBase() + ($this->getSalarioBase() * 0.05) - $inss - $ir;
    }

}

Class motorista extends funcionario
{

    private string $carteiraMotorista;

    public function __construct(string $nome, int $codigo, float $salarioBase, string $carteiraMotorista)
    {
        parent::__construct($nome, $codigo, $salarioBase);
        $this->carteiraMotorista = $carteiraMotorista;
    }

    public function getCarteiraMotorista(): string
    {
        return $this->carteiraMotorista;
    }

    public function setCarteiraMotorista(string $carteiraMotorista): void
    {
        $this->carteiraMotorista = $carteiraMotorista;
    }

    public function __toString()
    {
        return parent::__toString() . " | Carteira de Motorista: {$this->carteiraMotorista}";
    }

}

Class mestreDeObras extends servente
{

    private int $funcionariosSobSeuComando;

    public function __construct(string $nome, int $codigo, float $salarioBase, int $funcionariosSobSeuComando)
    {
        parent::__construct($nome, $codigo, $salarioBase);
        $this->funcionariosSobSeuComando = $funcionariosSobSeuComando;
    }

    public function getFuncionariosSobSeuComando(): int
    {
        return $this->funcionariosSobSeuComando;
    }

    public function setFuncionariosSobSeuComando(int $funcionariosSobSeuComando): void
    {
        $this->funcionariosSobSeuComando = $funcionariosSobSeuComando;
    }

    public function getSalarioLiquido(): float
    {
        $inss = $this->getSalarioBase() * 0.11;
        $ir = 0.0;

        if($this->getSalarioBase() > 2000.00) {
            $ir = ($this->getSalarioBase()-2000.00) * 0.12;
        }

        return $this->getSalarioBase() + ($this->getSalarioBase() * 0.05) + ($this->getSalarioBase() * 0.10 * ($this->funcionariosSobSeuComando / 10)) - $inss - $ir;
    }

    public function __toString()
    {
        return parent::__toString() . " | Funcionários sob seu comando: {$this->funcionariosSobSeuComando}";
    }

}

$funcionario = new funcionario("João", 1, 3000.00);
$servente = new servente("Maria", 2, 3000.00);
$motorista = new motorista("José", 3, 3000.00, "AB");
$mestreDeObras = new mestreDeObras("Pedro", 4, 3000.00, 20);

echo $funcionario->__toString();
echo "<hr/>";
echo $servente->__toString();
echo "<hr/>";
echo $motorista->__toString();
echo "<hr/>";
echo $mestreDeObras->__toString();

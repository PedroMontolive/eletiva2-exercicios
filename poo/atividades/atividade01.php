<?php 
ini_set('display_errors', 0);
error_reporting(E_ALL);
class Ponto 
{
    private int $x;
    private int $y;
    private int $contador;

    public function __construct(int $x, int $y) 
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function setX(int $x) 
    {
        $this->x = $x;
    }

    public function setY(int $y) 
    {
        $this->y = $y;
    }

    public function getX() 
    {
        return $this->x;
    }

    public function getY() 
    {
        return $this->y;
    }

    public function deslocar(int $x, int $y) 
    {
        $this->x += $x;
        $this->y += $y;
    }

    public function setContador() 
    {
        $this->contador++;
    }

    public function getContador() 
    {
        return $this->contador;
    }

    public function calcularDistancia(Ponto $ponto) 
    {
        $x = $this->x - $ponto->getX();
        $y = $this->y - $ponto->getY();
        return sqrt(pow($x, 2) + pow($y, 2));
    }

    public function calcularDistanciaComCordenadas(int $x, int $y) 
    {
        $x = $this->x - $x;
        $y = $this->y - $y;
        return sqrt(pow($x, 2) + pow($y, 2));
    }

    public function calcularDistanciaEntreDoisPontosComCordenadas(int $x1, int $y1, int $x2, int $y2) 
    {
        $x = $x1 - $x2;
        $y = $y1 - $y2;
        return sqrt(pow($x, 2) + pow($y, 2));
    }

    public function __toString() : string
    {
        return "($this->x, $this->y)";
    }
}


echo "<h1>Atividade 01</h1>";

$ponto1 = new Ponto(1, 2);
$ponto2 = new Ponto(3, 4);

echo $ponto1->calcularDistancia($ponto2);
echo "<hr/>";
echo $ponto1->calcularDistanciaComCordenadas(8, 8);
echo "<hr/>";
echo $ponto1->calcularDistanciaEntreDoisPontosComCordenadas(4, 6, 8, 12);
echo "<hr/>";
echo $ponto1->__toString();
echo "<hr/>";
echo $ponto2->__toString();

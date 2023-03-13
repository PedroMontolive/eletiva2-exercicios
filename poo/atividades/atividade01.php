<?php 

class Ponto 
{
    private int $x;
    private int $y;
    private static int $contador = 0;

    public function __construct(int $x, int $y) 
    {
        $this->x = $x;
        $this->y = $y;
        self::$contador++;
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

    public function distancia(Ponto $ponto) 
    {
        return sqrt(pow($this->x - $ponto->getX(), 2) + pow($this->y - $ponto->getY(), 2));
    }

    public function distanciaXY(int $x, int $y) 
    {
        return sqrt(pow($this->x - $x, 2) + pow($this->y - $y, 2));
    }

    public static function distanciaXYXY(int $x1, int $y1, int $x2, int $y2) 
    {
        return sqrt(pow($x1 - $x2, 2) + pow($y1 - $y2, 2));
    }

    public static function getContador() 
    {
        return self::$contador;
    }

    public function __toString() : string
    {
        return "($this->x, $this->y)";
    }
}

$ponto1 = new Ponto(1, 2);
$ponto2 = new Ponto(3, 4);

echo $ponto1->distancia($ponto2);
echo "<hr/>";
echo $ponto1->distanciaXY(3, 4);
echo "<hr/>";
echo Ponto::distanciaXYXY(1, 2, 3, 4);
echo "<hr/>";
echo Ponto::getContador();


<?php 

class Ponto 
{
    private int $x;
    private int $y;
    private int $contador;

    public function __construct(int $x, int $y) 
    {
        $this->x = $x;
        $this->y = $y;
        $this->setContador();
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
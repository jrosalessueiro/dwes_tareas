<?php
/*Crea un obxecto utilizando unha clase anónima cos seguintes requisitos:

A clase ten dúas propiedades:
$x
$y
A clase ten dous métodos:
multiplicar(): devolve $x por $y.
exponencial(): devolve $x elevado a $y.
Escribe un exemplo de uso.*/



$o = new class(4, 5)
{
    private $x;
    private $y;

    function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    function multiply()
    {
        return $this->x * $this->y;
    }

    function exponential()
    {
        return pow($this->x, $this->y);
    }

    function getX(){
        return $this->x;
    }

    function getY(){
        return $this->y;
    }
};

echo 'La multiplicación de ' . $o->getX() . ' por ' . $o->getY() . ' es ' . $o->multiply() . '<br>';
echo 'La potencia de ' . $o->getX() . ' elevado a ' . $o->getY() . ' es ' .$o->exponential(). '<br>';

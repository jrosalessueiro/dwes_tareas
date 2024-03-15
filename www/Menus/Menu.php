<?php
/*Crea unha clase para xenerar un menú sinxelo.

Ten en consideración o seguinte:

Cada menú ten unha lista con opcións.
Cada menú ten un tipo: horizonal ou vertical.
Podemos engadir opcións ao menú.
Cada opción ten:
    Título
    Enlace
    Cor de fondo*/

class Menu{
    public $opciones=[];
    public $tipo;

    public function __construct($tipo,$opciones){
        $this->tipo=$tipo;
        $this->opciones[]=$opciones;
    }
    function generarMenu() {
        $menuHTML = '<div style="background-color: ';
        $menuHTML .= $this->tipo === 'horizontal' ? 'lightgrey">' : 'none; display: flex; flex-direction: column;">';

        foreach ($this->opciones as $opcion) {
            $menuHTML .= '<a href="' . $opcion->enlace . '" style="background-color: ' . $opcion->colorFondo . ';">';
            $menuHTML .= $opcion->titulo . '</a>';

            if ($this->tipo === 'horizontal') {
                $menuHTML .= ' ';
            }
        }

        $menuHTML .= '</div>';

        return $menuHTML;
    }

}

class Opcion{
    public $titulo;
    public $enlace;
    public $colorFondo;

    public function __construct($titulo,$enlace,$colorFondo){
        $this->titulo=$titulo;
        $this->enlace=$enlace;
        $this->colorFondo=$colorFondo;
    }   
} 
    
<?php
include('Notas.php');
include('CalculosCentrosEstudios.php');

class NotasDaw extends Notas implements CalculosCentrosEstudios
{
    public $numAprobados = 0;
    public $numSuspensos = 0;
    public $media = 0;
    public $num = 1;

    public function __construct($notas){
        $this->notas=$notas;
    }

    public function toString(){
        $listaDeNotas = "";
        foreach ($this->get_notas() as $nota) {
            $listaDeNotas .= "[$nota]";
        }
        return $listaDeNotas;
    }
    public function numeroDeAprobados(){
        foreach ($this->notas as $nota) {
            if ($nota >= 5) {
                $this->numAprobados++;
            }
        }
        return $this->numAprobados;
    }
    public function numeroDeSuspensos(){
        foreach ($this->notas as $nota) {
            if ($nota < 5) {
                $this->numSuspensos++;
            }
        }
        return $this->numSuspensos;
    }
    
    public function notaMedia(){
        foreach ($this->notas as $nota) {
            $this->num++;
        }
        $this->media=array_sum($this->notas)/$this->num;
        return number_format($this->media, 2, ',', ' ');
    }

    public function get_notas(){
        return $this->notas;
    }
}


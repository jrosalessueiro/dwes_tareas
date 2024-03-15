<?php

class Rectangulo extends Figura{

    private $ancho;
    private $alto;

    public function __construct($ancho, $alto){
        $this->ancho = $ancho;
        $this->alto = $alto;
    }

    // Método para dibujar la figura
    public function dibujar(){
        echo 'Se está dibujando la figura con ancho: '.$this->ancho.' y alto: '.$this->alto.'<br>';
    }
    
    // Método para agrandar la figura
    public function agrandar($factor){
            $nuevoAlto = $this->alto*$factor;
            $nuevoAncho = $this->ancho*$factor;
            
            $this->alto=$nuevoAlto;
            $this->ancho=$nuevoAncho;

            $this->dibujar();


    }
    
    // Método para encoger la figura
    public function encoger($factor){
            $nuevoAlto = $this->alto/$factor;
            $nuevoAncho = $this->ancho/$factor;

            $this->alto=$nuevoAlto;
            $this->ancho=$nuevoAncho;

            $this->dibujar();
    }
}

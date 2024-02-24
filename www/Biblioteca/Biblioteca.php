<?php
include('Documento.php');

class Biblioteca{
    public $nombre;
    public $direccion;
    public $numeroTelefono;
    public $documentos=array();

public function __construct($nombre,$direccion,$numeroTelefono,$documentos){
    $this->nombre=$nombre;
    $this->direccion=$direccion;
    $this->numeroTelefono=$numeroTelefono;
    $this->documentos=$documentos;

}

public function registro(Documento $documento){
    if($documento instanceof Libro || $documento instanceof Revista||$documento instanceof Dvd){
        $this->documentos[$documento->id]=$documento;
    }else{
        echo 'La biblioteca sólo puede albergar libros, revistas y dvd.';
    }
}

public function listaTodos(){
    foreach($this->documentos as $documento){
        $documento->datos(); 
    }
}
public function listaFormato($formato){
    foreach($this->documentos as $documento){
        if($documento->tipo===$formato){
            $documento->datos(); 
        }
    }
}
public function borrarId($idBorrar){
    if(array_key_exists($idBorrar,$this->documentos)){
        unset($documentos[$idBorrar]);    
    }else{
        echo 'No esiste el documento con id: '. $idBorrar;
    }
}

public function datosBiblio(){
        echo 'Nombre: '.$this->nombre.'<br>';
        echo 'Dirección: '.$this->direccion.'<br>';
        echo 'Nº Teléfono: '.$this->numeroTelefono.'<br>';
        foreach($this->documentos as $documento){
            $documento->datos();
        }   
    }

public function listaBilio(){}

}


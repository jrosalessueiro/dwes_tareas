<?php
include('Documento.php');

class Biblioteca{
    public $nombre;
    public $direccion;
    public $numeroTelefono;
    public $documentos=array();
    public $biblios=array();

public function __construct($nombre,$direccion,$numeroTelefono,$documentos){
    $this->nombre=$nombre;
    $this->direccion=$direccion;
    $this->numeroTelefono=$numeroTelefono;
    $this->documentos=$documentos;
    array_push($this->biblios,$nombre);

}

public function registro(Documento $documento){
    if($documento instanceof Libro || $documento instanceof Revista||$documento instanceof Dvd){
        $this->documentos[$documento->id]=$documento;
        echo 'El documento se ha registrado correctamente.<br>';
    }else{
        echo 'La biblioteca sólo puede albergar libros, revistas y dvd.<br>';
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
        echo 'No esiste el documento con id: '. $idBorrar.'<br>';
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

public function listaBilio(){
    echo 'Las bibliotecas que hay creadas son: <br>';
    foreach($this->biblios as $biblio){
        echo '* ' . $biblio . '<br>';
    }   
}
}
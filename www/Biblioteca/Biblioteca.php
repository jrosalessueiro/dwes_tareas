<?php
include('Documento.php');

class Biblioteca{
    public $nombre;
    public $direccion;
    public $numeroTelefono;
    public $documentos=array();
    public static $biblios=array();

public function __construct($nombre,$direccion,$numeroTelefono,$documentos){
    $this->nombre=$nombre;
    $this->direccion=$direccion;
    $this->numeroTelefono=$numeroTelefono;
    $this->documentos=$documentos;
    self::$biblios[]=$this;

}

public function registro(Documento $documento){
    if($documento instanceof Libro || $documento instanceof Revista||$documento instanceof Dvd){
        if($documento->tipo==='Libro' || $documento->tipo==='Revista' || $documento->tipo==='Dvd'){
            $this->documentos[$documento->id]=$documento;
            echo 'El documento se ha registrado correctamente.<br>';
        }else{
        echo 'La biblioteca sólo puede albergar libros, revistas y dvd.<br>';
    }
    }else{
        echo 'La biblioteca sólo puede albergar libros, revistas y dvd.<br>';
    }
}

public function listaTodos(){
    echo '<br>Los documentos que se guardan en la biblioteca '. $this->nombre . ' son: <br><br>';
    foreach($this->documentos as $documento){
        $documento->datos(); 
    }
}
public function listaFormato($formato){
    echo '<br>Los documentos en formato ' . $formato . ' que se guardan en la biblioteca '. $this->nombre . ' son: <br><br>';
    foreach($this->documentos as $documento){
        if($documento->tipo===$formato){
            $documento->datos(); 
        }
    }
}
public function borrarId($idBorrar){
    foreach($this->documentos as $indice=>$documento){
        if($documento->id===$idBorrar){
            unset($this->documentos[$indice]);
            echo '<br>Documento con ID ' . $idBorrar . ' eliminado correctamente.<br>';
            return; 
        }
    }
    echo '<br>No existe el documento con ID: '. $idBorrar.'<br>';
}
    

public function datosBiblio(){
    echo '<br>Los datos de la biblioteca '. $this->nombre . ' son: <br>';
    echo 'Nombre: '.$this->nombre.'<br>';
    echo 'Dirección: '.$this->direccion.'<br>';
    echo 'Nº Teléfono: '.$this->numeroTelefono.'<br>';
    $this->listaTodos();
}

public static function listaBiblio(){
    echo '<br>Las bibliotecas que hay creadas son: <br>';
    foreach(Biblioteca::$biblios as $biblio){
        echo '* ' . $biblio->nombre . '<br>';
    }   
}
}
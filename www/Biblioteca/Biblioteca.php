<?php
include('Documento.php'); // Incluye el archivo que contiene la definición de la clase Documento

class Biblioteca {
    public $nombre; // Nombre de la biblioteca
    public $direccion; // Dirección de la biblioteca
    public $numeroTelefono; // Número de teléfono de la biblioteca
    public $documentos = array(); // Array para almacenar los documentos de la biblioteca
    public static $biblios = array(); // Array estático para almacenar todas las bibliotecas creadas

    // Constructor de la clase Biblioteca
    public function __construct($nombre, $direccion, $numeroTelefono, $documentos) {
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->numeroTelefono = $numeroTelefono;
        $this->documentos = $documentos;
        self::$biblios[] = $this; // Agrega esta biblioteca al array estático de bibliotecas
    }

    // Método para registrar un documento en la biblioteca
    public function registro(Documento $documento) {
        if ($documento instanceof Libro || $documento instanceof Revista || $documento instanceof Dvd) {
            if ($documento->tipo === 'Libro' || $documento->tipo === 'Revista' || $documento->tipo === 'Dvd') {
                $this->documentos[$documento->id] = $documento; // Añade el documento al array de documentos de la biblioteca
                echo 'El documento se ha registrado correctamente.<br>';
            } else {
                echo 'La biblioteca sólo puede albergar libros, revistas y dvd.<br>';
            }
        } else {
            echo 'La biblioteca sólo puede albergar libros, revistas y dvd.<br>';
        }
    }

    // Método para listar todos los documentos de la biblioteca
    public function listaTodos() {
        echo '<br>Los documentos que se guardan en la biblioteca ' . $this->nombre . ' son: <br><br>';
        foreach ($this->documentos as $documento) {
            $documento->datos(); // Muestra los datos del documento
        }
    }

    // Método para listar los documentos de un formato específico en la biblioteca
    public function listaFormato($formato) {
        echo '<br>Los documentos en formato ' . $formato . ' que se guardan en la biblioteca ' . $this->nombre . ' son: <br><br>';
        foreach ($this->documentos as $documento) {
            if ($documento->tipo === $formato) {
                $documento->datos(); // Muestra los datos del documento si el formato coincide
            }
        }
    }

    // Método para borrar un documento por su ID de la biblioteca
    public function borrarId($idBorrar) {
        foreach ($this->documentos as $indice => $documento) {
            if ($documento->id === $idBorrar) {
                unset($this->documentos[$indice]); // Elimina el documento del array de documentos de la biblioteca
                echo '<br>Documento con ID ' . $idBorrar . ' eliminado correctamente.<br>';
                return;
            }
        }
        echo '<br>No existe el documento con ID: ' . $idBorrar . '<br>';
    }

    // Método para mostrar la información de la biblioteca
    public function datosBiblio() {
        echo '<br>Los datos de la biblioteca ' . $this->nombre . ' son: <br>';
        echo 'Nombre: ' . $this->nombre . '<br>';
        echo 'Dirección: ' . $this->direccion . '<br>';
        echo 'Nº Teléfono: ' . $this->numeroTelefono . '<br>';
        $this->listaTodos(); // Muestra todos los documentos de la biblioteca
    }

    // Método estático para listar todas las bibliotecas creadas
    public static function listaBiblio() {
        echo '<br>Las bibliotecas que hay creadas son: <br>';
        foreach (Biblioteca::$biblios as $biblio) {
            echo '* ' . $biblio->nombre . '<br>'; // Muestra el nombre de cada biblioteca creada
        }
    }
}
?>
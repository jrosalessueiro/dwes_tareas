<?php

/*4.1. XESTIÓN DUNHA BIBLIOTECA
Nesta tarefa implementaremos un software que nos permite xestionar unha bibioteca.

Cada biblioteca conterá a seguinte información:
    Nome da biblioteca
    Dirección
    Número de teléfono
    Cada biblioteca almacenará un número ilimitado de documentos.

Os diferentes documentos poderán ser dalgún dos seguintes formatos:
    Libro
    Revista
    DVD

Cada documento estará identificado por:
    Un identificador.
    O tipo de formato do documento.

A información que se garda dun libro é:
    Título
    Nome de autor/a
    Número de páxinas
    Ano de publicación

A información que se gardan dunha revista é:
    Título
    Número de páxinas
    Ano de publicación

A información que se gardan dun DVD é:
    Número de unidades incluidas
    Ano de publicación
    Formato do DVD

A bilioteca debe permitir:
    Rexistrar calquera tipo de documento nos formatos permitidos.
    Listar todos os documentos dunha biblioteca.
    Listar todos os documentos cun formato determinado.
    Borrar un documento polo seu identificador.
    Mostrar a información da biblioteca.
    Listar o número de bibliotecas creadas.

De cada documento, poderemos:
    Mostrar todos os seus datos.
    Modificar o ano de publicación.*/


class Documento{
    public $id;
    public $tipo;

    function __construct($id, $tipo){
        $this->id = $id;
        $this->tipo = $tipo;
    }

    function datos(){}

    function setAno($ano){}
}

class Libro extends Documento{
    public $titulo;
    public $autor;
    public $numeroPaginas;
    public $anoPublicacion;

    function __construct($id, $tipo, $titulo, $autor, $numeroPaginas, $anoPublicacion)
    {
        parent::__construct($id, $tipo);
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->numeroPaginas = $numeroPaginas;
        $this->anoPublicacion = $anoPublicacion;
    }

    function setAno($ano){
        $this->anoPublicacion=$ano;
    }

    function datos(){
        echo 'ID: '.$this->id.'<br>';
        echo 'Tipo: '.$this->tipo.'<br>';
        echo 'Título: '.$this->titulo.'<br>';
        echo 'Autor: '.$this->autor.'<br>';
        echo 'Nº Páginas: '.$this->numeroPaginas.'<br>';
        echo 'Año de Publicación: '.$this->anoPublicacion.'<br>';
    }
}

class Dvd extends Documento{
    public $unidades;
    public $formato;
    public $anoPublicacion;

    function __construct($id, $tipo, $unidades, $formato, $anoPublicacion){
        parent::__construct($id, $tipo);
        $this->unidades = $unidades;
        $this->formato = $formato;
        $this->anoPublicacion = $anoPublicacion;
    }

    function setAno($ano){
        $this->anoPublicacion=$ano;
    }

    function datos(){
        echo 'ID: '.$this->id.'<br>';
        echo 'Tipo: '.$this->tipo.'<br>';
        echo 'Unidades: '.$this->unidades.'<br>';
        echo 'Formato: '.$this->formato.'<br>';
        echo 'Año de Publicación: '.$this->anoPublicacion.'<br>';
    }
}

class Revista extends Documento{
    public $titulo;
    public $numeroPaginas;
    public $anoPublicacion;

    function __construct($id, $tipo, $titulo, $numeroPaginas, $anoPublicacion){
        parent::__construct($id, $tipo);
        $this->titulo = $titulo;
        $this->numeroPaginas = $numeroPaginas;
        $this->anoPublicacion = $anoPublicacion;
    }

    function setAno($ano){
        $this->anoPublicacion=$ano;
    }

    function datos(){
        echo 'ID: '.$this->id.'<br>';
        echo 'Tipo: '.$this->tipo.'<br>';
        echo 'Título: '.$this->titulo.'<br>';
        echo 'Nº Páginas: '.$this->numeroPaginas.'<br>';
        echo 'Año de Publicación: '.$this->anoPublicacion.'<br>';
    }
}

<?php

include('Biblioteca.php');

//creamos un par de documentos
$documento1 = new Libro('01','Libro','El señor de los Anillos','J.R.R.Tolkien',1456,1982);
$documento2 = new Revista('02','Revista','Muy Interesante',37,2009);

//creamos un par de bibliotecas
$biblio1= new Biblioteca('Biblioteca de Pontevedra','c/ Castelao 8','985457899',array($documento1,$documento2));
$biblio2 = new Biblioteca('Biblioteca de Ourense','c/ Rosalia de Castro 19','988774425',array());


echo 'Test de la Biblioteca <br>';

//prueba de método registro()
    //correcto
    $documento3 = new Libro('03','Libro','El Hobbit','J.R.R.Tolkien',259,1978);
    $biblio1->registro($documento3);
    //incorrecto
    $documento4 = new Libro('03','folleto','El Hobbit','J.R.R.Tolkien',259,1978);
    $biblio2->registro($documento4);

//prueba metodo listaTodos()
$biblio1->listaTodos();

//prueba metodo listaFormato()
$biblio1->listaFormato('Libro');

//prueba metodo borrarId()
    //correcto
    $biblio1->borrarId('01');
    //incorrecto
    $biblio1->borrarId('010');

//prueba metododatosBilio()
$biblio1->datosBiblio();

//prueba listaBiblio()
Biblioteca::listaBiblio();
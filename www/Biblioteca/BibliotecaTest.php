<?php

include('Biblioteca.php');

$documento1 = new Libro('01','Libro','El señor de los Anillos','J.R.R.Tolkien',1456,1982);
$documento2 = new Revista('02','Revista','Muy Interesante',37,2009);

$biblio1= new Biblioteca('Biblioteca de Pontevedra','c/ Castelao 8','985457899',array($documento1,$documento2));

echo 'Test de la Biblioteca <br>';

$documento3 = new Libro('03','Libro','El Hobbit','J.R.R.Tolkien',259,1978);

$biblio1->registro($documento3);
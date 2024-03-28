<?php

include('Figura.php');
include('Rectangulo.php');

$figura1 = new Rectangulo(2, 8);

$figura1->dibujar();

$figura1->agrandar(2);
$figura1->encoger(4);
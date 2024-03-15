<?php

include('Mascota.php');
include('Animal.php');
include('Perro.php');
include('Gato.php');


$animal1= new Perro('Bobby', 5);
$animal2 = new Gato('Mixy', 2);

echo '*'.$animal1->getNombre() . ' es un perro, tiene '.$animal1->getEdad().' años y dice: '. $animal1->emitirSonido();
echo '*'.$animal2->getNombre() . ' es un gato, tiene '.$animal2->getEdad().' años y dice: '. $animal2->emitirSonido();
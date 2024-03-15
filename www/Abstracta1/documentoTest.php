<?php
include('documento.php');

$triangulo = new Triangle();
$triangulo->setColor('Verde');
echo $triangulo->describe(); // Mostra: "Son un triángulo de cor verde"

$rectangulo = new Rectangle();
$rectangulo->setColor('Vermello');
echo $rectangulo->describe(); // Mostra: "Son un rectángulo de cor vermello"*/
<?php
// Incluir el archivo NotasTrait.php
include('NotasTrait.php');

// Crear una instancia de NotasTrait
$notas = new NotasTrait();

// Definir un nuevo array de notas
$nuevasNotas = [6, 7, 8, 4, 5];

// Establecer las notas en la instancia de NotasTrait
$notas->setNotas($nuevasNotas);

// Llamar a los métodos para realizar cálculos y mostrar resultados
$aprobados = $notas->numeroDeAprobados();
$suspensos = $notas->numeroDeSuspensos();
$media = $notas->notaMedia();
$notas->saludo(); // Mostrar el saludo
$notas->showCalculusStudyCenter($aprobados, $suspensos, $media); // Mostrar los resultados de los cálculos
?>
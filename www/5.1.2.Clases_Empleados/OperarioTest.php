<?

include('Operario.php');


try {
    $operario1 = new Operario('Pepe', 1500, 'nocturno');
    $operario1->getSalario();
    echo 'El operario ' . $operario1->getNombre() . ' tiene un turno ' . $operario1->getTurno().'<br>';
    
} catch (InvalidArgumentException $e) {
    echo 'Error al crear el operario' . $e->getMessage();
}
?>
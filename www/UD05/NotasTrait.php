<?php
include ('MostrarCalculosTrait.php');
include ('CalculosCentrosEstudiosTrait.php');

class NotasTrait{
    use MostrarCalculos;
    use CalculosCentrosEstudios;

    private $notas = []; // Array de notas

    // Método para establecer las notas
    public function setNotas($notas) {
        $this->notas = $notas;
    }
}
?>
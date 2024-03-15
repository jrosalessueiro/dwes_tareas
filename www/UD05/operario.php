<?php

/*Crea una clase Operario en un fichero Operario.php que sea clase hija de Empleado. Con las siguientes características:
Tendrá una propiedad privada “turno”.
Deberá ejecutar el constructor de la clase padre añadiendo la variable turno.
Crear el setter para tusólo pueden ser “diurno. Los valores para esta variable rno” o “nocturno”.*/

class Operario extends Empleado {
    private $turno;

    // Constructor
    public function __construct($nombre, $sueldo, $turno) {
        parent::__construct($nombre, $sueldo);
        $this->setTurno($turno);
    }

    // Setter para turno
    public function setTurno($turno) {
        if ($turno === "diurno" || $turno === "nocturno") {
            $this->turno = $turno;
        } else {
            echo "Error: El turno solo puede ser 'diurno' o 'nocturno'.";
        }
    }

    // Getter para turno
    public function getTurno() {
        return $this->turno;
    }
}
?>
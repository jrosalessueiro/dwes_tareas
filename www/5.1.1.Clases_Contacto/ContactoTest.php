<?php
require_once('Contacto.php');

//Crea 3 objetos de la clase Contacto en un fichero ContactoTest.php, asigna valores a todas sus propiedades y muéstrelos a continuación, primero con los métodos get() 
//y luego con el método muestraInformacion().

$contacto1 = new Contacto('Michael','Jordan','658442598');
$contacto2 = new Contacto('Earvin','Johnson','685425896');
$contacto3 = new Contacto('Dennis','Rodman','66332255');

echo "Mostrando información con getters:<br><br>";
echo ' Nombre: '. $contacto1->getNombre() . ' Apellido: ' . $contacto1->getApellido() . ' Teléfono: ' . $contacto1->getNumeroTelefono(). "<br>";
echo ' Nombre: '. $contacto2->getNombre() . ' Apellido: ' . $contacto2->getApellido() . ' Teléfono: ' . $contacto2->getNumeroTelefono(). "<br>";
echo ' Nombre: '. $contacto3->getNombre() . ' Apellido: ' . $contacto3->getApellido() . ' Teléfono: ' . $contacto3->getNumeroTelefono(). "<br>";

echo "Mostrando información con el método muestraInformacion():<br><br>";
$contacto1->muestraInformacion()."<br>";
echo "<br>";
$contacto2->muestraInformacion()."<br>";
echo "<br>";
$contacto3->muestraInformacion()."<br>";
echo "<br>";

?>
<?php
/*Queremos definir unha clase para todos os tipos de formas que crearemos nun futuro.

Todas as clases estendidas da clase principal teñen que implementar tres métodos:

getCor()
setCor()
describe()
O método describe() debe devolver un string do estilo Son un rectángulo de cor azul, dependendo da clase.

Crea unha clase Triangulo e unha clase Rectangulo.
*/


// Define a new Abstract class for all 'shapes' to extend
abstract class Shape {
    // Define the methods required for classes to extend
    // the abstract class
    abstract protected function getColor();
    abstract protected function setColor($color);

    // Common function available to all classes extending the Shape class
    public function describe()
    {
        return sprintf("I'm an %s %s<br>", $this->getColor(), get_class($this));
    }
}

// Define a new Triangle class that extends the
// Shape abstract class
class Triangle extends Shape{
    private $color = null;
    //Define the required methods defined in the abstract
    //class Shape
    public function getColor()
    {
        return $this->color;
    }
    //Note that the method signature matches the abstract
    // class with only one parameter
    public function setColor($color)
    {
        $this->color = $color;
    }
}

class Rectangle extends Shape{
    private $color = null;
    // Define the required methods defined in the abstract
    // class Shape
    public function getColor()
    {
        return $this->color;
    }
    // Note that the method signature matches the abstract
    // class with only one parameter
    public function setColor($color)
    {
        $this->color = $color;
    }
}

// Instantiate the Triange class
$myTriangle = new Triangle();
// Set the color
$myTriangle->setColor('Laranxa');
// Print out the value of the describe common method
// provided by the abstract class
// Will print out out "I'm an Orange Triange"
print $myTriangle->describe();

// Instantiate the Triange class
$myRectangle = new Triangle();
// Set the color
$myRectangle->setColor('Vermello');
// Print out the value of the describe common method
// provided by the abstract class
// Will print out out "I'm an Orange Triange"
print $myRectangle->describe();

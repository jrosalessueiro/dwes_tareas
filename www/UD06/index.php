<?php
/*
Dada la base de datos de gestión de hoteles se debe crear una API REST que permita gestionar 
todos los datos de las 3 tablas (clientes, reservas y hoteles).

Con la siguientes especificaciones:

Tabla Clientes
Se debe permitir las siguientes acciones sobre la tabla clientes y la ruta /clientes:
GET: Al acceder a esta ruta se debe mostar todos los datos de los clientes. Debes mostrar la información de un 
único cliente a través del id.
POST: Se debe poder insertar un cliente en la base de datos.
DELETE: Dado un id se debe poder eliminar un cliente.
PUT: Se podrá modificar de un cliente sus apellidos, edad, email y teléfono.

Tabla Hoteles
Se debe permitir las siguientes acciones sobre la tabla clientes y la ruta /hoteles:
GET: Al acceder a esta ruta se debe mostar todos los datos de los hoteles. Debes mostrar la información de un único 
hotel a través del id.
POST: Se debe poder insertar un hotel en la base de datos.
DELETE: Dado un id se debe poder eliminar un hotel.
PUT: Se podrá modificar de un hotel sus direccion, email y teléfono.

Tabla Reserva
Se debe permitir las siguientes acciones sobre la tabla clientes y la ruta /reservas. Hay que tener en cuenta que 
esta tabla tiene dependencias con las otras dos tablas.
GET: Al acceder a esta ruta se debe mostar todas las reservas realizadas por todos los clientes en todos los hoteles.
Debes mostrar la información de un única reserva a través del id.
POST: Se debe poder insertar una reserva en la base de datos. Identificar los datos necesarios.
DELETE: Dado un id se debe poder eliminar una reserva.
PUT: Se podrá modificar de una reserva la fecha de entrada y la fecha de salida.
*/

require 'flight/Flight.php';

//Conexión con la Base de Datos "pruebas"
Flight::register('db', 'PDO', array('mysql:host=db;dbname=pruebas', 'root', 'test'));

// Definir modelo Cliente
class Cliente
{
    public $id;
    public $nombre;
    public $apellidos;
    public $edad;
    public $email;
    public $telefono;
}


//Rutas de la tabla CLIENTES

// Ruta para obtener todos los clientes
Flight::route('GET /clientes', function () {
    $statement = Flight::db()->prepare("SELECT * from clientes");
    $statement->execute();
    $data = $statement->fetchAll(PDO::FETCH_CLASS, "Cliente");
    Flight::json($data);
});

// Ruta para obtener un cliente por su ID
// En la ruta para acceder a los datos del cliente con id:3 deberemos poner localhost/UD06/clientes/3
Flight::route('GET /clientes/@id', function ($id) {

    $sql = 'SELECT * FROM clientes WHERE id = ?';

    $statement = Flight::db()->prepare($sql);
    //Como tenemos solo un parametro (?) podemos poner el orden (1) y la variable
    $statement->bindParam(1, $id);
    $statement->execute();

    $client = $statement->fetchObject("Cliente");
    if ($client) {
        Flight::jsonp('Cliente solicitado');
        Flight::json($client);
    } else {
        Flight::jsonp('Cliente no encontrado');
    }
});

// Ruta para insertar un cliente en la base de datos.
Flight::route('POST /clientes', function () {

    //Recoger los datos
    $nombre = Flight::request()->data->nombre;
    $apellidos = Flight::request()->data->apellidos;
    $edad = Flight::request()->data->edad;
    $email = Flight::request()->data->email;
    $telefono = Flight::request()->data->telefono;

    //Insertar los datos
    $sql = "INSERT INTO clientes (nombre, apellidos, edad, email, telefono)
    VALUES (:nombre, :apellidos, :edad, :email, :telefono)";
    $sentencia = Flight::db()->prepare($sql);

    $sentencia->bindParam(':nombre', $nombre);
    $sentencia->bindParam(':apellidos', $apellidos);
    $sentencia->bindParam(':edad', $edad);
    $sentencia->bindParam(':email', $email);
    $sentencia->bindParam(':telefono', $telefono);

    $sentencia->execute();

    Flight::jsonp("Cliente agregado correctemente.");
});

// Ruta para borrar un cliente en la base de datos segun su id.
Flight::route('DELETE /clientes', function () {

    $id = Flight::request()->data->id;

    $sql = "DELETE FROM clientes WHERE id = ?";
    $sentencia = Flight::db()->prepare($sql);

    //Como tenemos solo un parametro (?) podemos poner el orden (1) y la variable
    $sentencia->bindParam(1, $id);
    $sentencia->execute();

    Flight::jsonp("Cliente borrado correctemente.");
});

// Ruta para modificar de un cliente sus apellidos, edad, email y teléfono.
Flight::route('PUT /clientes', function () {

    $id = Flight::request()->data->id;
    $apellidos = Flight::request()->data->apellidos;
    $edad = Flight::request()->data->edad;
    $email = Flight::request()->data->email;
    $telefono = Flight::request()->data->telefono;

    $sql = "UPDATE clientes SET apellidos = ?, edad = ?, email=?, telefono = ? WHERE id=?";
    $sentencia = Flight::db()->prepare($sql);

    // Los numeros siguen el orden de aparicion UPDATE clientes SET apellidos = ?, edad = ?, email=?, telefono = ? WHERE id=?"
    $sentencia->bindParam(1, $apellidos);
    $sentencia->bindParam(2, $edad);
    $sentencia->bindParam(3, $email);
    $sentencia->bindParam(4, $telefono);
    $sentencia->bindParam(5, $id);

    $sentencia->execute();

    Flight::jsonp("Cliente actualizado correctemente.");
});
Flight::start();

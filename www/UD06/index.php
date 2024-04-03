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

//Rutas de la tabla HOTELES

// Definir modelo Hotel
class Hotel
{
    public $id;
    public $hotel;
    public $direccion;
    public $telefono;
    public $email;
}

// Ruta para acceder a todos los datos de los hoteles. Debes mostrar la información de un único hotel a través del id.
Flight::route('GET /hoteles', function () {

    $statement = Flight::db()->prepare("SELECT * FROM hoteles");
    $statement->execute();
    $data = $statement->fetchAll(PDO::FETCH_CLASS, "Hotel");
    Flight::json($data);
});

// Ruta para obtener un Hotel por su ID
// En la ruta para acceder a los datos del hotel con id:3 deberemos poner localhost/UD06/hoteles/3
Flight::route('GET /hoteles/@id', function ($id) {

    $sql = 'SELECT * FROM hoteles WHERE id = ?';

    $statement = Flight::db()->prepare($sql);
    //Como tenemos solo un parametro (?) podemos poner el orden (1) y la variable
    $statement->bindParam(1, $id);
    $statement->execute();

    $client = $statement->fetchObject("Hotel");
    if ($client) {
        Flight::jsonp('Hotel solicitado');
        Flight::json($client);
    } else {
        Flight::jsonp('Hotel no encontrado');
    }
});

//Ruta para poder insertar un hotel en la base de datos.
Flight::route('POST /hoteles', function () {

    //Recoger los datos
    $hotel = Flight::request()->data->hotel;
    $direccion = Flight::request()->data->direccion;
    $telefono = Flight::request()->data->telefono;
    $email = Flight::request()->data->email;

    //Insertar los datos
    $sql = "INSERT INTO hoteles (hotel, direccion, telefono, email)
    VALUES (:hotel, :direccion, :telefono, :email)";
    $sentencia = Flight::db()->prepare($sql);

    $sentencia->bindParam(':hotel', $hotel);
    $sentencia->bindParam(':direccion', $direccion);
    $sentencia->bindParam(':telefono', $telefono);
    $sentencia->bindParam(':email', $email);

    $sentencia->execute();

    Flight::jsonp("Hotel agregado correctemente.");
});

//Ruta para que dado un id se debe pueda eliminar un hotel.
Flight::route('DELETE /hoteles', function () {

    $id = Flight::request()->data->id;

    $sql = "DELETE FROM hoteles WHERE id = ?";
    $sentencia = Flight::db()->prepare($sql);

    //Como tenemos solo un parametro (?) podemos poner el orden (1) y la variable
    $sentencia->bindParam(1, $id);
    $sentencia->execute();

    Flight::jsonp("Hotel borrado correctemente.");
});

// Ruta para modificar de un hotel su direccion, email y teléfono.
Flight::route('PUT /hoteles', function () {

    $id = Flight::request()->data->id;
    $direccion = Flight::request()->data->direccion;
    $telefono = Flight::request()->data->telefono;
    $email = Flight::request()->data->email;

    $sql = "UPDATE hoteles SET direccion = ?, telefono=?, email = ? WHERE id=?";
    $sentencia = Flight::db()->prepare($sql);

    // Los numeros siguen el orden de aparicion UPDATE hoteles SET direccion = ?, telefono=?, email = ? WHERE id=?"
    $sentencia->bindParam(1, $direccion);
    $sentencia->bindParam(2, $telefono);
    $sentencia->bindParam(3, $email);
    $sentencia->bindParam(4, $id);

    $sentencia->execute();

    Flight::jsonp("Hotel actualizado correctemente.");
});

// Rutas de la tabla Reservas

// Ruta para mostar todas las reservas realizadas por todos los clientes en todos los hoteles.
Flight::route('GET /reservas', function () {

    $sql = "SELECT CONCAT(c.nombre,' ',c.apellidos) AS cliente, h.hotel AS hotel, r.fecha_reserva as Reserva, r.fecha_entrada as Entrada, r.fecha_salida as Salida FROM reservas r JOIN clientes c ON r.id_cliente=c.id JOIN hoteles h ON r.id_hotel=h.id";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->execute();
    $datos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    Flight::json($datos);
});

// Ruta para mostrar la información de un única reserva a través del id.
// En la ruta para acceder a los datos de la reserva con id:3 deberemos poner localhost/UD06/reservas/3
Flight::route('GET /reservas/@id', function ($id) {

    $sql = "SELECT CONCAT(c.nombre,' ',c.apellidos) AS cliente, h.hotel AS hotel, r.fecha_reserva as Reserva, r.fecha_entrada as Entrada, r.fecha_salida as Salida FROM reservas r JOIN clientes c ON r.id_cliente=c.id JOIN hoteles h ON r.id_hotel=h.id WHERE r.id = ?";

    $statement = Flight::db()->prepare($sql);
    //Como tenemos solo un parametro (?) podemos poner el orden (1) y la variable
    $statement->bindParam(1, $id);
    $statement->execute();

    $reserva = $statement->fetch(PDO::FETCH_ASSOC);
    Flight::json($reserva);
});

// Ruta para insertar una reserva en la base de datos. Identificar los datos necesarios.
Flight::route('POST /reservas', function () {

    //Recoger los datos
    $id_cliente = Flight::request()->data->id_cliente;
    $id_hotel = Flight::request()->data->id_hotel;
    $fecha_reserva = Flight::request()->data->fecha_reserva;
    $fecha_entrada = Flight::request()->data->fecha_entrada;
    $fecha_salida = Flight::request()->data->fecha_salida;

    //Insertar los datos
    $sql = "INSERT INTO reservas (id_cliente, id_hotel, fecha_reserva, fecha_entrada, fecha_salida)
    VALUES (:id_cliente, :id_hotel, :fecha_reserva, :fecha_entrada, :fecha_salida)";
    $sentencia = Flight::db()->prepare($sql);

    $sentencia->bindParam(':id_cliente', $id_cliente);
    $sentencia->bindParam(':id_hotel', $id_hotel);
    $sentencia->bindParam(':fecha_reserva', $fecha_reserva);
    $sentencia->bindParam(':fecha_entrada', $fecha_entrada);
    $sentencia->bindParam(':fecha_salida', $fecha_salida);

    $sentencia->execute();

    Flight::jsonp("Reserva agregada correctemente.");
});

// Ruta para que dado un id se debe poder eliminar una reserva.
Flight::route('DELETE /reservas', function () {

    $id = Flight::request()->data->id;

    $sql = "DELETE FROM reservas WHERE id = ?";
    $sentencia = Flight::db()->prepare($sql);

    //Como tenemos solo un parametro (?) podemos poner el orden (1) y la variable
    $sentencia->bindParam(1, $id);
    $sentencia->execute();

    Flight::jsonp("Reserva borrada correctemente.");
});


// Ruta para modificar de una reserva la fecha de entrada y la fecha de salida.
Flight::route('PUT /reservas', function () {

    $id = Flight::request()->data->id;
    $fecha_entrada = Flight::request()->data->fecha_entrada;
    $fecha_salida = Flight::request()->data->fecha_salida;

    $sql = "UPDATE reservas SET fecha_entrada = ?, fecha_salida=? WHERE id=?";
    $sentencia = Flight::db()->prepare($sql);

    // Los numeros siguen el orden de aparicion UPDATE reservas SET fecha_entrada = ?, fecha_salida=? WHERE id=?"
    $sentencia->bindParam(1, $fecha_entrada);
    $sentencia->bindParam(2, $fecha_salida);
    $sentencia->bindParam(3, $id);

    $sentencia->execute();

    Flight::jsonp("Reserva actualizada correctemente.");
});

Flight::start();

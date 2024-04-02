<?php

require 'flight/Flight.php';
//require 'flight/autoload.php';

Flight::register('db', 'PDO', array('mysql:host=db;dbname=myDBPDO', 'root', 'test'));

Flight::route('GET /clientes', function () {
    $sentencia = Flight::db()->prepare("SELECT * from clientes");
    $sentencia->execute();
    $datos = $sentencia->fetchAll();
    Flight::json($datos);
});

Flight::route('POST /clientes', function () {
    //Recoger los datos
    $nombre = Flight::request()->data->nombre;
    $apellido = Flight::request()->data->apellido;
    $email = Flight::request()->data->email;

    //Insertar los datos
    $sql = "INSERT INTO clientes (nombre, apellido, email)
    VALUES (:nombre, :apellido, :email)";
    $sentencia = Flight::db()->prepare($sql);

    $sentencia->bindParam(':nombre', $nombre);
    $sentencia->bindParam(':apellido', $apellido);
    $sentencia->bindParam(':email', $email);

    $sentencia->execute();

    Flight::jsonp("Cliente agregado correctemente.");
});

Flight::route('DELETE /clientes', function () {

    $id = Flight::request()->data->id;

    $sql = "DELETE FROM clientes WHERE id = ?";
    $sentencia = Flight::db()->prepare($sql);

    //Como tenemos solo un parametro (?) podemos poner el orden (1) y la variable
    $sentencia->bindParam(1, $id);
    $sentencia->execute();

    Flight::jsonp("Cliente borrado correctemente.");
});

Flight::route('PUT /clientes', function () {

    $id = Flight::request()->data->id;
    $apellido = Flight::request()->data->apellido;
    $email = Flight::request()->data->email;


    $sql = "UPDATE clientes SET apellido = ?, email=? WHERE id=?";
    $sentencia = Flight::db()->prepare($sql);

    // Los numeros siguen el orden de aparicion UPDATE clientes SET apellido = ?, email=? WHERE id=?"
    $sentencia->bindParam(1, $apellido);
    $sentencia->bindParam(2, $email);
    $sentencia->bindParam(3, $id);

    $sentencia->execute();

    Flight::jsonp("Cliente actualizado correctemente.");
});

Flight::start();

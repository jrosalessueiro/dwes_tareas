<?php

require 'flight/Flight.php';
//require 'flight/autoload.php';

Flight::register('db', 'PDO', array('mysql:host=db;dbname=myDBPDO', 'root', 'test'));

Flight::route('GET /clientes', function () {
    
});

Flight::start();

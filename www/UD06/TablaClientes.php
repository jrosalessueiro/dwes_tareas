<?php

$servername ="db";
$username = "root";
$password = "test";  

try{
    //1. Conexión a base de datos
    $conPDO = new PDO("mysql:host=$servername;dbname=myDBPDO", $username, $password);
    //2. Forzar excepciones
    $conPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "La conexión correcta";
    
    //3. Crear base de datos
    //$sql = "CREATE DATABASE myDBPDO";
    $sql = "CREATE TABLE clientes(
        id INT(6) AUTO_INCREMENT PRIMARY KEY, 
        nombre VARCHAR(30) NOT NULL,
        apellido VARCHAR(30) NOT NULL, 
        email VARCHAR(50)
        )";
    $conPDO->exec($sql);
    echo "La tabla fue creada correctamente";
  }catch(PDOException $e){
      //$conPDO->rollback();
      echo "Fallo en conexión: ". $e->getMessage();
  }

//4. Cierre de conexión
$conPDO = null;

?>
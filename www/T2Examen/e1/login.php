<?php
include('index.php');

// Datos de usuario para validar (en un caso real, estos datos se obtendrían de una base de datos)
$usuarios = array(
    'usuario1' => 'contraseña1',
    'usuario2' => 'contraseña2',
    // Puedes agregar más usuarios si lo deseas
);

// Obtener los datos del formulario
if (isset($_POST['username'], $_POST['password'])) {
    $user = $_POST['username'];
    $passwd = $_POST['password'];
}
// Validar las credenciales
foreach ($usuarios as $clave => $valor) {
    if (isset($usuarios[$clave]) && $usuarios[$clave] === $passwd) {
    // Iniciar sesión
    header('Location: welcome.php');
    exit();
    } else {
    // Credenciales inválidas, redirigir al formulario de inicio de sesión
    header('Location: index.php');
    exit();
    }
}
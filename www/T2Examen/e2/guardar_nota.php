<?php

// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el nombre y el contenido de la nota desde el formulario
    $nombre = $_POST['nombre'] ?? '';
    $contenido = $_POST['contenido'] ?? '';

    //Guardar la nota en un archivo

    //Abro el archivo para escribir
    $file = @fopen("sdfasdfasf.txt", "a");        
    //Guardo el nombre y contenido
    fwrite($file, "$nombre,$contenido".PHP_EOL);
    //Cierro el archivo
    fclose($file);
    //Limpiar el formulario despues de guardar los datos 
    $nombre = null;
    $contenido = null;

    echo "La nota se ha guardado correctamente en el archivo: $directorio_notas$nombre.txt";
} else {
    // Si no se han enviado los datos del formulario, redirigir al formulario
    header('Location: formulario.html');
    exit();
}

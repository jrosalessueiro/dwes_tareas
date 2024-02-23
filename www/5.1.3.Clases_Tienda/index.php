<?php
include('funciones.php');
usuario();
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Tienda IES San Clemente</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi' crossorigin='anonymous'>
</head>

<body>
    <?php
    include('lib/base_datos.php');
    $conexion = get_conexion();
    crear_bd_tiendaClass($conexion);
    seleccionar_bd_tiendaClass($conexion);
    crear_tabla_usuario($conexion);
    crear_tabla_productos($conexion);


    ?>
    <h1>Tienda IES San Clemente</h1>
    <h2>Bienvenido, <?php echo $_SESSION['usuario']['nombre']; ?>!</h2>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3' crossorigin='anonymous'>
    </script>
    <p>
        <a class='btn btn-primary' href='dar_de_alta.php' role='button'> Alta usuarios</a>
        <a class='btn btn-primary' href='listar.php' role='button'> Listar usuarios</a>
        <a class='btn btn-primary' href='alta_productos.php' role='button'> Alta productos</a>
        <a class='btn btn-primary' href='logout.php' role='button'> LogOut</a>
    </p>
    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>
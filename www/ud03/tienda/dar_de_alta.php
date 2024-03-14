<?php
//include('funciones.php');
//usuario();
?>

<!doctype html>
<html lang='en'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Tienda IES San Clemente </title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi' crossorigin='anonymous'>
</head>

<body>
    <h1>Alta de usuario </h1>
    <?php
    if (isset($_POST['fname'], $_POST['lname'], $_POST['age'], $_POST['state'], $_POST['email'], $_POST['contrasenha'])) {
        $nombre = $_POST['fname'];
        $apellidos = $_POST['lname'];
        $edad = $_POST['age'];
        $provincia = $_POST['state'];
        $email = $_POST['email'];
        $contrasenha = $_POST['contrasenha'];

        include('lib/base_datos.php');
        $conexion = get_conexion();
        seleccionar_bd_tienda($conexion);

        insertar_usuario($conexion, $nombre, $apellidos, $edad, $provincia, $email, $contrasenha);
    }

    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <p>Formulario de alta</p>
    <form action='dar_de_alta.php' method='post'>
        <label for='fname'>Nombre:</label>
        <input type='text' id='fname' name='fname' required><br><br>
        <label for='lname'>Apellidos:</label>
        <input type='text' id='lname' name='lname' required><br><br>
        <label for='age'>Edad:</label>
        <input type='text' id='age' name='age' required><br><br>
        <label for='state'>Provincia:</label>
        <input type='text' id='state' name='state' required><br><br>
        <!--Introducimos un email porque si no para comprobar el nombre-contraseña va a haber muchos iguales en la BD-->
        <label for='email'>e-mail:</label>
        <input type='email' id='email' name='email' required><br><br>
        <label for='contrasenha'>Contraseña:</label>
        <input type='password' id='contrasenha' name='contrasenha' required><br><br>

        <input type='submit' value='Guardar'>
    </form>
    <!-- o "action" chama a dar_de_alta.php de xeito reflexivo-->

    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>
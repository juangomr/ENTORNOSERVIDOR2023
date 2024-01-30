<?php

include "conectarBBDD.php";

if (isset($_POST['registro'])) {

    $nombreUsuario = mysqli_escape_string($conn, $_POST['usuario']);
    $email = mysqli_escape_string($conn, $_POST['correo']);
    $direccion = mysqli_escape_string($conn, $_POST['direccion']);
    $password = md5($_POST['contrasena']);
    $cpassword = md5($_POST['ccontrasena']);
    $tipoUsuario = mysqli_escape_string($conn, $_POST['tipoUsuario']);
    $fechaRegistro = date("Y-m-d");

    $query = "SELECT * FROM usuario WHERE correo = '$email' OR nombreUsuario = '$nombreUsuario'";
    $resultado = mysqli_query($conn, $query);


    if (mysqli_num_rows($resultado) > 0) {
        $error[] = "Este usuario ya existe";
    } else {
        if ($password != $cpassword) {
            $error[] = "Las contraseñas no coinciden";
        } else {

            $sql = $conn->query("insert into usuario (correo, direccion, fechaReg, nombreUsuario, password, tipoUsuario) values ('$email','$direccion','$fechaRegistro','$nombreUsuario','$password', '$tipoUsuario')");
            header("refresh:2;url=inicioSesion.php"); ?>
            <!DOCTYPE html>
            <html lang="es">

            <head>
                <meta charset="UTF-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <title>Registro Biblioteca</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
                    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
                <link href="css/registro.css" rel="stylesheet">
            </head>

            <body>
                <div class="contenedorFormulario">

                    <form action="" method="post" id="formulario" enctype="multipart/form-data">
                        <img src="imagenes/Captura_de_pantalla_2024-01-24_152316-removebg-preview.png" class="card-img-top"
                            alt="logotipo" />

                        <h1>REGISTRO EFECTUADO CORRECTAMENTE!</h1>
                        <p>En breves le redireccionaremos a la página de inicio de sesión. Si tarda demasiado <a
                                href="inicioSesion.php">Pulse aquí</a></p>
                    </form>
                </div>

            </body>

            </html>
            <?php
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro Biblioteca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link href="css/registro.css" rel="stylesheet">
</head>

<body>
    <div class="contenedorFormulario">

        <form action="" method="post" id="formulario" enctype="multipart/form-data">
            <img src="imagenes/Captura_de_pantalla_2024-01-24_152316-removebg-preview.png" class="card-img-top"
                alt="logotipo" />

            <h1>REGISTRAR</h1>
            <p>Únete a la comunidad más grande de España de Bibliotecas</p>

            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class=mensajeError>' . $error . '</span>';
                }

            }
            ?>

            <input type="text" id="usuario" name="usuario" placeholder="Introduce tu nombre de usuario" required />

            <input type="email" id="correo" name="correo" placeholder="Introduce tu correo electrónico" required />

            <input type="text" id="direccion" name="direccion" placeholder="Introduce tu dirección" required />

            <input type="password" id="contrasena" name="contrasena" placeholder="Introduce tu contraseña" required />
            <input type="password" id="contrasena" name="ccontrasena" placeholder="Confirma tu contraseña" required />

            <select name="tipoUsuario">
                <option>Usuario</option>
                <option>Admin</option>
            </select>

            <input type="submit" name="registro" class="botonFormulario" value="REGISTRAR">
            <p>Tienes ya una cuenta? <a href="inicioSesion.php">Logueate</a></p>

            <a href="index.php">Volver</a>
        </form>
    </div>

</body>

</html>
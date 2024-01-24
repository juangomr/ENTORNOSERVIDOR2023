<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inicio Biblioteca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link href="css/inicio.css" rel="stylesheet">
</head>

<body>
    <!--Cuerpo de la tarjeta utilizada de Bootstrap para presentar la información sobre el inicio -->
    <div class="card">
        <img src="imagenes/Captura_de_pantalla_2024-01-24_152316-removebg-preview.png" class="card-img-top"
            alt="logotipo" />
        <div class="card-body">
            <?php
            include "conectarBBDD.php";
            session_start();

            $usuario = $_POST['usuario'];
            $clave = $_POST['contrasena'];

            $query = "SELECT COUNT(*) as contar from usuario where nombreUsuario = '$usuario' and password = '$clave' ";
            $consulta = mysqli_query($conn, $query);

            $array = mysqli_fetch_array($consulta);

            if ($array['contar'] > 0) {
                $_SESSION['usuario'] = $usuario;
                header("refresh:2;url=indexSesionIniciada.php");
                ?>
                <h1 class="card-title">BIENVENIDO</h1>
                <p class="card-text">Sesión iniciada correctamente</p>
            <?php } else { ?>

                <form action="validacionSesion.php" method="post" id="formulario" enctype="multipart/form-data">
                    <div>
                        <p class="alerta">Usuario o contraseña incorrectas</p>
                    </div>
                    <div>

                        <label for="usuario">Nombre de usuario:</label><br>
                        <input type="text" id="usuario" name="usuario" required />

                    </div>
                    <div>

                        <label for="contrasena">Contraseña:</label><br>
                        <input type="password" id="contrasena" name="contrasena" required />

                    </div>
                    <div>

                        <p>Aún no eres miembro? <a href="#">Registrarse</a></p>

                    </div>
                    <input type="submit" class="btn btn-primary btn-lg" value="Iniciar Sesión">

                <?php } ?>
        </div>

</body>

</html>
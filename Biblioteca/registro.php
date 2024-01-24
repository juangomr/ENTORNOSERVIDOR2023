<!DOCTYPE html>
<html lang="es">

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
            <h1 class="card-title">REGISTRAR</h1>
            <p class="card-text">Únete a la comunidad más grande de España de Bibliotecas</p>
            <!--Botones de opciones de navegación -->
            <div class="d-grid gap-2">
                <form action="validacionRegistro.php" method="post" id="formulario" enctype="multipart/form-data">

                    <div>

                        <label for="usuario">Nombre de usuario:</label><br>
                        <input type="text" id="usuario" name="usuario" />

                    </div>
                    <div>

                        <label for="direccion">Dirección:</label><br>
                        <input type="text" id="direccion" name="direccion" />

                    </div>
                    <div>

                        <label for="correo">Correo electrónico:</label><br>
                        <input type="email" id="correo" name="correo" />

                    </div>
                    <div>

                        <label for="contrasena">Contraseña:</label><br>
                        <input type="password" id="contrasena" name="contrasena" />

                    </div>

                    <input type="submit" name="registro" class="btn btn-primary btn-lg" value="Registrar">
                    <a href="index.php">Volver</a>
                </form>
            </div>
        </div>
</body>

</html>
<?php session_start() ?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cerrar Sesión Biblioteca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link href="css/inicio.css" rel="stylesheet">
</head>

<body>
    <div class="card">
        <img src="imagenes/Captura_de_pantalla_2024-01-24_152316-removebg-preview.png" class="card-img-top"
            alt="logotipo" />
        <div class="card-body">
            <h1 class="card-title">Hasta luego,
                <?php $_SESSION['usuario']; ?>
            </h1>

            <p class="card-text">¡Has cerrado sesión con éxito!</p>

            <?php  // Destruye la sesión
            session_unset();
            session_destroy();

            // Redirige a la página deseada después de un breve periodo de tiempo (por ejemplo, 2 segundos)
            header("refresh:2;url=index.php"); // Cambia "index.php" a la página a la que quieres redirigir
            ?>

        </div>
</body>

</html>
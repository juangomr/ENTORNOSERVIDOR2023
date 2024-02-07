<?php
include "conectarBBDD.php";
session_start();
$idUsuario = $_SESSION['idUsuario'];
$tipoUsuario = $_SESSION['tipoUsuario'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link href="css/registro.css" rel="stylesheet">
</head>

<body>
    <div class="contenedorPedido">

        <img src="imagenes/Captura_de_pantalla_2024-01-24_152316-removebg-preview.png" class="card-img-top"
            alt="logotipo" />

        <h1>PEDIDO TRAMITADO CORRECTAMENTE!</h1>

        <?php $consulta = mysqli_query($conn, "SELECT * FROM usuario where idUsuario = $idUsuario");
        if (mysqli_num_rows($consulta) > 0) {
            while ($resultado = mysqli_fetch_assoc($consulta)) {
                ?>
                <div class="pedido">
                    <h1 class="nombre"> Nº PEDIDO:
                        <script> let numAleatorio = Math.floor(Math.random() * (1000 - 1 + 1)) + 1;
                            document.write(numAleatorio);
                        </script>
                        <hr>
                        <p class="descripcion">
                            <strong>Nombre:</strong>
                            <?php echo $resultado['nombreUsuario']; ?>
                        </p>
                        <hr>
                        <p class="descripcion">
                            <strong>Correo electrónico:</strong>
                            <?php echo $resultado['correo']; ?>
                        </p>
                        <hr>
                        <p class="descripcion">
                            <strong>Dirección de envío:</strong>
                            <?php echo $resultado['direccion']; ?>
                        </p>

                </div>
                <?php
            }
        }
        if ($tipoUsuario == "Usuario") {
            ?>


            <button onclick="window.location.href='indexSesionIniciadaUsuario.php'" class="btn btn-primary btn-lg">
                Volver a la Biblioteca</button>
            <?php
        } else {
            ?>
            <button onclick="window.location.href='indexSesionIniciadaAdmin.php'" class="btn btn-primary btn-lg">
                Volver a la Biblioteca</button>
            <?php
        }
        ?>
    </div>
</body>

</html>
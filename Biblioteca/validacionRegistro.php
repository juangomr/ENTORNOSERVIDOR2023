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
                <?php
                include "conectarBBDD.php";
                if (!empty($_POST['registro'])) {
                    if (empty($_POST['usuario']) or empty($_POST['direccion']) or empty($_POST['correo']) or empty($_POST['contrasena'])) {
                        echo "<div><p class=alerta>Uno de los campos está vacío</p></div>";
                    } else {
                        $nombreUsuario = $_POST['usuario'];
                        $direccion = $_POST['direccion'];
                        $correo = $_POST['correo'];
                        $contrasena = $_POST['contrasena'];
                        $fechaRegistro = date("Y-m-d");
                        $sql = $conn->query("insert into usuario (correo, direccion, fechaReg, nombreUsuario, password) values ('$correo','$direccion','$fechaRegistro','$nombreUsuario','$contrasena')");
                        if ($sql == 1) {
                            echo "<div><p class=exito>Usuario registrado correctamente!</p></div>";
                        } else {
                            echo "<div><p class=alerta>Error al registrar</p></div>";
                        }
                    }
                }

                ?>
                <a href="registro.php">Volver a Registro</a>
                <a href="index.php">Volver a Biblioteca</a>
            </div>
        </div>
</body>

</html>
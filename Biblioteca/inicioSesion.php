<?php

include "conectarBBDD.php";

session_start();

if (isset($_POST['inicioSesion'])) {

  $email = mysqli_escape_string($conn, $_POST['correo']);
  $password = md5($_POST['contrasena']);

  $query = "SELECT * FROM usuario WHERE correo = '$email' OR password = '$password'";
  $resultado = mysqli_query($conn, $query);


  if (mysqli_num_rows($resultado) > 0) {

    $fila = mysqli_fetch_array($resultado);

    if ($fila['tipoUsuario'] == 'Admin') {
      $_SESSION['nombreAdmin'] = $fila['nombreUsuario'];
      header("refresh:2;url=registro.php"); ?>
      <!DOCTYPE html>
      <html lang="es">

      <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Inicio Sesion Biblioteca</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
        <link href="css/registro.css" rel="stylesheet">
      </head>

      <body>
        <div class="contenedorFormulario">

          <form action="" method="post" id="formulario" enctype="multipart/form-data">
            <img src="imagenes/Captura_de_pantalla_2024-01-24_152316-removebg-preview.png" class="card-img-top"
              alt="logotipo" />

            <h1>SESIÓN EFECTUADA CORRECTAMENTE!, Bienvenid@ Admin:
              <?php echo $_SESSION['nombreAdmin'] ?>
            </h1>
            <p>En breves le redireccionaremos a la página. Si tarda demasiado <a href="index.php">Pulse aquí</a></p>
          </form>
        </div>

      </body>

      </html>

      <?php
    } elseif ($fila['tipoUsuario'] == 'Usuario') {
      $_SESSION['nombreUsuario'] = $fila['nombreUsuario'];
      header("refresh:2;url=index.php"); ?>
      <!DOCTYPE html>
      <html lang="es">

      <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Inicio Sesion Biblioteca</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
        <link href="css/registro.css" rel="stylesheet">
      </head>

      <body>
        <div class="contenedorFormulario">

          <form action="" method="post" id="formulario" enctype="multipart/form-data">
            <img src="imagenes/Captura_de_pantalla_2024-01-24_152316-removebg-preview.png" class="card-img-top"
              alt="logotipo" />

            <h1>SESIÓN EFECTUADA CORRECTAMENTE!,Bienvenid@ Usuario:
              <?php echo $_SESSION['nombreUsuario'] ?>
            </h1>
            <p>En breves le redireccionaremos a la página. Si tarda demasiado <a href="index.php">Pulse aquí</a></p>
          </form>
        </div>

      </body>

      </html>
      <?php
    }
  } else {
    $error[] = "Email o contraseña incorrecta";
  }
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inicio Sesion Biblioteca</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link href="css/registro.css" rel="stylesheet">
</head>

<body>
  <div class="contenedorFormulario">

    <form action="" method="post" id="formulario" enctype="multipart/form-data">
      <img src="imagenes/Captura_de_pantalla_2024-01-24_152316-removebg-preview.png" class="card-img-top"
        alt="logotipo" />

      <h1>INICIAR SESIÓN</h1>
      <?php
      if (isset($error)) {
        foreach ($error as $error) {
          echo '<span class=mensajeError>' . $error . '</span>';
        }

      }
      ?>
      <input type="email" id="correo" name="correo" placeholder="Introduce tu correo electrónico" required />

      <input type="password" id="contrasena" name="contrasena" placeholder="Introduce tu contraseña" required />

      <input type="submit" name="inicioSesion" class="botonFormulario" value="INICIAR SESIÓN">
      <p>No tienes una cuenta? <a href="registro.php">Regístrate</a></p>

      <a href="index.php">Volver</a>
    </form>
  </div>

</body>

</html>
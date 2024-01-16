<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inicio Inmobiliaria</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link href="css/inicio.css" rel="stylesheet">
</head>

<body>
  <!--Cuerpo de la tarjeta utilizada de Bootstrap para presentar la información sobre el inicio -->
  <div class="card">
    <img src="imagenes/logo.jpg" class="card-img-top" alt="logotipo" />
    <div class="card-body">
      <h1 class="card-title">Inicio</h1>
      <p class="card-text">Opciones de navegación</p>
      <!--Botones de opciones de navegación -->
      <div class="d-grid gap-2">
        <button onclick="window.location.href='insertar.php'" class="btn btn-outline-dark btn-lg">Insertar
          Vivienda</button>
        <button onclick="window.location.href='bbdd.php'" class="btn btn-outline-dark btn-lg">Consultar
          Vivienda</button>
        <button onclick="window.location.href='eliminar.php'" class="btn btn-outline-dark btn-lg">Eliminar
          Vivienda</button>
      </div>
    </div>
</body>

</html>
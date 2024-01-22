<?php
//Conexión a la base de datos.
include "conectarBBDD.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Biblioteca AQUI NO SE LEE NUNCA</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link href="css/insertarLibro.css" rel="stylesheet" type="text/css">
</head>

<body>
  <div class="main">

    <!--Formulario de inserción de libros -->
    <form action="validacion.php" method="post" id="formulario" enctype="multipart/form-data">
      <h1 class="titulo">Nuevo Libro</h1>

      <div>

        <label for="autor">Autor:</label><br>
        <input type="text" id="autor" name="autor" placeholder="Autor..." required />

      </div>
      <div>
        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion" rows="4" cols="50"
          placeholder="Descripción del libro..."></textarea>
      </div>
      <div>

        <label for="editorial">Editorial:</label><br>
        <input type="text" id="editorial" name="editorial" placeholder="Editorial..." required />

      </div>
      <div>

        <label for="fecha">Fecha publicación:</label><br>
        <input type="date" id="fecha" name="fecha" placeholder="Fecha..." required />

      </div>
      <div>

        <label for="genero">Género literario:</label><br>
        <input type="text" id="genero" name="genero" placeholder="Género..." required />
      </div>


      <!--Campo para cargar la imagen-->
      <div>
        <label for="imagen">Imagen:</label><br>
        <input type="file" name="imagen" />

      </div>
      <div>

        <label for="precio">Precio:</label><br>
        <input class="precio" type="number" id="precio" name="precio" placeholder="Precio del libro...€" required />

      </div>

      <!--Botones para enviar el formulario y volver al inicio -->
      <div>
        <button onclick="window.location.href='index.php'" class="btn btn-warning btn-lg">Volver</button>
        <input type="submit" value="Guardar" name="insertar" id="insertar" class="btn btn-success btn-lg" />
      </div>
    </form>
  </div>

</body>

</html>
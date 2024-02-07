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
  <ul class="UlMenuTop">
    <img class="logo" src="imagenes/logoBiblioteca-removebg-preview.png">
    <li class="listasMenuTop"><a class="sinBarraVertical" href="indexSesionIniciadaAdmin.php">Biblioteca</a></li>
    <li class="listasMenuTop"><a class="enlacesMenuTop" href="Libros.php">Libros</a></li>
    <li class="listasMenuTop"><a class="enlacesMenuTop" href="usuario.php">Usuarios</a></li>

    <?php
    include "conectarBBDD.php";
    session_start(); ?>
    <li class="push-right">Bienvenido,
      <i class="fa-solid fa-user"></i>
      <?php echo $_SESSION['nombreAdmin'] ?>
    </li>
    <div class="carro">
      <img class="carrito" src="imagenes/carrito-removebg-preview.png">
      <li class="listasMenuTop"><a class="sinBarraVertical" href="#">CARRITO (0)</a></li>
    </div>
    <div class="buscador">
      <input type="text" placeholder="Buscar libros..." />
      <img class="lupa" src="imagenes/lupa-removebg-preview.png">
    </div>
  </ul>

  <div class="main">

    <!--Formulario de inserción de libros -->
    <form action="validacion.php" method="post" id="formulario" enctype="multipart/form-data">
      <h1 class="titulo">Nuevo Libro</h1>

      <div>

        <input type="text" id="autor" name="autor" placeholder="Autor..." required />

      </div>
      <div>
        <input type="text" id="descripcion" name="descripcion" placeholder="Nombre del libro..."></input>
      </div>
      <div>

        <input type="text" id="editorial" name="editorial" placeholder="Editorial..." required />

      </div>
      <div>

        <input type="date" id="fecha" name="fecha" placeholder="Fecha..." required />

      </div>
      <div>

        <input type="text" id="genero" name="genero" placeholder="Género..." required />
      </div>


      <div>

        <input class="precio" type="number" id="precio" name="precio" placeholder="Precio del libro...€" required />

      </div>
      <!--Campo para cargar la imagen-->
      <div>
        <input type="file" name="imagen" id="imagen" />

      </div>

      <!--Botones para enviar el formulario y volver al inicio -->
      <div>
        <input type="submit" value="Guardar" name="insertar" id="insertar" class="btn btn-success" />
      </div>
    </form>
  </div>

</body>

</html>
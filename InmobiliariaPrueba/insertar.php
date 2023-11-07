<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inmobiliaria Novendona</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link href="css/insertar.css" rel="stylesheet">
</head>

<body>
  <div>
    <h1>Inserción de vivienda</h1>
    <h2>Introduzca los datos de la vivienda:</h2>
    <?php
    include "conectarBBDD.php";
    ?>

    <table>
      <form action="validacion.php" method="post" id="formulario" enctype="multipart/form-data">
        <tr>
          <td>

            <label for="vivienda">Tipo de
              vivienda:</label>
          </td>
          <td>
            <select name="tipoVivienda">
              <option value="piso" selected>Piso</option>
              <option value="adosado">Adosado</option>
              <option value="chalet">Chalet</option>
              <option value="casa">Casa</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>
            <label for="zona">Zona:</label>
          </td>
          <td>
            <select name="tipoZona">
              <option value="nervion" selected>Nervión</option>
              <option value="centro">Centro</option>
              <option value="triana">Triana</option>
              <option value="aljarafe">Aljarafe</option>
              <option value="macarena">Macarena</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>
            <label for="direccion">Dirección:</label>
          </td>
          <td>
            <input type="text" id="dic" name="dic" placeholder="Avda de la Buhaira" required />


          </td>
        </tr>
        <tr>
          <td>
            <label for="dormitorios">Número de dormitorios</label>
          </td>
          <td>
            <input type="radio" id="1" name="dorm" value="1">1</input>
            <input type="radio" id="2" name="dorm" value="2">2</input>
            <input type="radio" id="3" name="dorm" value="3" checked>3</input>
            <input type="radio" id="4" name="dorm" value="4">4</input>
            <input type="radio" id="5" name="dorm" value="5">5</input>
          </td>
        </tr>
        <tr>
          <td>
            <label for="precio">Precio:</label>
          </td>
          <td>
            <input type="number" id="precio" name="precio" placeholder="360000" required />
            €

          </td>
        </tr>
        <tr>
          <td>
            <label for="tamaño">Tamaño:</label>
          </td>
          <td>
            <input type="number" id="tamaño" name="tamaño" placeholder="125" required />
            metros cuadrados

          </td>
        </tr>
        <tr>
          <td>
            <label for="extras">Extras (marque los que procedan):</label>
          </td>
          <td>
            <input type="checkbox" id="Piscina" name="extras[]" value="Piscina">Piscina</input>
            <input type="checkbox" id="Jardin" name="extras[]" value="Jardin">Jardin</input>
            <input type="checkbox" id="Garage" name="extras[]" value="Garage">Garage</input>
            <input type="checkbox" id="Ninguno" name="extras[]" value="Ninguno" checked>Ninguno</input>
          </td>
        </tr>
        <tr>
          <td class="upload-screen">
            <input type="file" name="imagen" />
            <input type="submit" name="subir-imagen" value="Subir archivo" />
          </td>
        </tr>

        <tr>
          <td>
            <label for="observaciones">Observaciones:</label>
          </td>
          <td>
            <textarea id="obs" name="obs" rows="4" cols="50" placeholder="Introduzca aquí una observación"></textarea>
          </td>
        </tr>
        <tr>
          <td>

            <input type="submit" value="Insertar vivienda" name="insertar" id="insertar"
              class="btn btn-outline-dark btn-lg" />
            <button onclick="window.location.href='inicio.php'" class="btn btn-outline-dark btn-lg">Volver al
              inicio</button>
          </td>
        </tr>
      </form>
    </table>
  </div>

</body>

</html>
<?php

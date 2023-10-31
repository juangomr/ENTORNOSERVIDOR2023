<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inmobiliaria Novendona</title>
  <link href="css/insertar.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <!-- <script>
    $(function () {
      $("#btn_ajax").click(function () {

        $.ajax({
          type: "POST",
          url: "app.php",
          data: $("#form_ajax").serialize(), //Adjuntar los campos del formulario enviado
          success: function (data) {
            $("#mensaje").html(data); // Mostrar las respuestas del script PHP
          }

        });
        return false; // Evita ejecutar el submit del formulario
      });
    });
  </script>-->
</head>

<body>
  <h1>Inserción de vivienda</h1>
  <p>Introduzca los datos de la vivienda:</p>
  <div>
    <table>
      <form action=validacion.php method="post" id="form_ajax" enctype="multipart/form-data">
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
            <input type="text" id="dic" name="dic" placeholder="Avda de la Buhaira" />
            <div id="e_direccion"></div>

          </td>
        </tr>
        <tr>
          <td>
            <label for="dormitorios">Número de dormitorios</label>
          </td>
          <td>
            <input type="radio" id="1" name="dorm" value="1">1</input>
            <input type="radio" id="2" name="dorm" value="2">2</input>
            <input type="radio" id="3" name="dorm" value="3">3</input>
            <input type="radio" id="4" name="dorm" value="4">4</input>
            <input type="radio" id="5" name="dorm" value="5">5</input>
          </td>
        </tr>
        <tr>
          <td>
            <label for="precio">Precio:</label>
          </td>
          <td>
            <input type="text" id="precio" name="precio" placeholder="360000" />
            €
            <div id="e_precio"></div>
          </td>
        </tr>
        <tr>
          <td>
            <label for="tamaño">Tamaño:</label>
          </td>
          <td>
            <input type="text" id="tamaño" name="tamaño" placeholder="125" />
            metros cuadrados
            <div id="e_tamaño"></div>
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
            <div id="e_extras"></div>
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
            <input type="hidden" name="ajax">
            <input type="button" value="Insertar vivienda" name="insertar" id="btn_ajax" />
          </td>
        </tr>
      </form>
    </table>
  </div>
</body>

</html>
<?php
require "conectarBBDD.php";
$descripcion = "";
$autor = "";
$genero = "";
$editorial = "";
$fecha_publicacion = "";
$precio = "";
$imagen = "";

// Ruta al archivo JSON
$ruta_json = 'cargaLibrosInicial.json';

// Leer datos desde el archivo JSON
$json_data = file_get_contents($ruta_json);
$data = json_decode($json_data, true);
if ($data === null) {
    // Hubo un error al decodificar el JSON
    echo 'Error al decodificar el JSON.';
} else {
    // La decodificación fue exitosa, ahora puedes trabajar con los datos

    // Conexión a la base de datos (ajusta los detalles según tu configuración)
    $conexion = new mysqli('localhost', 'root', '', 'biblioteca');

    // Verifica la conexión
    if ($conexion->connect_error) {
        die('Error de conexión a la base de datos: ' . $conexion->connect_error);
    }

    // Itera sobre los libros en el array
    foreach ($data as $libro) {
        // Verifica si las claves existen antes de acceder a ellas
        $descripcion = isset($libro['descripcion']) ? $conexion->real_escape_string($libro['descripcion']) : '';
        $autor = isset($libro['autor']) ? $conexion->real_escape_string($libro['autor']) : '';
        $genero = isset($libro['genero']) ? $conexion->real_escape_string($libro['genero']) : '';
        $editorial = isset($libro['editorial']) ? $conexion->real_escape_string($libro['editorial']) : '';
        $fecha_publicacion = isset($libro['fecha_publicacion']) ? $conexion->real_escape_string($libro['fecha_publicacion']) : '';
        $precio = isset($libro['precio']) ? (float) ($libro['precio']) : 0.0; // Precio como número decimal
        $imagen = isset($libro['imagen']) ? $conexion->real_escape_string($libro['imagen']) : '';

        // Query para insertar los datos en la base de datos
        $sql = "INSERT INTO libros (autor, descripcion, editorial, fecha_publicacion, genero, imagen, precio) VALUES ('$autor', '$descripcion', '$editorial', '$fecha_publicacion', '$genero', '$imagen', '$precio')";


        // Ejecuta la consulta
        if ($conexion->query($sql) !== TRUE) {
            echo 'Error al insertar datos: ' . $conexion->error;
        }
    }
    // Cierra la conexión
    $conexion->close();

    echo 'Datos insertados correctamente en la base de datos.';
}

?>
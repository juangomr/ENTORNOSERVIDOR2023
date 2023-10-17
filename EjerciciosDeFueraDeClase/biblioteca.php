<?php
$user = "root";
$password = "";
$host = "localhost";
$db = "biblioteca";
$port = 3308;
$conn = mysqli_connect($host, $user, $password, $db, $port);

if (!$conn) {
    echo "error conectando a la bbdd";
    exit();
} else {
    echo "la bbdd se ha conectado";
}

/*
Para insertar datos
$sql = "INSERT INTO libros (Titulo, Autor, Editorial, ISBN, Idioma) VALUES ('El Quijote', 'Juan', 'Alfaguara', '0-15487-146-5', 'Español')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
   echo mysqli_affected_rows($conn);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);*/

/*Para hacer una consulta*/

$query = "SELECT * FROM libros";

$resultado = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($resultado)) {
    echo print_r($row);
}

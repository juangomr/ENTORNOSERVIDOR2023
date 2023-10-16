<?php

$con = mysqli_connect("localhost", "root", "", "FP");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: . mysqli_connect_error()";
    exit();

}
echo "se ha conectado a la bbdd";


//$query  = "SELECT CURRENT_USER();";
$query .= "SELECT * FROM alumnos";

//$datos = mysqli_query($query);

/* cerrar conexión */
mysqli_close($link);


?>
<?php
$_SERVER["REQUEST_METHOD"] == "POST";
$texto = $_POST['name'];

if (is_null($texto)) {
    echo "es nulo <br>";
} else {
    echo "no es nulo <br>";
}
if (is_string($texto)) {
    echo "es string <br>";
} else {
    echo "no es string <br> ";
}

if (is_numeric($texto)) {
    echo "es numerico <br> ";
} else {
    echo "no es numerico <br> ";
}

if (isset($texto)) {
    echo "es isset <br> ";
} else {
    echo "no es isset <br> ";
}

?>
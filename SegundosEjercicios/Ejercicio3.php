<?php
$_SERVER["REQUEST_METHOD"] == "POST";

function recoge($var, $m = "")
{
    $tmp = is_array($m) ? [] : "";
    if (isset($_REQUEST[$var])) {
        if (!is_array($_REQUEST[$var]) && !is_array($m)) {
            $tmp = trim(htmlspecialchars($_REQUEST[$var]));
        } elseif (is_array($_REQUEST[$var]) && is_array($m)) {
            $tmp = $_REQUEST[$var];
            array_walk_recursive($tmp, function (&$valor) {
                $valor = trim(htmlspecialchars($valor));
            });
        }
    }
    return $tmp;
}

// Variables que recogen los datos
$nombre = recoge("nombre");
// Variables auxiliares de comprobación
$nombreOk = false;

// Validación de datos y generación de avisos
if ($nombre == "") {
    $url = "Ejercicio3.html";
    print "  <p class=\"aviso\">No ha escrito su nombre.</p>\n";
    print "\n";
    print "<a href=$url>Volver al formulario</a>";
} else {
    $nombreOk = true;
}

// Si todo es correcto, ejecución del programa
if ($nombreOk) {
    print "  <p>Su nombre es <strong>$nombre</strong>.</p>\n";
    print "\n";
}


?>
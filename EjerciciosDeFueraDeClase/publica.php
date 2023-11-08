<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Introduce tus credenciales</h1>
    <form action=privada.php method="session">
        <input type="text" name="nombre" placeholder="Apodo.">
        <input type="password" name="contraseña" placeholder="Password.">
        <input type="submit" value="Validar">
    </form>
</body>

</html>
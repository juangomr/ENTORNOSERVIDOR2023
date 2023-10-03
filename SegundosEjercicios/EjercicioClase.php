<?php
$_SERVER["REQUEST_METHOD"] == "POST";

$media = ($_POST['precio1'] + $_POST['precio2'] + $_POST['precio3']) / 3;
echo $media;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="Ejercicio12.php">
        <label>1</label><input type="txt" name="1" /><br />
        <label>2</label><input type="txt" name="2" /><br />
        <label>3</label><input type="txt" name="3" /><br />
        <label>4</label><input type="txt" name="4" /><br />
        <label>5</label><input type="txt" name="5" /><br />
        <label>6</label><input type="txt" name="6" /><br />
        <label>7</label><input type="txt" name="7" /><br />
        <label>8</label><input type="txt" name="8" /><br />
        <input type="submit" value="Submit" />

        <?php
        $a = array($_POST['1'], $_POST['2'], $_POST['3'], $_POST['4'], $_POST['5'], $_POST['6'], $_POST['7'], $_POST['8']);

        echo "El sumatorio es: " . array_sum($a);

        ?>
</body>

</html>
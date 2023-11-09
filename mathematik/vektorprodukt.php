<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vektorprodukt</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Vektorprodukt</h1><br>
    <form action="vektorprodukt.php" method="post">
        <h2>A</h2>
        <label for="ax">ax</label>
        <input type="text" name="ax" id="ax">
        <br>
        <label for="ay">ay</label>
        <input type="text" name="ay" id="ay">
        <br>
        <label for="az">az</label>
        <input type="text" name="az" id="az">
        <br>
        <h2>B</h2>
        <label for="bx">bx</label>
        <input type="text" name="bx" id="bx">
        <br>
        <label for="by">by</label>
        <input type="text" name="by" id="by">
        <br>
        <label for="bz">bz</label>
        <input type="text" name="bz" id="bz">
        <br>
        <input type="submit" value="Senden">
    </form>
    <br>

    <?php
    if (isset($_POST['ax'], $_POST['ay'], $_POST['az'], $_POST['bx'], $_POST['by'], $_POST['bz'])) {
        $ax = $_POST['ax'];
        $ay = $_POST['ay'];
        $az = $_POST['az'];

        $bx = $_POST['bx'];
        $by = $_POST['by'];
        $bz = $_POST['bz'];

        if ($ax !== '' && $ay !== '' && $az !== '' && $bx !== '' && $by !== '' && $bz !== '') {

            $ab1 = ($ay * $bz) - ($az * $by);
            $ab2 = ($az * $bx) - ($ax * $bz);
            $ab3 = ($ax * $by) - ($ay * $bx);

            $flaecheninhalt = sqrt($ab1 ** 2 + $ab2 ** 2 + $ab3 ** 2);
            echo "<h1>Vektorprodukt</h1><br>$ab1 <br>";
            echo "$ab2 <br>";
            echo "$ab3 <br>";
            echo "<h1>Flächeninhalt</h1><br>$flaecheninhalt";
        }
    }
    ?>

</body>
</html>

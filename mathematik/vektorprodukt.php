<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vektorprodukt</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f1f1f1;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
    </style>
</head>

<body>
    <form class="main-form" action="vektorprodukt.php" method="post">
        <h2>A</h2>
        <label class="main-label" for="ax">ax</label>
        <input class="main-input" type="text" name="ax" id="ax" required>
        <br>
        <label class="main-label" for="ay">ay</label>
        <input class="main-input" type="text" name="ay" id="ay" required>
        <br>
        <label class="main-label" for="az">az</label>
        <input class="main-input" type="text" name="az" id="az" required>
        <br>
        <h2>B</h2>
        <label class="main-label" for="bx">bx</label>
        <input class="main-input" type="text" name="bx" id="bx" required>
        <br>
        <label class="main-label" for="by">by</label>
        <input class="main-input" type="text" name="by" id="by" required>
        <br>
        <label class="main-label" for="bz">bz</label>
        <input class="main-input" type="text" name="bz" id="bz" required>
        <br>
        <input class="main-button" type="submit" value="Berechnen">
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
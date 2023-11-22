<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skalarprodukt</title>
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
    <form class="main-form" action="skalarprodukt.php" method="post">
        <h2>A</h2>
        <label class="main-label" for="ax">ax</label>
        <input class="main-input" type="text" name="ax" id="ax" required>
        <br>
        <label class="main-label" for="ay">ay</label>
        <input class="main-input" type="text" name="ay" id="ay" required>
        <br>
        <h2>B</h2>
        <label class="main-label" for="bx">bx</label>
        <input class="main-input" type="text" name="bx" id="bx" required>
        <br>
        <label class="main-label" for="by">by</label>
        <input class="main-input" type="text" name="by" id="by" required>
        <input class="main-button" type="submit" value="Senden">
    </form>
    <br>
    <?php
        if(isset($_POST["ax"]) && isset($_POST["ay"]) && isset($_POST["bx"]) && isset($_POST["by"])){
            $ax = $_POST["ax"];
            $ay = $_POST["ay"];
            $bx = $_POST["bx"];
            $by = $_POST["by"];

            $ergebniss = ($ax * $bx) + ($ay * $by);

            echo"Skalarprodukt = ". $ergebniss;
        }
    ?>
</body>
</html>

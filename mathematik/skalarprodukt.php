<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <h2>B</h2>
        <label for="bx">bx</label>
        <input type="text" name="bx" id="bx">
        <br>
        <label for="by">by</label>
        <input type="text" name="by" id="by">
        <input type="submit" value="Senden">
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

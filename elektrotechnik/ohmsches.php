<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ohmsches Gesetz berechnen</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Ohmsches Gesetz berechnen</h1>
    <p>Komma mit Punkt schreiben</p><br>
    <form action="ohmsches.php" method="post">
        <p>Ohm'sches Gesetz</p>
        <label for="spannung">Spannung U</label>
        <input type="text" name="spannung" id="spannung"><br>
        <label for="wiederstand">Wiederstand R</label>
        <input type="text" name="wiederstand" id="wiederstand"><br>
        <label for="strom">Strom I</label>
        <input type="text" name="strom" id="strom"><br>
        <p>Welches Ergebnis soll rauskommen</p>
        <label for="ergvol">Volt</label>
        <input type="radio" name="ergvol" id="ergvol"><br>
        <label for="ergohm">Wiederstand</label>
        <input type="radio" name="ergohm" id="ergohm"><br>
        <label for="ergamp">Ampere</label>
        <input type="radio" name="ergamp" id="ergamp"><br>
        <input type="submit" value="Berechnen"><br><br>
    </form>
    <?php
    if(isset($_POST["spannung"]) && isset($_POST["wiederstand"]) && isset($_POST["ergamp"])){
        $spannung = intval($_POST["spannung"]);
        $wiederstand = intval($_POST["wiederstand"]);
    
        $strom = $spannung / $wiederstand;
    
        echo"<p style='color: #24a824;'>Strom = ". $strom . " Ampere</p>";
    
    }else if(isset($_POST["spannung"]) && isset($_POST["strom"]) && isset($_POST["ergohm"])){
        $spannung1 = intval($_POST["spannung"]);
        $strom1 = intval($_POST["strom"]);

        $wiederstand1 = $spannung / $strom;
        echo"<p style='color: #24a824;'>Wiederstand. = ". $wiederstand1 . " Ohm</p>";
    }else if(isset($_POST["wiederstand"]) && isset($_POST["strom"]) && isset($_POST["ergvol"])){
        $wiederstand2 = intval($_POST["wiederstand"]);
        $strom2 = intval($_POST["strom"]);

        $spannung2 = $wiederstand2 * $strom2;
        echo"<p style='color: #24a824;'>Spannung = ". $spannung2 . " Volt</p>";
    }
    ?>
</body>
</html>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kondensator berechnen</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Kondensator berechnen</h1>
    <p>Komma mit Punkt schreiben</p><br>
    <form action="kondensator.php" method="post">
        <p>I Berechnen</p>
        <label for="spannung">U</label>
        <input type="text" name="spannung" id="spannung"><br>
        <label for="blindwiederstand">XL</label>
        <input type="text" name="blindwiederstand" id="blindwiederstand"><br>
        <input type="submit" value="Berechnen"><br>
    </form>
    <?php
    if(isset($_POST["spannung"]) && isset($_POST["blindwiederstand"])){
        $spannung = $_POST["spannung"];
        $blindwiederstand = $_POST["blindwiederstand"];
    
        $strom = -1 * $spannung / $blindwiederstand;
    
        echo"<p style='color: #24a824;'>I = ". $strom . " Ampere</p>";
    
    }
    ?>
    <form action="kondensator.php" method="post">
        <p>XL Berechnen</p>
        <label for="kapazitaet">C</label>
        <input type="text" name="kapazitaet" id="kapazitaet"><br>
        <label for="induktivitaet">L</label>
        <input type="text" name="induktivitaet" id="induktivitaet"><br>
        <input type="submit" value="Berechnen"><br>
    </form>
    <?php
    if(isset($_POST["kapazitaet"]) && isset($_POST["induktivitaet"])){
        $kapazitaet = $_POST["kapazitaet"];
        $induktivitaet = $_POST["induktivitaet"];

        $omega = 2 * pi() * $induktivitaet;
        $blindwiederstandxl = -1 / ($omega * $kapazitaet);

        echo"<p style='color: #24a824;'>XL = ". $blindwiederstandxl . " Ohm</p>";
    }
    ?>
    <form action="kondensator.php" method="post">
        <p>U Berechnen</p>
        <label for="stromu">I</label>
        <input type="text" name="stromu" id="stromu"><br>
        <label for="blindwiederstandu">XL</label>
        <input type="text" name="blindwiederstandu" id="blindwiederstandu"><br>
        <input type="submit" value="Berechnen"><br>
    </form>
    <?php
    if(isset($_POST["stromu"]) && isset($_POST["stromu"])){
        $stromu = $_POST["stromu"];
        $blindwiederstandu = $_POST["blindwiederstandu"];

        $spannungu = $stromu * $blindwiederstandu;

        echo"<p style='color: #24a824;'>U = ". $spannungu . " Volt</p>";
    }
    ?>
</body>
</html>



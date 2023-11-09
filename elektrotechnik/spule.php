<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spule berechnen</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Spule berechnen</h1>
    <p>Komma mit Punkt schreiben</p><br>
    <form action="spule.php" method="post">
        <p>I Berechnen</p>
        <label for="spannung">U</label>
        <input type="text" name="spannung" id="spannung"><br>
        <label for="induktivitaet">L</label>
        <input type="text" name="induktivitaet" id="induktivitaet"><br>
        <input type="submit" value="Berechnen"><br><br>
    </form>
    <?php
    if(isset($_POST["spannung"]) && isset($_POST["induktivitaet"])){
        $spannung = $_POST["spannung"];
        $induktivitaet = $_POST["induktivitaet"];
    
        $omega = 2 * pi() * $induktivitaet;
        $blindwiederstand = $omega * $induktivitaet;
        $strom = $spannung / $blindwiederstand;
    
        echo"<p style='color: #24a824;'>Omega = ". $omega . "</p>";
        echo"<p style='color: #24a824;'>XL = ". $blindwiederstand . " Ohm</p>";
        echo"<p style='color: #24a824;'>I = ". $strom . " Ampere</p>";
    
    }
    ?>
    <form action="spule.php" method="post">
        <p>XL Berechnen</p>
        <label for="spannungxl">U</label>
        <input type="text" name="spannungxl" id="spannungxl"><br>
        <label for="stromxl">I</label>
        <input type="text" name="stromxl" id="stromxl"><br>
        <input type="submit" value="Berechnen"><br><br>
    </form>
    <?php
    if(isset($_POST["stromxl"]) && isset($_POST["spannungxl"])){
        $spannungxl = $_POST["spannungxl"];
        $stromxl = $_POST["stromxl"];

        $blindwiederstandxl = $spannungxl * $stromxl;

        echo"<p style='color: #24a824;'>XL = ". $blindwiederstandxl . " Ohm</p>";
    }
    ?>
</body>
</html>



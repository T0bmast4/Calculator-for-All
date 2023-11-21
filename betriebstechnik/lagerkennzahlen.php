<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lagerkennzahlen</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Durchschnittlicher Lagerbestand (Durchschnittslager)</h1>
    <form method="post">
        <label for="anfangsbestand">Anfangsbestand</label>
        <input type="text" name="anfangsbestand" id="anfangsbestand" required><br>

        <label for="quartal1">1. Quartal</label>
        <input type="text" name="quartal1" id="quartal1" value="0" required><br>
        
        <label for="quartal2">2. Quartal</label>
        <input type="text" name="quartal2" id="quartal2" value="0" required><br>

        <label for="quartal3">3. Quartal</label>
        <input type="text" name="quartal3" id="quartal3" value="0" required><br>

        <label for="quartal4">4. Quartal</label>
        <input type="text" name="quartal4" id="quartal4" value="0" required><br>

        <label for="warenabgänge">Warenabgänge pro Monat</label>
        <input type="text" name="warenabgänge" id="warenabgänge" value="0" required><br>

        <label for="preis">Wert pro Stück</label>
        <input type="text" name="preis" id="preis" value="0" required><br>

        <label for="lagerhaltungskostensatz">Lagerhaltungskostensatz</label>
        <input type="text" name="lagerhaltungskostensatz" id="lagerhaltungskostensatz" value="0" required><br>

        <input type="submit" value="Berechnen">
    </form>

    <?php
        if (isset($_POST['anfangsbestand'], $_POST['quartal1'], $_POST['quartal2'], $_POST['quartal3'], $_POST['quartal4'], $_POST['warenabgänge'], $_POST['preis'], $_POST['lagerhaltungskostensatz'])){
            $an = $_POST['anfangsbestand'];
            $q1 = $_POST['quartal1'];
            $q2 = $_POST['quartal2'];
            $q3 = $_POST['quartal3'];
            $q4 = $_POST['quartal4'];
            $wa = $_POST['warenabgänge'];
            $pr = $_POST['preis'];
            $lks = $_POST['lagerhaltungskostensatz'];

            $durchschnittlagerbestand = ($an + $q1 + $q2 + $q3 + $q4) / 5;
            $formatiertbestand = number_format($durchschnittlagerbestand, 2, ',',  '.');

            $jahrverbrauch = 12 * $wa;
            $formatiertverbrauch = number_format($jahrverbrauch, 2, ',',  '.');

            $lagerumschlagshäufigkeit = $jahrverbrauch / $durchschnittlagerbestand;

            $durchschnittlagerdauer = round(360 / $lagerumschlagshäufigkeit, 2);
            $formatiertdauer = number_format($durchschnittlagerdauer, 2, ',',  '.');

            $kapitalbindung = $durchschnittlagerbestand * $pr;
            $formatiertkapital = number_format($kapitalbindung, 2, ',', '.');

            $lagerhaltungskosten = $kapitalbindung * (0.01 * $lks);
            $formatiertlager = number_format($lagerhaltungskosten, 2, ',', '.');



            echo"Durchschnittlicher Lagerbestand = " .$formatiertbestand. " Stück<br>";
            echo"Jährlicher Verbrauch = " .$formatiertverbrauch. " Stück<br>";
            echo"Lagerumschlagshäufigkeit = " .$lagerumschlagshäufigkeit. "<br>";
            echo"Durchschnittliche Lagerdauer = " .$formatiertdauer. " Tage<br>";
            echo"Durchschnittliche Kapitalbindung = " .$formatiertkapital. "€<br>";
            echo"Lagerhaltungskosten = " .$formatiertlager. "€<br>";

        }
    ?>
</body>
</html>
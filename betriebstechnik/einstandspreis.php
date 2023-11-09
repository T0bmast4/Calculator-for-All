<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Einstandspreis berechnen</h1>
    <p>Komma mit Punkt schreiben!!</p>
    <form action="einstandspreis.php" method="post">
        <label for="brutto">Bruttopreis</label>
        <input type="text" name="brutto" id="brutto"><br>
        <label for="ust">USt</label>
        <input type="text" name="ust" id="ust"><br>
        <label for="rabatt">Rabbat</label>
        <input type="text" name="rabatt" id="rabatt"><br>
        <label for="skonto">Skonto</label>
        <input type="text" name="skonto" id="skonto"><br>
        <label for="trabatt">Treuerabatt</label>
        <input type="text" name="trabatt" id="trabatt"><br>
        <label for="fracht">Fracht (Brutto)</label>
        <input type="text" name="fracht" id="fracht"><br>
        <label for="verpackung">Verpackung (Brutto)</label>
        <input type="text" name="verpackung" id="verpackung"><br>
        <label for="versicherung">Versicherung</label>
        <input type="text" name="versicherung" id="versicherung"><br>
        <label for="stueck">Stückzahl</label>
        <input type="text" name="stueck" id="stueck"><br>
        <input type="submit" value="Berechnen"><br><br>
    </form>
    <?php
    if(isset($_POST["brutto"]) && isset($_POST["ust"]) && isset($_POST["rabatt"]) && isset($_POST["skonto"]) && isset($_POST["fracht"]) && isset($_POST["verpackung"]) && isset($_POST["versicherung"]) && isset($_POST["stueck"]) && isset($_POST["trabatt"])){

        $brutto = $_POST["brutto"];
        $ust = $_POST["ust"];
        $rabatt = $_POST["rabatt"];
        $skonto = $_POST["skonto"];
        $trabatt = $_POST["trabatt"];
        $fracht = $_POST["fracht"];
        $verpackung = $_POST["verpackung"];
        $versicherung = $_POST["versicherung"];
        $stueck = $_POST["stueck"];

        $nettominus = $brutto / (100 + $ust) * $ust;
        $netto = $brutto - $nettominus;

        $zekpminus = $netto / 100 * $rabatt;
        $zekp = $netto - $zekpminus;

        $trabattminus = $zekp / 100 * $trabatt;
        $zekp1 = $zekp - $trabattminus;

        $bekpminus = $zekp1 / 100 * $skonto;
        $bekp = round($zekp1 - $bekpminus, 2);

        $frachtpreis = round($fracht / (100 + $ust) * 100, 2);
        $verpackungspreis = round($verpackung / (100 + $ust) * 100, 2);

        $einstandspreis = $bekp + $frachtpreis + $verpackungspreis + $versicherung;

        $stuekpreis = round($einstandspreis / $stueck, 2);
        
        echo"Bruttopreis: ". $brutto ."<br>";
        echo"Nettopreis: ". $netto ."<br>";
        echo"Zieleinkaufspreis: ". $zekp ."<br>";
        echo"Bareinkaufspreis: ". $bekp ."<br>";
        echo"Einstandspreis: ". $einstandspreis ."<br>";
        echo"Einstandspreis pro Stück: ". $stuekpreis ."<br>";

    }
    ?>
</body>
</html>
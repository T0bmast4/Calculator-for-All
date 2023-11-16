<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kondensator berechnen</title>
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align:center;
            color: #333;
        }

        p { text-align:center;
            color: #555;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        p.error {
            color: red;
            font-weight: bold;
        }

        p.result {
            color: #24a824;
            font-weight: bold;
            font-size: 26px;
        }



    </style>
</head>
<body>
    <h1>Kondensator berechnen</h1>
    <p class="error">Komma mit Punkt schreiben</p><br>
    <form action="kondensator.php" method="post">
        <label for="U">U</label>
        <input type="text" name="U" id="U">
        <label for="f">f</label>
        <input type="text" name="f" id="f">
        <label for="C">C</label>
        <input type="text" name="C" id="C">
        <select name="einheit">
            <option value="uF">Mikrofarad</option>
            <option value="nF">Nanofarad</option>
            <option value="pF">Pikofarad</option>
        </select>
        <label for="R">R</label>
        <input type="text" name="R" id="R">
        <input type="submit" value="Berechnen">
    </form>
    <?php
    if(isset($_POST["U"]) && isset($_POST["f"]) && isset($_POST["C"]) && isset($_POST["R"])){
        $u = $_POST["U"];
        $f = $_POST["f"];
        $c = $_POST["C"];
        $r = $_POST["R"];
        $einheit = isset($_POST["einheit"]) ? $_POST["einheit"] : ""; 

       
        if (!is_numeric($u) || !is_numeric($f) || !is_numeric($c) || !is_numeric($r)) {
            echo "<p class='error'>Bitte geben Sie numerische Werte ein.</p>";
           
        } else {
            if ($einheit === "nF") {
                $C = $c * pow(10, -9);
            } elseif ($einheit === "uF") {
                $C = $c * pow(10, -6);
            } elseif ($einheit === "pF") {
                $C = $c * pow(10, -12);
            }  else {
                $C = $c;
            }

            $w = round(2 * M_PI * $f, 2);
            $xc = ($f != 0) ? round(-1 / (2 * M_PI * $f * $C), 2) : "Undefined";
            $z = round(sqrt($r ** 2 + $xc ** 2), 2);
            $i = round($u / $z, 2);
            $ur = round($r * $i, 2);
            $uc = round($xc * $i, 2);

            echo "<p class='result'>w = " . $w . "</p>";
            echo "<p class='result'>Xc = " . $xc . " Ohm</p>";
            echo "<p class='result'>Z = " . $z . " Ohm</p>";
            echo "<p class='result'>I = " . $i . " Ampere</p>";
            echo "<p class='result'>Ur = " . $ur . " Volt</p>";
            echo "<p class='result'>Uc = " . $uc . " Volt</p>";
        }
    }
    ?>

</body>
</html>

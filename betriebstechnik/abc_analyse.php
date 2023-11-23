<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC-Analyse</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php
    $stk_jahr = 0;
    $stk_euro = 0;
    $ges = 0;
    $ant = 0;
    $rang = 0;
    $kum_ant = 0;
    $kat = "~";
    $ant_mat_pos = 0;
    $kum_ant_mat_pos = 0;

    $stk_jahr2 = 0;
    $stk_euro2 = 0;
    $ges2 = 0;
    $ant2 = 0;
    $rang2 = 0;
    $kum_ant2 = 0;
    $kat2 = "~";
    $ant_mat_pos2 = 0;
    $kum_ant_mat_pos2 = 0;

    $stk_jahr3 = 0;
    $stk_euro3 = 0;
    $ges3 = 0;
    $ant3 = 0;
    $rang3 = 0;
    $kum_ant3 = 0;
    $kat3 = "~";
    $ant_mat_pos3 = 0;
    $kum_ant_mat_pos3 = 0;

    $stk_jahr4 = 0;
    $stk_euro4 = 0;
    $ges4 = 0;
    $ant4 = 0;
    $rang4 = 0;
    $kum_ant4 = 0;
    $kat4 = "~";
    $ant_mat_pos4 = 0;
    $kum_ant_mat_pos4 = 0;

    $stk_jahr5 = 0;
    $stk_euro5 = 0;
    $ges5 = 0;
    $ant5 = 0;
    $rang5 = 0;
    $kum_ant5 = 0;
    $kat5 = "~";
    $ant_mat_pos5 = 0;
    $kum_ant_mat_pos5 = 0;

    $A1 = "?";
    $A2 = "?";
    $B1 = "?";
    $B2 = "?";
    $C1 = "?";
    $C2 = "?";

    $sum_stk_jahr = 0;
    $sum_stk_euro = 0;
    $sum_ant = 0;
    $sum_ges = 0;
    $sum_ant_mat_pos = 0;

    if (
        isset($_POST["stk_jahr"])
        && isset($_POST["stk_euro"])
        && isset($_POST["stk_jahr2"])
        && isset($_POST["stk_euro2"])
        && isset($_POST["stk_jahr3"])
        && isset($_POST["stk_euro3"])
        && isset($_POST["stk_jahr4"])
        && isset($_POST["stk_euro4"])
        && isset($_POST["stk_jahr5"])
        && isset($_POST["stk_euro5"])
        && isset($_POST["A1"])
        && isset($_POST["A2"])
        && isset($_POST["B1"])
        && isset($_POST["B2"])
        && isset($_POST["C1"])
        && isset($_POST["C2"])
    ) {
        if (
            is_numeric(str_replace(",", ".", $_POST["stk_jahr"]))
            && is_numeric(str_replace(",", ".", $_POST["stk_euro"]))
            && is_numeric(str_replace(",", ".", $_POST["stk_jahr2"]))
            && is_numeric(str_replace(",", ".", $_POST["stk_euro2"]))
            && is_numeric(str_replace(",", ".", $_POST["stk_jahr3"]))
            && is_numeric(str_replace(",", ".", $_POST["stk_euro3"]))
            && is_numeric(str_replace(",", ".", $_POST["stk_jahr4"]))
            && is_numeric(str_replace(",", ".", $_POST["stk_euro4"]))
            && is_numeric(str_replace(",", ".", $_POST["stk_jahr5"]))
            && is_numeric(str_replace(",", ".", $_POST["stk_euro5"]))
        ) {
            if (
                ($_POST["stk_jahr"]) != 0
                && ($_POST["stk_euro"]) != 0
                && ($_POST["stk_jahr2"]) != 0
                && ($_POST["stk_euro2"]) != 0
                && ($_POST["stk_jahr3"]) != 0
                && ($_POST["stk_euro3"]) != 0
                && ($_POST["stk_jahr4"]) != 0
                && ($_POST["stk_euro4"]) != 0
                && ($_POST["stk_jahr5"]) != 0
                && ($_POST["stk_euro5"]) != 0
            ) {



                $stk_jahr = floatval(str_replace(',', '.', $_POST["stk_jahr"]));
                $stk_euro = floatval(str_replace(',', '.', $_POST["stk_euro"]));
                $ges = $stk_jahr * $stk_euro;

                $stk_jahr2 = floatval(str_replace(',', '.', $_POST["stk_jahr2"]));
                $stk_euro2 = floatval(str_replace(',', '.', $_POST["stk_euro2"]));
                $ges2 = $stk_jahr2 * $stk_euro2;

                $stk_jahr3 = floatval(str_replace(',', '.', $_POST["stk_jahr3"]));
                $stk_euro3 = floatval(str_replace(',', '.', $_POST["stk_euro3"]));
                $ges3 = $stk_jahr3 * $stk_euro3;

                $stk_jahr4 = floatval(str_replace(',', '.', $_POST["stk_jahr4"]));
                $stk_euro4 = floatval(str_replace(',', '.', $_POST["stk_euro4"]));
                $ges4 = $stk_jahr4 * $stk_euro4;

                $stk_jahr5 = floatval(str_replace(',', '.', $_POST["stk_jahr5"]));
                $stk_euro5 = floatval(str_replace(',', '.', $_POST["stk_euro5"]));
                $ges5 = $stk_jahr5 * $stk_euro5;


                if (is_numeric(str_replace("%", "", $_POST["A1"])) && is_numeric(str_replace("%", "", $_POST["A2"])) && is_numeric(str_replace("%", "", $_POST["B1"])) && is_numeric(str_replace("%", "", $_POST["B2"])) && is_numeric(str_replace("%", "", $_POST["C1"])) && str_replace("%", "", $_POST["C2"])) {
                    $A1 = $_POST["A1"];
                    $A2 = $_POST["A2"];
                    $B1 = $_POST["B1"];
                    $B2 = $_POST["B2"];
                    $C1 = $_POST["C1"];
                    $C2 = $_POST["C2"];
                }
                $sum_stk_jahr = $stk_jahr + $stk_jahr2 + $stk_jahr3 + $stk_jahr4 + $stk_jahr5;
                $sum_stk_euro = $stk_euro + $stk_euro2 + $stk_euro3 + $stk_euro4 + $stk_euro5;
                $sum_ges = $ges + $ges2 + $ges3 + $ges4 + $ges5;
                
                $ant = round(($ges / $sum_ges * 100), 2);
                $ant2 = round(($ges2 / $sum_ges * 100), 2);
                $ant3 = round(($ges3 / $sum_ges * 100), 2);
                $ant4 = round(($ges4 / $sum_ges * 100), 2);
                $ant5 = round(($ges5 / $sum_ges * 100), 2);

                $antArray = array($ant, $ant2, $ant3, $ant4, $ant5);

                rsort($antArray);
                $rang = array_search($ant, $antArray) + 1;
                $rang2 = array_search($ant2, $antArray) + 1;
                $rang3 = array_search($ant3, $antArray) + 1;
                $rang4 = array_search($ant4, $antArray) + 1;
                $rang5 = array_search($ant5, $antArray) + 1;
                $rangArray = array($rang, $rang2, $rang3, $rang4, $rang5);

                $kum_ant_array = array($antArray[0], $antArray[0] + $antArray[1], $antArray[0] + $antArray[1] + $antArray[2], $antArray[0] + $antArray[1] + $antArray[2] + $antArray[3], $antArray[0] + $antArray[1] + $antArray[2] + $antArray[3] + $antArray[4]);

                $range = 7;

                for ($i = 0; $i < count($kum_ant_array); $i++) {
                    if ($rang == $i + 1) {
                        $kum_ant = $kum_ant_array[$i];

                    } else if ($rang2 == $i + 1) {
                        $kum_ant2 = $kum_ant_array[$i];
                    } else if ($rang3 == $i + 1) {
                        $kum_ant3 = $kum_ant_array[$i];
                    } else if ($rang4 == $i + 1) {
                        $kum_ant4 = $kum_ant_array[$i];
                    } else if ($rang5 == $i + 1) {
                        $kum_ant5 = $kum_ant_array[$i];
                    }
                }

                if($kum_ant >= $A1 && $kum_ant <= $A2) {
                    $kat = "A";
                }
                if($kum_ant >= $B1 && $kum_ant <= $B2) {
                    $kat = "B";
                }
                if($kum_ant >= $C1 && $kum_ant <= $C2) {
                    $kat = "C";
                }


                if($kum_ant2 >= $A1 && $kum_ant2 <= $A2) {
                    $kat2 = "A";
                }
                if($kum_ant2 >= $B1 && $kum_ant2 <= $B2) {
                    $kat2 = "B";
                }
                if($kum_ant2 >= $C1 && $kum_ant2 <= $C2) {
                    $kat2 = "C";
                }


                if($kum_ant3 >= $A1 && $kum_ant3 <= $A2) {
                    $kat3 = "A";
                }
                if($kum_ant3 >= $B1 && $kum_ant3 <= $B2) {
                    $kat3 = "B";
                }
                if($kum_ant3 >= $C1 && $kum_ant3d <= $C2) {
                    $kat3 = "C";
                }


                if($kum_ant4 >= $A1 && $kum_ant4 <= $A2) {
                    $kat4 = "A";
                }
                if($kum_ant4 >= $B1 && $kum_ant4 <= $B2) {
                    $kat4 = "B";
                }
                if($kum_ant4 >= $C1 && $kum_ant4 <= $C2) {
                    $kat4 = "C";
                }


                if($kum_ant5 >= $A1 && $kum_ant5 <= $A2) {
                    $kat5 = "A";
                }
                if($kum_ant5 >= $B1 && $kum_ant5 <= $B2) {
                    $kat5 = "B";
                }
                if($kum_ant5 >= $C1 && $kum_ant5 <= $C2) {
                    $kat5 = "C";
                }




                $ant_mat_pos = round(($stk_jahr / $sum_stk_jahr * 100), 2);
                $ant_mat_pos2 = round(($stk_jahr2 / $sum_stk_jahr * 100), 2);
                $ant_mat_pos3 = round(($stk_jahr3 / $sum_stk_jahr * 100), 2);
                $ant_mat_pos4 = round(($stk_jahr4 / $sum_stk_jahr * 100), 2);
                $ant_mat_pos5 = round(($stk_jahr5 / $sum_stk_jahr * 100), 2);

                $ant_mat_pos_Array = array($ant_mat_pos, $ant_mat_pos2, $ant_mat_pos3, $ant_mat_pos4, $ant_mat_pos5);

                rsort($ant_mat_pos_Array);

                $kum_ant_mat_pos_array = array($ant_mat_pos_Array[0], $ant_mat_pos_Array[0] + $ant_mat_pos_Array[1], $ant_mat_pos_Array[0] + $ant_mat_pos_Array[1] + $ant_mat_pos_Array[2], $ant_mat_pos_Array[0] + $ant_mat_pos_Array[1] + $ant_mat_pos_Array[2] + $ant_mat_pos_Array[3], $ant_mat_pos_Array[0] + $ant_mat_pos_Array[1] + $ant_mat_pos_Array[2] + $ant_mat_pos_Array[3] + $ant_mat_pos_Array[4]);

                $range = 7;

                for ($i = 0; $i < count($kum_ant_mat_pos_array); $i++) {
                    if ($rang == $i + 1) {
                        $kum_ant_mat_pos = $kum_ant_mat_pos_array[$i];
                    } else if ($rang2 == $i + 1) {
                        $kum_ant_mat_pos2 = $kum_ant_mat_pos_array[$i];
                    } else if ($rang3 == $i + 1) {
                        $kum_ant_mat_pos3 = $kum_ant_mat_pos_array[$i];
                    } else if ($rang4 == $i + 1) {
                        $kum_ant_mat_pos4 = $kum_ant_mat_pos_array[$i];
                    } else if ($rang5 == $i + 1) {
                        $kum_ant_mat_pos5 = $kum_ant_mat_pos_array[$i];
                    }
                }
                $sum_ant = $ant + $ant2 + $ant3 + $ant4 + $ant5;
                $sum_ant_mat_pos = $ant_mat_pos + $ant_mat_pos2 + $ant_mat_pos3 + $ant_mat_pos4 + $ant_mat_pos5;
            } else {
                echo "<p style='color: red'>Bitte gib gültige Zahlen ein!</p>";
            }
        } else {
            echo "<p style='color: red'>Es wurden keine korrekten Daten übergeben!</p>";
        }
    }
    ?>
    <h1>ABC-Analyse</h1>
    <form method="post">
        <label for="A1">A = </label>
        <input type="text" name="A1" id="A1" placeholder="%" value="<?php echo $A1; ?>" required>
        <label for="A2">-</label>
        <input type="text" name="A2" id="A2" placeholder="%" value="<?php echo $A2; ?>" required>
        <label>%</label>
        <br>
        <label for="B1">B = </label>
        <input type="text" name="B1" id="B1" placeholder="%" value="<?php echo $B1; ?>" required>
        <label for="B2">-</label>
        <input type="text" name="B2" id="B2" placeholder="%" value="<?php echo $B2; ?>" required>
        <label>%</label>
        <br>
        <label for="C1">C = </label>
        <input type="text" name="C1" id="C1" placeholder="%" value="<?php echo $C1; ?>" required>
        <label for="C2">-</label>
        <input type="text" name="C2" id="C2" placeholder="%" value="<?php echo $C2; ?>" required>

        <label>%</label>
        <br>
        <br>
        <table border="1">
            <thead>
                <th>Material Nr</th>
                <th>Stk / Jahr</th>
                <th>€ / Stk</th>
                <th>Gesamtwert</th>
                <th>Anteil</th>
                <th>Rang</th>
                <th>kumulierter Anteil</th>
                <th>Kategorie</th>
                <th>Anteil Materialposition</th>
                <th>kumulierte Materialposition</th>
            </thead>

            <tbody>
                <tr>
                    <td>1</td>
                    <td><input type="text" name="stk_jahr" id="stk_jahr" placeholder="0" value="<?php echo $stk_jahr; ?>" required>
                    </td>

                    <td><input type="text" name="stk_euro" id="stk_euro" placeholder="0" value="<?php echo $stk_euro; ?>" required>
                    </td>

                    <td><?php echo $ges; ?>€</td>

                    <td><?php echo $ant; ?>%</td>

                    <td><?php echo $rang; ?></td>

                    <td><?php echo $kum_ant; ?>%</td>

                    <td><?php echo $kat; ?></td>

                    <td><?php echo $ant_mat_pos; ?>%</td>
                    
                    <td><?php echo $kum_ant_mat_pos; ?>%</td>
                </tr>

                <tr>
                    <td>2</td>
                    <td><input type="text" name="stk_jahr2" id="stk_jahr2" placeholder="0" value="<?php echo $stk_jahr2; ?>" required>
                    </td>

                    <td><input type="text" name="stk_euro2" id="stk_euro2" placeholder="0" value="<?php echo $stk_euro2; ?>" required>
                    </td>

                    <td><?php echo $ges2; ?>€</td>

                    <td><?php echo $ant2; ?>%</td>

                    <td><?php echo $rang2; ?></td>

                    <td><?php echo $kum_ant2; ?>%</td>

                    <td><?php echo $kat2; ?></td>

                    <td><?php echo $ant_mat_pos2; ?>%</td>
                    
                    <td><?php echo $kum_ant_mat_pos2; ?>%</td>
                </tr>

                <tr>
                    <td>3</td>
                    <td><input type="text" name="stk_jahr3" id="stk_jahr3" placeholder="0" value="<?php echo $stk_jahr3; ?>" required>
                    </td>

                    <td><input type="text" name="stk_euro3" id="stk_euro3" placeholder="0" value="<?php echo $stk_euro3; ?>" required>
                    </td>

                    <td><?php echo $ges3; ?>€</td>

                    <td><?php echo $ant3; ?>%</td>

                    <td><?php echo $rang3; ?></td>

                    <td><?php echo $kum_ant3; ?>%</td>

                    <td><?php echo $kat3; ?></td>

                    <td><?php echo $ant_mat_pos3; ?>%</td>
                    
                    <td><?php echo $kum_ant_mat_pos3; ?>%</td>
                </tr>

                <tr>
                    <td>4</td>
                    <td><input type="text" name="stk_jahr4" id="stk_jahr4" placeholder="0" value="<?php echo $stk_jahr4; ?>" required>
                    </td>

                    <td><input type="text" name="stk_euro4" id="stk_euro4" placeholder="0" value="<?php echo $stk_euro4; ?>" required>
                    </td>

                    <td><?php echo $ges4; ?>€</td>

                    <td><?php echo $ant4; ?>%</td>

                    <td><?php echo $rang4; ?></td>

                    <td><?php echo $kum_ant4; ?>%</td>

                    <td><?php echo $kat4; ?></td>

                    <td><?php echo $ant_mat_pos4; ?>%</td>
                    
                    <td><?php echo $kum_ant_mat_pos4; ?>%</td>
                </tr>

                <tr>
                    <td>5</td>
                    <td><input type="text" name="stk_jahr5" id="stk_jahr5" placeholder="0" value="<?php echo $stk_jahr5; ?>" required>
                    </td>

                    <td><input type="text" name="stk_euro5" id="stk_euro5" placeholder="0" value="<?php echo $stk_euro5; ?>" required>
                    </td>

                    <td><?php echo $ges5; ?>€</td>

                    <td><?php echo $ant5; ?>%</td>

                    <td><?php echo $rang5; ?></td>

                    <td><?php echo $kum_ant5; ?>%</td>

                    <td><?php echo $kat5; ?></td>

                    <td><?php echo $ant_mat_pos5; ?>%</td>
                    
                    <td><?php echo $kum_ant_mat_pos5; ?>%</td>
                </tr>

                <tr>
                    <td style="font-weight: bold;">Summe</td>
                    
                    <td><?php echo $sum_stk_jahr; ?></td>

                    <td><?php echo $sum_stk_euro; ?></td>

                    <td><?php echo $sum_ges; ?></td>

                    <td><?php echo $sum_ant; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?php echo $sum_ant_mat_pos; ?></td>
                </tr>

            </tbody>
        </table>
        <input type="submit" value="Senden">
    </form>
</body>

</html>
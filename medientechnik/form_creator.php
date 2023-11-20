<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formular-Creator</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <h1>Formular-Creator</h1>
    <?php $inputCount = 3; ?>
    <form method="post">
        <label for="inputCount">Anzahl Inputs</label>
        <input type="number" name="inputCount" id="inputCount" placeholder="3">
        <br>
        <input type="submit" value="Eingabe">
    </form>
    <br>
    <br>
    <form method="post">
        <label for="action">Action</label>
        <input type="text" name="action" id="action" placeholder="index.php" required>
        <label for="method">Method</label>
        <input type="text" name="method" id="method" placeholder="POST" required>
        <br>
        <br>
        <table border="1">
            <thead>
                <th>Type</th>
                <th>Name</th>
                <th>ID</th>
                <th>Placeholder</th>
                <th>Required</th>
                <th>Label</th>
            </thead>
            <tbody>
                <?php
                if (isset($_POST["inputCount"]) && $_POST["inputCount"] != null && $_POST["inputCount"] > 0) {
                    $inputCount = $_POST["inputCount"];
                }else{
                    $inputCount = 3;
                }
                ?>

                <?php for ($i = 0; $i < $inputCount; $i++) { ?>
                    <tr>
                        <td><select name="type<?php echo $i; ?>" id="type<?php echo $i; ?>">
                            <option value="button">Button</option>
                            <option value="checkbox">Checkbox</option>
                            <option value="color">Color</option>
                            <option value="date">Date</option>
                            <option value="datetime-local">Datetime-local</option>
                            <option value="email">Email</option>
                            <option value="file">File</option>
                            <option value="hidden">Hidden</option>
                            <option value="image">Image</option>
                            <option value="month">Month</option>
                            <option value="number">Number</option>
                            <option value="password">Password</option>
                            <option value="radio">Radio</option>
                            <option value="range">Range</option>
                            <option value="reset">Reset</option>
                            <option value="search">Search</option>
                            <option value="submit">Submit</option>
                            <option value="tel">Tel</option>
                            <option value="text" selected>Text</option>
                            <option value="time">Time</option>
                            <option value="url">URL</option>
                            <option value="week">Week</option>
                        </select></td>
                        <td><input type="text" name="name<?php echo $i; ?>" id="name<?php echo $i; ?>" required></td>
                        <td><input type="text" name="id<?php echo $i; ?>" id="id<?php echo $i; ?>" required></td>
                        <td><input type="text" name="placeholder<?php echo $i; ?>" id="placeholder<?php echo $i; ?>"></td>
                        <td><input type="checkbox" name="required<?php echo $i ?>" id="required<?php echo $i ?>"></td>
                        <td><input type="text" name="label<?php echo $i ?>" id="label<?php echo $i ?>"></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
        <br>
        <input type="submit" value="Erstellen">
    </form>
        <br>
        <textarea name="TEST" id="TEST" cols="100" rows="20"><?php
        if(isset($_POST["method"])) {
            if ($_POST["method"] == "POST") {
                echo "<form action='" . $_POST["action"] . "' method='post'>\n";
            } else if ($_POST["method"] == "GET") {
                echo "<form action='" . $_POST["action"] . "' method='get'>\n";
            } else {
                echo "Formular konnte nicht erstellt werden.";
                return;
            }
        }
        ?><?php
        for ($i = 0; $i < $inputCount; $i++) {
            if (isset($_POST["type" . $i]) && isset($_POST["name" . $i]) && isset($_POST["id" . $i])) {
                $type = $_POST["type" . $i];
                $name = $_POST["name" . $i];
                $id = $_POST["id" . $i];

                if(isset($_POST["label" . $i])) {
                    echo "    <label for='" . $id . "'>" . $_POST["label" . $i] . "</label>\n";
                }

                echo "    <input type='" . $type . "' name='" . $name . "' id='" . $id . "'";

                if (isset($_POST["placeholder" . $i])) {
                    echo " placeholder='" . $_POST["placeholder" . $i] . "'";
                } 
                
                if (isset($_POST["required" . $i])) {
                    echo " required";
                }

                echo ">\n";
            }
        }
        echo "</form>";
        ?></textarea>
</body>

</html>
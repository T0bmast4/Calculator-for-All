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
        <table border="1">
            <thead>
                <th>Type</th>
                <th>Name</th>
                <th>ID</th>
                <th>Required</th>
                <th>Placeholder</th>
            </thead>
            <tbody>
                <?php
                if (isset($_POST["inputCount"]) && $_POST["inputCount"] != null) {
                    $inputCount = $_POST["inputCount"];
                }else{
                    $inputCount = 3;
                }
                ?>

                <?php for ($i = 0; $i < $inputCount; $i++) { ?>
                    <tr>
                        <td><input type="text" name="type<?php echo $i; ?>" id="type<?php echo $i; ?>" required></td>
                        <td><input type="text" name="name<?php echo $i; ?>" id="name<?php echo $i; ?>" required></td>
                        <td><input type="text" name="id<?php echo $i; ?>" id="id<?php echo $i; ?>" required></td>
                        <td><input type="text" name="placeholder<?php echo $i; ?>" id="placeholder<?php echo $i; ?>"></td>
                        <td><input type="checkbox" name="required<?php echo $i ?>" id="required<?php echo $i ?>"></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
        <input type="submit" value="Erstellen">
    </form>
    <?php
    if(isset($_POST["method"])) {
        if ($_POST["method"] == "POST") {
            echo "<form action='" . $_POST["action"] . "' method='post'>";
        } else if ($_POST["method"] == "GET") {
            echo "<form action='" . $_POST["action"] . "' method='get'>";
        } else {
            echo "<p class='error'>Formular konnte nicht erstellt werden.</p>";
        }
    }
    ?>

    <?php
    for ($i = 0; $i < $inputCount; $i++) {
        if (isset($_POST["type" . $i]) && isset($_POST["name" . $i]) && isset($_POST["id" . $i])) {
            $type = $_POST["type" . $i];
            $name = $_POST["name" . $i];
            $id = $_POST["id" . $i];

            if (isset($_POST["required"])) {
                echo "<input type='" . $type . "' name='" . $name . "' id='" . $id . "' required>";
            } else if (isset($_POST["placeholder"])) {
                echo "<input type='" . $type . "' name='" . $name . "' id='" . $id . "' placeholder='" . $placeholder . "'>";
            } else if (isset($_POST["required"]) && isset($_POST["placeholder"])) {
                $placeholder = $_POST["placeholder"];
                echo "<input type='" . $type . "' name='" . $name . "' id='" . $id . "' placeholder='" . $placeholder . "' required>";
            } else {
                echo "<input type='" . $type . "' name='" . $name . "' id='" . $id . "'>";
            }
        }
    }
    ?>
    </form>
</body>

</html>
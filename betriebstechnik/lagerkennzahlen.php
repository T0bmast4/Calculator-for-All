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
        <input type="text" name="anfangsbestand" id="anfangsbestand" required>

        <label for="quartal1">1. Quartal</label>
        <input type="text" name="quartal1" id="quartal1" value="0" required>
        
        <label for="quartal2">2. Quartal</label>
        <input type="text" name="quartal2" id="quartal2" value="0" required>

        <label for="quartal3">3. Quartal</label>
        <input type="text" name="quartal3" id="quartal3" value="0" required>

        <label for="quartal4">4. Quartal</label>
        <input type="text" name="quartal4" id="quartal4" value="0" required>
    </form>

    <?php
        if (isset($_POST['anfangsbestand'], $_POST['quartal1'], $_POST['quartal2'], $_POST['quartal3'], $_POST['quartal4'])){
            $an = $_POST['anfangsbestand'];
            $q1 = $_POST['quartal1'];
            $q2 = $_POST['quartal2'];
            $q3 = $_POST['quartal3'];
            $q4 = $_POST['quartal4'];

        }
    ?>
</body>
</html>
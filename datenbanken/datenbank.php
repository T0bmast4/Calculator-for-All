<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select-Statement</title>
</head>
<body>

<form action="datenbank.php" method="post">
    <select name="select" id="select">
        <option value="select">Select</option>
        <option value="insert">Insert</option>
        <option value="update">Update</option>
        <option value="delete">Delete</option>
</form>


<?php
if (isset($_POST["select"]) && isset($_POST["insert"]) && isset($_POST["update"]) && isset($_POST["delete"])) {

$pdo = new PDO("mysql:host=localhost;dbname=fitnessclub", "root", "");

$statement = $pdo->prepare("SELECT MG_NR, Name, Stunden, Kosten FROM reservierung");


if ($statement->execute()) {

    foreach ($statement as $record) {

    echo $record["MG_Nr"] . "" . $record ["Name"] . "" . $record["Stunden"] . "" . $record["Kosten"]. "" .  "<br>";


    }


}


    
}
?>

</body>
</html>
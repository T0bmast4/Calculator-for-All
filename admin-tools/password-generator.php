<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passwort-Generator</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        div {
            font-family: 'Arial', sans-serif;

            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        body {
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>
    <div>
        <form class="main-form" method="post">
            <label class="main-label" for="username">Benutzername</label>
            <input class="main-input" type="text" name="username" id="username" placeholder="Benutzername" value="<?php $username; ?>">

            <label class="main-label" for="password">Passwort</label>
            <input class="main-input" type="password" name="password" id="password" placeholder="Passwort" value="<?php $password; ?>">

            <input class="main-button" type="submit" value="Generieren">
        </form>
    </div>

    <?php

    require_once("../includes/config.php");
    $username = "";
    $password = "";
    $name = "";

    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);

    $stmt = $pdo->prepare("SELECT COUNT(ID) as ids FROM users;");

    if($stmt->execute()) {
        $ids = 0;
        foreach($stmt as $result) {
            $ids = $result["ids"];
        }
        $username = "user" . $ids;
        $name = "Benutzer" . $ids;
    }

    $password = randomPassword();

    $insert_stmt = $pdo->prepare("INSERT INTO users (username, password, name, lastlogin, isLoggedIn) VALUES (:username, :password, :name, :lastLogin, :isLoggedIn)");

    $insert_stmt->bindValue(":username", $username);
    $insert_stmt->bindValue(":password", password_hash($password, PASSWORD_BCRYPT));
    $insert_stmt->bindValue(":name", $name);
    $insert_stmt->bindValue(":lastLogin", "null");
    $insert_stmt->bindValue(":isLoggedIn", 0);

    $insert_stmt->execute();

    function randomPassword()
    {
        $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+?";
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, count($characters) - 1);
            $pass[$i] = $characters[$n];
        }
        return $pass;
    }
    ?>
</body>

</html>
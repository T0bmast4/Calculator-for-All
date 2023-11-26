<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f1f1f1;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
            margin: 0;
        }
    </style>
</head>

<body>
    <form class="main-form" method="post">
        <label class="main-label" for="username">Benutzername</label>
        <input class="main-input" type="text" name="username" id="username" placeholder="Benutzername" value="<?php if (isset($_POST["username"])) {
            echo $_POST["username"];
        } ?>" required>

        <label class="main-label" for="password">Passwort</label>
        <input class="main-input" type="password" name="password" id="password" placeholder="Passwort" value="<?php if (isset($_POST["password"])) {
            echo $_POST["password"];
        } ?>" required>

        <label class="main-label" for="text">Dein Name</label>
        <input class="main-input" type="text" name="yourName" id="yourName" placeholder="Max" value="<?php if (isset($_POST["yourName"])) {
            echo $_POST["yourName"];
        } ?>">
        <input class="main-button" type="submit" value="Einloggen">
    </form>
    <?php
    require_once("../includes/config.php");
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        if ($username == "admin" && ($password == "admin" || $password == "password")) {
            header("Location: https://www.youtube.com/watch?v=dQw4w9WgXcQ");
            return;
        }

        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);

        $stmt = $pdo->prepare("SELECT username, password, name FROM users WHERE username=:username");
        $stmt->bindValue(":username", $username);

        try {
            if ($stmt->execute()) {
                $result = $stmt->fetch();
                $encryptedPassword = $result["password"];

                $verify = password_verify($password, $encryptedPassword);

                if ($verify) {
                    if (isset($_POST["yourName"]) && $_POST["yourName"] !== "") {
                        $yourName = $_POST["yourName"];
                        $stmt2 = $pdo->prepare("UPDATE users SET name = :newName WHERE username = :username");

                        $stmt2->bindValue(":newName", $yourName);
                        $stmt2->bindValue(":username", $username);

                        if ($stmt2->execute()) {
                            session_start();
                            $_SESSION["logged_in_user"] = $username;
                            $_SESSION["logged_in_name"] = $yourName;
                            header("Location: ../index.php");
                        } else {
                            echo "<p class='error'>Fehler beim Aktualisieren des Namens.</p>";
                        }
                    } else {
                        $yourName = $result["name"] ?? "";
                        session_start();
                        $_SESSION["logged_in_user"] = $username;
                        $_SESSION["logged_in_name"] = $yourName;
                        header("Location: ../index.php");
                    }
                } else {
                    echo "<p class='error'>Benutzername oder Passwort ist ungültig.</p>";
                }
            } else {
                echo "<p class='error'>Benutzername oder Passwort ist ungültig.</p>";
            }
        } catch (PDOException $e) {
            echo "Fehler: " . $e->getMessage();
        }
    }
    ?>
</body>

</html>
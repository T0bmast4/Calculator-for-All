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
        <input class="main-input" type="text" name="username" id="username" required>
        
        <label class="main-label" for="password">Passwort</label>
        <input class="main-input" type="password" name="password" id="password" required>
        
        <label class="main-label" for="text">Dein Name</label>
        <input class="main-input" type="text" name="yourName" id="yourName">
        <input class="main-buttom" type="submit" value="Einloggen">
    </form>
    <?php
    if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["yourName"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $yourName = $_POST["yourName"];

        if($username == "admin" && ($password == "admin" || $password == "password")) {
            header("Location: https://www.youtube.com/watch?v=dQw4w9WgXcQ");
        }

        $pdo = new PDO("mysql:host=localhost;dbname=calculatorWebsite", "root", "");

        $stmt = $pdo->prepare("SELECT username, password FROM users WHERE username=:username");

        $stmt->bindValue(":username", $username);
        
        if($stmt->execute()) {
            $encryptedPassword = $stmt["password"];

            $verify = password_verify($password, $encryptedPassword);

            if($verify) {
                $stmt2 = $pdo->prepare("UPDATE users SET username = :newUsername WHERE username = :username");

                $stmt2->bindValue(":newUsername", $yourName);
                $stmt2->bindValue(":username", $username);

                if($stmt2->execute()) {
                    session_start();
                    $_SESSION['logged_in_user'] = $yourName;
                    header("Location: ../index.php");
                }
            }else{
                echo "<p class='error'>Password falsch!";
            }
        }
    }
    ?>
</body>
</html>
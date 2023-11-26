<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator for All</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="body">
    <?php
    if (isset($_GET["user"])) {
        $username = $_GET["user"];
        session_start();
        session_destroy();

        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);

        $stmt = $pdo->prepare("UPDATE users SET isLoggedIn = :isLoggedIn, currentDeviceID = :currentDeviceID WHERE username = :username");

        $stmt->bindValue(":isLoggedIn", 0);
        $stmt->bindValue(":currentDeviceID", "null");
        $stmt->bindValue(":username", $username);
        if ($stmt->execute()) {
            header("Location: index.php");
        } else {
            echo "FEHLER BEIM WEITERLEITEN!";
        }
    }
    ?>
    <div>
        <nav>
            <ul>
                <br>
                <li><a href="#" class="active">Home</a></li>
                <div id="drop" class="dropdown">
                    <li><a id="calcDropdown">Calculator</a></li>
                    <div id="drop-content" class="dropdown-content">
                        <a href="mathe_overview.php">Mathematik</a>
                        <a href="betp_overview.php">Betriebstechnik</a>
                        <a href="elektrotechnik_overview.php">Elektrotechnik</a>
                        <a href="medt_overview.php">Medientechnik</a>
                        <a href="nwtk_overview.php">Netzwerktechnik</a>
                    </div>
                    <script>
                        if (window.innerWidth <= 650) {
                            var caldDrop = document.getElementById("drop");
                            var calcDropdown = document.getElementById("calcDropdown");
                            var calcDropdown_content = document.getElementById("drop-content");

                            calcDropdown.addEventListener("click", function () {
                                caldDrop.classList.add("dropdown-page");
                                calcDropdown_content.classList.add("dropdown-content-page");
                            });
                        }
                    </script>
                </div>


                <?php
                session_start();
                if (isset($_SESSION["logged_in_user"])) {
                    ?>
                    <a href="index.php?user=<?php echo $_SESSION["logged_in_user"] ?>" class="logout-button">Logout</a>
                <?php } else { ?>
                    <a href="login/login.php" class="login-button">Login</a>
                <?php } ?>
            </ul>
        </nav>
    </div>
    <div class="main-content">
        <h1>Herzlich Willkommen <a style="text-decoration: underline;">
                <?php if (isset($_SESSION["logged_in_name"])) {
                    echo $_SESSION["logged_in_name"];
                } ?>
            </a> bei Calculator for All</h1>
        <h3>Hier kannst du alle Rechnungen automatisch ausrechnen, welche in der 3AFI derzeit unterrichtet werden.</h3>
        <p>Im Laufe der Zeit werden noch weitere Updates veröffentlicht!</p>
        <br><br>
    </div>
</body>

</html>
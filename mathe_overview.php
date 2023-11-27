<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mathematik-Übersicht</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="body">
    <nav>
        <ul>
            <br>
            <li><a href="index.php">Home</a></li>
            <div class="dropdown-page">
                <li><a href="" class="active">Calculator</a></li>
                <div class="dropdown-content-page">
                    <a class="activeCalc" href="mathe_overview.php">Mathematik</a>
                    <a href="betp_overview.php">Betriebstechnik</a>
                    <a href="elektrotechnik_overview.php">Elektrotechnik</a>
                    <a href="medt_overview.php">Medientechnik</a>
                    <a href="nwtk_overview.php">Netzwerktechnik</a>
                </div>
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
    <div class="main-content">
        <h1>Mathematik-Übersicht</h1>
        <ul>
            <li><a href="mathematik/vektorprodukt.php">Vektorprodukt</a></li>
            <li><a href="mathematik/skalarprodukt.php">Skalarprodukt</a></li>
        </ul>
    </div>
</body>

</html>
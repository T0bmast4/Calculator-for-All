<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medientechnik-Übersicht</title>
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
                    <a href="mathe_overview.php">Mathematik</a>
                    <a href="betp_overview.php">Betriebstechnik</a>
                    <a href="elektrotechnik_overview.php">Elektrotechnik</a>
                    <a class="activeCalc" href="medt_overview.php">Medientechnik</a>
                    <a href="nwtk_overview.php">Netzwerktechnik</a>
                </div>
            </div>
            <?php
            session_start();
            if (isset($_SESSION["logged_in_user"])) {
                ?>
                <a href="" class="logout-button">Logout</a>
            <?php } else { ?>
                <a href="login/login.php" class="login-button">Login</a>
            <?php } ?>
        </ul>
    </nav>
    <div class="main-content">
        <h1>Medientechnik-Übersicht</h1>
        <ul>
            <li><a href="medientechnik/form_creator.php">Formular-Creator</a></li>
        </ul>
    </div>
</body>

</html>